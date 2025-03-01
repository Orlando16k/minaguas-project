<!DOCTYPE html>
<html lang="en">
<?php
include "../Conexion.php";
require_once '../batimetria.php';
date_default_timezone_set("America/Caracas");
setlocale(LC_TIME, "spanish");
$fecha_actual = date("Y");
$anio = $fecha_actual;
$f = $fecha_actual - 1;
$pri = $_GET['pri'];
$text = "";
$splice = 0;

function getMonthName($numero_mes_aux)
{
    if ($numero_mes_aux == "") {
        $fecha_actual = getdate();

        $numero_mes = $fecha_actual['mon'];
    } else {
        $numero_mes = $numero_mes_aux;
    }

    $nombres_meses = array(
        1 => "Enero",
        2 => "Febrero",
        3 => "Marzo",
        4 => "Abril",
        5 => "Mayo",
        6 => "Junio",
        7 => "Julio",
        8 => "Agosto",
        9 => "Septiembre",
        10 => "Octubre",
        11 => "Noviembre",
        12 => "Diciembre"
    );

    $nombre_mes = $nombres_meses[$numero_mes];

    return  $nombre_mes;
}


if ($pri) {
    $stringPrioritarios = "0";
    $queryPrioritarios = mysqli_query($conn, "SELECT configuracion FROM configuraciones WHERE nombre_config = 'prioritarios'");
    if (mysqli_num_rows($queryPrioritarios) > 0) {
        $stringPrioritarios = mysqli_fetch_assoc($queryPrioritarios)['configuracion'];
    }
    $text = "AND id_embalse IN ($stringPrioritarios)";
}

$re = mysqli_query($conn, "SELECT id_embalse,cota_min,cota_nor,cota_max,nombre_embalse FROM embalses WHERE estatus = 'activo' $text ORDER BY id_embalse ASC;");
$count = mysqli_num_rows($re);
if ($count >= 1) {

    $res = mysqli_query($conn, "SELECT fecha,hora,id_embalse,cota_actual FROM datos_embalse WHERE estatus = 'activo' AND cota_actual <> 0 AND (YEAR(fecha) = '$fecha_actual' OR YEAR(fecha) = '$f') $text ORDER BY id_embalse ASC;");


    $embalses = mysqli_fetch_all($re, MYSQLI_ASSOC);
    $datos_embalses = mysqli_fetch_all($res, MYSQLI_ASSOC);




    function get_days_of_week($month_num, $week_num)
    {
        $year = date("Y");
        $first_day_of_month = date('N', strtotime("$year-$month_num-01"));
        $days_in_month = date('t', strtotime("$year-$month_num-01"));
        $days = array();
        for ($day = 1; $day <= $days_in_month; $day++) {
            $week_of_month = ceil(($day + $first_day_of_month - 1) / 7);
            if ($week_of_month == $week_num) {
                $days[] = $day;
            }
        }
        return $days;
    };

    function obtenerFechasSemana($fecha)
    {
        // Crear un objeto DateTime a partir de la fecha proporcionada
        $fechaObj = new DateTime($fecha);

        // Obtener el número del día de la semana (1 = lunes, 7 = domingo)
        $diaSemana = $fechaObj->format('N');

        // Calcular la diferencia entre el día actual y el lunes de la misma semana
        $diferencia = $diaSemana - 1;

        // Restar la diferencia para obtener la fecha del lunes
        $lunes = $fechaObj->modify("-$diferencia days");

        // Inicializar un array para almacenar las fechas de la semana
        $fechasSemana = array();

        // Agregar las fechas de la semana al array
        for ($i = 0; $i < 7; $i++) {
            $fechasSemana[] = $lunes->format('Y-m-d');
            $lunes->modify('+1 day');
        }

        return $fechasSemana;
    }

    // Ejemplo de uso
    $fechasSemana = obtenerFechasSemana(date('Y-m-d'));
?>

    <head>
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../../assets/img/logos/cropped-mminaguas.webp">
        <script src="../../assets/js/Chart.js"></script>
        <!--script src="../../assets/js/date-fns.js"></script-->
        <script src="../../assets/js/date-fns.js"></script>

        <script src="../../assets/js/jquery/jquery.min.js"></script>
        <script src="../../assets/js/html2canvas.min.js"></script>
        <link href="../../assets/css/style-spinner.css" rel="stylesheet" />
        <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />

        <title>Document</title>
    </head>

    <body style="height:800px">
        <!--div style=" width: 1200px;"-->
        <div>
            <?php
            $j = 0;
            $nom = array("Cota " . date("Y"), "Cota " . (date("Y") - 1));
            $pivote = 0;

            for ($t = 0; $t <  count($embalses); $t++) {
            ?>
                <div style="width:1830px !important; height:600px; position:absolute; top:-100%;"><canvas class="alA" id="ano<?php echo $t; ?>"></canvas></div>
                <div style="width:1830px !important; height:460px; position:absolute; top:-100%;"><canvas class="alM" id="mes<?php echo $t; ?>"></canvas></div>
                <div style="width:900px !important; height:300px; position:absolute; top:-100%;"><canvas class="alS" id="semana<?php echo $t; ?>"></canvas></div>

            <?php

            }
            ?>

        </div>
        <div class="row justify-content-center h-100">
            <div class="col-7">
                <div class="loaderPDF " style="height: 90% !important;align-items:end !important;">

                    <div class="lds-dual-ring"></div>

                </div>
            </div>
            <div class="col-7">
                <div class="progress">
                    <div id="progress-bar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </body>

    <script>
        const arbitra = {
            id: 'arbitra',
            dr: function(lines, ctx, left, right, y) {
                ctx.save();

                lines.forEach(line => {
                    const {
                        yvalue,
                        cota,
                        color,
                        h
                    } = line;

                    ctx.beginPath();
                    ctx.lineWidth = 1;
                    ctx.moveTo(left, y.getPixelForValue(yvalue));
                    ctx.lineTo(right, y.getPixelForValue(yvalue));
                    ctx.strokeStyle = color; // Cambiar color según tus preferencias
                    ctx.fillText(cota + ": " + yvalue.toLocaleString("de-DE") + " (Hm³)", right * 4.2 / 6, y.getPixelForValue(yvalue) + h);
                    ctx.stroke();
                });

                ctx.restore();
            },
            beforeDatasetsDraw: function(chart, args, plugins) {
                const {
                    ctx,
                    scales: {
                        x,
                        y
                    },
                    chartArea: {
                        left,
                        right
                    }
                } = chart;

                // Obtener las líneas específicas para este gráfico
                const lines = chart.options.plugins.arbitra.lines;

                // Llamada a la función dr() dentro del contexto del plugin con las líneas específicas
                this.dr(lines, ctx, left, right, y);

                // Resto del código del plugin
            }
        };

        const point = {
            id: 'point',
            afterDatasetsDraw: function(chart, arg, options) {
                const {
                    ctx
                } = chart;
                const dataset = chart.data.datasets[1];
                const meta = chart.getDatasetMeta(1);

                if (meta.hidden) return;

                const lastElement = meta.data[meta.data.length - 1];
                const fontSize = 16;
                const fontStyle = 'normal';
                const fontFamily = 'Arial';
                if (dataset.data.length > 0) {
                    ctx.save();
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';
                    ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);
                    ctx.fillStyle = 'black';
                    total = dataset.data[dataset.data.length - 1].y;
                    tot = parseFloat(total);
                    formateado = new Intl.NumberFormat('de-DE', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }).format(tot);
                    ctx.fillText(formateado, lastElement.x, lastElement.y - 5);
                }
                ctx.restore();
            },
        };






        <?php
        $count = 0;

        for ($t = 0; $t <  count($embalses); $t++) {
            $start_time = microtime(true);
            $bati = new Batimetria($embalses[$t]["id_embalse"], $conn);
        ?>
            anio<?php echo $t; ?> = document.getElementById("ano<?php echo $t; ?>");
            mes<?php echo $t; ?> = document.getElementById("mes<?php echo $t; ?>");
            semana<?php echo $t; ?> = document.getElementById("semana<?php echo $t; ?>");
            let datas<?php echo $t; ?> = {


                datasets: [

                    {
                        label: '<?php echo $nom[1] ?>',
                        borderColor: '#e4c482',
                        backgroundColor: '#e4c482',
                        pointRadius: 0,
                        data: [
                            <?php
                            $j = 0;
                            $pivote = date("Y") - 1;
                            $min = $embalses[$t]["cota_min"];
                            $max = $embalses[$t]["cota_max"];
                            while ($j < count($datos_embalses)) {

                                if ((date("Y", strtotime($datos_embalses[$j]["fecha"])) == $pivote) && ($embalses[$t]["id_embalse"] == $datos_embalses[$j]["id_embalse"])) {
                                    $splice++;


                            ?> {
                                        x: '<?php echo (date("Y", strtotime($datos_embalses[$j]["fecha"])) + 1) . '-' . date("m-d", strtotime($datos_embalses[$j]["fecha"])) . " " . $datos_embalses[$j]["hora"] ?>',
                                        y: <?php echo $bati->getByCota(date("Y", strtotime($datos_embalses[$j]["fecha"])), $datos_embalses[$j]["cota_actual"])[1];  ?>
                                    },
                                    <?php if ($max < $datos_embalses[$j]["cota_actual"]) {
                                        $max = $datos_embalses[$j]["cota_actual"];
                                    }
                                    if ($min > $datos_embalses[$j]["cota_actual"]) {
                                        $min = $datos_embalses[$j]["cota_actual"];
                                    } ?>

                            <?php

                                };


                                $j++;
                            }; //array_splice($datos_embalses, 0, $splice + 1);$splice = 0;
                            ?>
                        ],
                    },

                    {
                        label: '<?php echo $nom[0] ?>',
                        borderColor: '#36a1eb',
                        backgroundColor: '#36a1eb',
                        data: [<?php
                                $j = 0;
                                $pivote = date("Y");
                                while ($j < count($datos_embalses)) {

                                    if ((date("Y", strtotime($datos_embalses[$j]["fecha"])) == $pivote) && ($embalses[$t]["id_embalse"] == $datos_embalses[$j]["id_embalse"])) {
                                        $splice++;


                                ?> {
                                        x: '<?php echo $datos_embalses[$j]["fecha"] . " " . $datos_embalses[$j]["hora"];  ?>',
                                        y: <?php echo $bati->getByCota($anio, $datos_embalses[$j]["cota_actual"])[1];  ?>
                                    },
                                    <?php if ($max < $datos_embalses[$j]["cota_actual"]) {
                                            $max = $datos_embalses[$j]["cota_actual"];
                                        }
                                        if ($min > $datos_embalses[$j]["cota_actual"]) {
                                            $min = $datos_embalses[$j]["cota_actual"];
                                        } ?>

                            <?php

                                    };
                                    $j++;
                                }; //array_splice($datos_embalses, 0, $splice + 1);$splice = 0;
                            ?>
                        ],
                        pointBackgroundColor: function(context) {
                            var index = context.dataIndex;
                            var value = context.dataset.data[index];
                            return index === context.dataset.data.length - 1 ? '#ff0000' : '#4472c4';
                        },
                        pointRadius: function(context) {
                            var index = context.dataIndex;
                            var value = context.dataset.data[index];
                            return index === context.dataset.data.length - 1 ? '6' : '0';
                        },

                    }




                ],

            };
            let y<?php echo $t; ?> = {

                title: {
                    display: true,
                    text: 'Volumen (Hm³)',
                    font: {
                        size: 20,
                        family: 'Arial',
                    },
                },
                min: <?php $aux = $bati->getByCota($anio, $embalses[$t]["cota_min"])[1];
                        if ($min < $embalses[$t]["cota_min"]) {
                            echo round($bati->getByCota($anio, $min)[1],0);
                        } else {
                            if ($aux - 200 < 0) {
                                echo 0;
                            } else {
                                echo round($bati->getByCota($anio, $embalses[$t]["cota_min"])[1] - 200,0);
                            }
                        }; ?>,
                max: <?php if ($max > $embalses[$t]["cota_max"]) {
                            echo round($bati->getByCota($anio, $max)[1] + 10, 0);
                        } else {
                            echo round($bati->getByCota($anio, $embalses[$t]["cota_max"])[1] + 10, 0);
                        }; ?>,
                border: {
                    display: false,
                },
                ticks: {
                    font: {
                        size: 14,
                        family: 'Arial',
                    },
                    callback: function(valor, index, valores) {
                        return valor.toLocaleString("de-DE");
                    },
                },
            };
            let lin<?php echo $t; ?> = {
                lines: [{
                        yvalue: <?php echo round($bati->getByCota($anio, $embalses[$t]["cota_min"])[1], 2); ?>,
                        cota: "Volumen mínimo",
                        color: 'black',
                        h: -10,
                    },
                    {
                        yvalue: <?php echo round($bati->getByCota($anio, $embalses[$t]["cota_nor"])[1], 2); ?>,
                        cota: "Volumen normal",
                        color: 'black',
                        h: 15,

                    },
                    {
                        yvalue: <?php echo round($bati->getByCota($anio, $embalses[$t]["cota_max"])[1], 2); ?>,
                        cota: "Volumen máximo",
                        color: 'black',
                        h: -5,
                    }
                    // Agrega más líneas según sea necesario
                ],
            };



            let chartA<?php echo $t; ?> = new Chart(anio<?php echo $t; ?>, {
                type: 'line',
                title: 'grafica',
                //labels: ["2024-01", "2024-02", "2024-03", "2024-04", "2024-05", "2024-06", "2024-07", "2024-08", "2024-09", "2024-10", "2024-11", "2024-12"],
                data: datas<?php echo $t; ?>,

                options: {
                    animations: false,
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        intersect: false,
                        axis: 'x',
                    },
                    plugins: {
                        arbitra: lin<?php echo $t; ?>,

                        legend: {
                            display: false,
                            labels: {

                                // This more specific font property overrides the global property
                                font: {
                                    size: 20
                                },

                            }
                        },
                        title: {
                            display: false,
                            text: 'Embalse <?php echo $embalses[$t]['nombre_embalse']; ?>',
                            fullSize: true,
                            font: {
                                size: 30
                            }
                        },

                    },
                    scales: {

                        x: {
                            title: {
                                display: true,
                                text: 'Año <?php echo date('Y'); ?>',
                                font: {
                                    size: 18,
                                    family: 'Arial',
                                },
                            },
                            type: 'time',
                            time: {
                                unit: 'month'
                            },
                            min: '<?php echo $anio; ?>-01-01',
                            max: '<?php echo $anio; ?>-12-31',

                            ticks: {
                                callback: (value, index, ticks) => {

                                    const date = new Date(value);
                                    //console.log(date);
                                    const f = new Intl.DateTimeFormat('es-ES', {
                                        month: 'short',

                                    }).format(value);
                                    str = f.charAt(0).toUpperCase();
                                    return str + f.slice(1);
                                },
                                font: {
                                    size: 18,
                                    family: 'Arial',
                                },
                            },
                            grid: {
                                color: function(context) {},
                            },

                        },

                        y: y<?php echo $t; ?>,
                    },
                },
                plugins: [arbitra, point],

            });

            let chartM<?php echo $t; ?> = new Chart(mes<?php echo $t; ?>, {
                type: 'line',
                title: 'grafica',
                //labels: ["2024-01", "2024-02", "2024-03", "2024-04", "2024-05", "2024-06", "2024-07", "2024-08", "2024-09", "2024-10", "2024-11", "2024-12"],
                data: datas<?php echo $t; ?>,

                options: {
                    animations: false,
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        intersect: false,
                        axis: 'x',
                    },
                    plugins: {
                        arbitra: lin<?php echo $t; ?>,

                        legend: {
                            display: false,
                            labels: {

                                // This more specific font property overrides the global property
                                font: {
                                    size: 20
                                },

                            }
                        },
                        title: {
                            display: false,
                            text: 'Embalse <?php echo $embalses[$t]['nombre_embalse']; ?>',
                            fullSize: true,
                            font: {
                                size: 30
                            }
                        },

                    },
                    scales: {

                        x: {
                            title: {
                                display: true,
                                text: ' <?php echo date('M Y'); ?>',
                                font: {
                                    size: 18,
                                    family: 'Arial',
                                },
                            },
                            type: 'time',
                            time: {
                                unit: 'day'
                            },
                            min: '<?php echo date('Y-m') . '-01';  ?>',
                            max: '<?php echo date('Y-m') . '-' . date('t') ?>',

                            ticks: {
                                callback: (value, index, ticks) => {

                                    const date = new Date(value);
                                    //console.log(date);
                                    const x = new Intl.DateTimeFormat('es-ES', {
                                        day: 'numeric',
                                    }).format(value);
                                    const y = new Intl.DateTimeFormat('es-ES', {
                                        month: 'short',
                                    }).format(value);
                                    str = y.charAt(0).toUpperCase();

                                    return x + " " + str + y.slice(1);
                                },
                                font: {
                                    size: 18,
                                    family: 'Arial',
                                },
                            },
                            grid: {
                                color: function(context) {},
                            },

                        },

                        y: y<?php echo $t; ?>,
                    },
                },
                plugins: [arbitra, point],

            });

            let chartS<?php echo $t; ?> = new Chart(semana<?php echo $t; ?>, {
                type: 'line',
                labels: [<?php
                            foreach ($fechasSemana as $dia) {
                                echo ',"' . $dia . '"';
                            }

                            ?>],
                data: datas<?php echo $t; ?>,

                options: {
                    animations: false,
                    maintainAspectRatio: false,
                    locale: 'es',
                    interaction: {
                        intersect: false,
                    },
                    plugins: {
                        arbitra: lin<?php echo $t; ?>,

                        legend: {
                            display: false,
                            labels: {
                                // This more specific font property overrides the global property
                                font: {
                                    size: 16
                                },

                            }
                        },
                        title: {
                            display: false,
                            text: 'Embalse <?php echo $embalses[$t]['nombre_embalse']; ?>',
                            fullSize: true,
                            font: {
                                size: 30
                            }
                        },
                    },
                    scales: {

                        x: {
                            title: {
                                display: true,
                                text: 'Semana <?php echo date("W", strtotime($fechasSemana[0])) . " del mes de " . getMonthName(DateTime::createFromFormat("Y-m-d", end($fechasSemana))->format('n')); ?>',
                                font: {
                                    size: 16,
                                    family: 'Arial',
                                },
                            },
                            label: 'Año',
                            type: 'time',
                            time: {
                                unit: 'day'
                            },
                            min: '<?php echo date('Y-m') . '-02';  ?>',
                            max: '<?php echo date('Y-m') . '-08'; ?>',
                            ticks: {
                                callback: (value, index, ticks) => {

                                    const date = new Date(value);
                                    //console.log(date);
                                    const x = new Intl.DateTimeFormat('es-ES', {
                                        day: 'numeric',
                                    }).format(value);
                                    const y = new Intl.DateTimeFormat('es-ES', {
                                        month: 'short',
                                    }).format(value);
                                    str = y.charAt(0).toUpperCase();

                                    return x + " " + str + y.slice(1);
                                },
                                font: {
                                    size: 14,
                                    family: 'Arial',
                                },
                            },
                            grid: {
                                color: function(context) {},
                            },

                        },
                        y: y<?php echo $t; ?>,
                    },


                },
                plugins: [arbitra, point],
            });


        <?php
            $end_time = microtime(true);
            $execution_time = ($end_time - $start_time);
            echo "console.log('Script Execution Time = " . $execution_time . " sec');";
        }
        ?>
        $(document).ready(function() {
            <?php
            closeConection($conn);

            for ($t = 0; $t <  count($embalses); $t++) {
            ?>
                const x<?php echo $t; ?> = document.querySelector("#ano<?php echo $t; ?>");
                const y<?php echo $t; ?> = document.querySelector("#mes<?php echo $t; ?>");
                const z<?php echo $t; ?> = document.querySelector("#semana<?php echo $t; ?>");

                var i = 1;
                html2canvas(x<?php echo $t; ?>).then(function(canvas) { //PROBLEMAS
                    //$("#ca").append(canvas);

                    // Convertir a dataURL con el nuevo canvas
                    dataURL = canvas.toDataURL("image/jpeg", 0.9);
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '../guardar-imagen.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.send('imagen=' + dataURL + '&nombre=<?php echo $embalses[$t]['id_embalse']; ?>&numero=' + 1);
                    xhr.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            $('#progress-bar').attr('aria-valuenow', <?php echo (($count) * 100 / (30)); ?>).css('width', <?php echo (($count) * 100 / (30));
                                                                                                                            $count++; ?> + '%');
                            //console.log("listo");

                        } else {

                        }
                    }
                });
                html2canvas(y<?php echo $t; ?>).then(function(canvas) { //PROBLEMAS
                    //$("#ca").append(canvas);

                    // Convertir a dataURL con el nuevo canvas
                    dataURL = canvas.toDataURL("image/jpeg", 0.9);
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '../guardar-imagen.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.send('imagen=' + dataURL + '&nombre=<?php echo $embalses[$t]['id_embalse']; ?>&numero=' + 2);
                    xhr.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            $('#progress-bar').attr('aria-valuenow', <?php echo (($count) * 100 / (30)); ?>).css('width', <?php echo (($count) * 100 / (30));
                                                                                                                            $count++; ?> + '%');
                            //console.log("listo");

                        } else {

                        }
                    }
                });
                html2canvas(z<?php echo $t; ?>).then(function(canvas) { //PROBLEMAS
                    //$("#ca").append(canvas);

                    // Convertir a dataURL con el nuevo canvas
                    dataURL = canvas.toDataURL("image/jpeg", 0.9);
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '../guardar-imagen.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.send('imagen=' + dataURL + '&nombre=<?php echo $embalses[$t]['id_embalse']; ?>&numero=' + 3);
                    xhr.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            if (this.responseText == "si") {
                                $('#progress-bar').attr('aria-valuenow', <?php echo (($count) * 100 / (30)); ?>).css('width', <?php echo (($count) * 100 / (30));
                                                                                                                                $count++; ?> + '%');
                                console.log("listo");
                                <?php if ($t == (count($embalses) - 1)) {
                                    echo "location.href = '../../pages/reports/print_embalses_prioritarios.php?pri=" . $pri . "';";
                                }
                                ?> //AQUI CARRIZALES
                            } else {
                                console.log(this.responseText);
                            }
                        }
                    }
                });
            <?php
            }
            ?>

        });
    </script>
<?php

} else {
    echo "<p>No existen Embalses</p></body>";
}
?>

</html>