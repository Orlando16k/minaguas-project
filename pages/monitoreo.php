<style>
.arrow-color {
    color: black;
}

.icon-g:hover {
    transform: scale(1.2);
    /* Escala el tamaño del icono al 120% */
}

.rrss-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 50px;
}

@media (max-width: 1100px) {
    .rrss-item {
        flex: 1 0 100%;
        max-width: 100px;
    }
}

/* Estilos personalizados */
.leyenda {
    max-width: 573px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.etiqueta {
    display: flex;
    align-items: center;
}

.cuadro-color {
    height: 10px;
}

.smalll {
    font-size: 0.675em;
}

.h-90 {
    height: 90% !important;
}

@media (max-width: 380px) {
    .smalll {
        font-size: 0.875em;
    }
}

@media (max-width: 576px) {
    .h-sm-90 {
        height: 75% !important;
    }
}
</style>

<script src="./assets/js/jquery/jquery.min.js"></script>

<div class="container-fluid py-5">

    <style>
    @media (max-width: 896px) {

        .d-flex.flex-row.justify-content-center.gap-2 {
            flex-direction: column;
            gap: 0;
        }

        .d-flex.flex-row.justify-content-center.gap-2>div {
            width: 100%;
            margin-bottom: 1rem;
        }

        .grafica {
            width: 280px !important;
        }

        #contenedor-1 {
            width: 250px;
        }

        #contenedor-4 {
            width: 250px;
            height: 250px;
        }

        #container-cards {
            padding: 0;
            width: 280px !important;
        }
    }

    @media (max-width: 400px) {
        .p-10 {
            padding: 5px;
        }
    }

    @media (min-width: 1630px) {
        #container-div {
            width: 100%;
        }
    }

    .grafica1 {
        width: 350px;
    }

    .card-data {
        height: 100px;
        width: 200px;
    }

    .shadow {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }

    .item {
        display: flex;
        flex-direction: column;
    }

    .main-content {
        flex-grow: 1;
    }

    .bottom-rectangle {
        background: #d7d7d7;
        flex-shrink: 0;
    }

    #imgcontenedor {
        text-align: center;
        background: #bfd9d961;
        display: flex;
        justify-content: center;
        border: 1px solid #d7d7d7;
    }

    .box-img {
        margin-top: 5px;
        object-position: center center;
        /* Enfoca el centro de la imagen */
        min-width: 60%;
        /* Previene espacios vacíos en horizonta */
        min-height: 70%;
        /* Previene espacios vacíos en vertical */
        height: 100px;
        width: 1px
    }

    #text-contenedor {
        text-align: center;
        display: flex;
        justify-content: center;
    }

    .text-1 {
        color: #67b440;
    }


    .text-2 {
        color: #d73d3d;
    }

    #box-text {
        min-width: 50%;
        width: 2px;
        font-size: 1.4vw;
        letter-spacing: 1.2px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);
        font-family: 'Segoe UI', system-ui;
    }

    #barra-text {
        min-width: 20px;
        width: 2px;
        color: black;
        font-size: 1.5vw;
        letter-spacing: 1.2px;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', system-ui;
    }

    #img-text {
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);
        line-height: 100%;
        min-width: 28%;
        height: 1px;
        width: 2px;
        font-size: 1.5vw;
        position: absolute;
        top: 58%;

    }
    #titulos-monitoreo{
        color: white;
        font-size: 30px;
        text-shadow: 0 0 5px #8392ab;
    }
    #txt-calidad{
        font-size: 40px;
        color: white;
        text-shadow: 0 0 5px #8392ab;
    }
    </style>
<!-- titulo Principal de cada pagina!-->
    <div align="right">
        <h3 class="mb-0" id="txt-calidad">Calidad de Agua</h3>
    </div>

    <div class="container px-3">
        <div class="row">
            <div class="col-12 pt-2 px-0" id="container-div">
                <h3 id="titulos-monitoreo" class="mb-0" >Monitoreo Nacional de Calidad de Agua</h3>
                <!-- ORLANDO AGREGAR DIV CONTENEDOR -->
                <div class="container py-3 px-0" style="padding-left:20px;">
                    <div class="card h-100" style=" box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px !important;">
                        <div class="card-header pb-0">
                        </div>
                        <div class="card-body col-12 h-100 pt-0" id="contenedor" style="height:300px !important;">
                            <div class="border border-radius-lg h-100 d-flex gap-2">
                                <div class="item flex-fill ">
                                    <div id="imgcontenedor" class="main-content h-80"
                                        style="border-top-left-radius: 10px;">
                                        <img class="box-img" src="./img/turbidez.png" type="button"
                                            data-bs-title="Turbidez" data-bs-toggle="popover"
                                            data-bs-content="Es la caracterizacion que tiene el cuerpo del agua tomada por el equipo">
                                        <span id="img-text" class="fw-bolder">Turbidez</span>
                                    </div> <!-- 80% de altura -->
                                    <div class="bottom-rectangle w-100" style="height: 20%; ">
                                        <div id="text-contenedor" class="main-content h-80;">
                                            <span id="box-text" class=" text-1 fw-bolder" data-bs-placement="top"
                                                type="button" data-bs-toggle="tooltip" title="texto del tooltip"><u>3
                                                    Embalses</u></span>
                                            <span id="barra-text" class="mb-0">/</span>
                                            <span id="box-text" class="text-2 fw-bolder""
 data-bs-placement=" top" type="button" data-bs-toggle="tooltip" title="texto del tooltip"><u>2 Embalses</u></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item flex-fill ">
                                    <div id="imgcontenedor" class="main-content h-80">
                                        <img class="box-img" src="./img/temperatura.png" type="button"
                                            data-bs-title="Turbidez" data-bs-toggle="popover"
                                            data-bs-content="Es la caracterizacion que tiene el cuerpo del agua tomada por el equipo">
                                        <span id="img-text" class="fw-bolder">Temperatura de agua</span>
                                    </div> <!-- 80% de altura -->
                                    <div class="bottom-rectangle w-100" style="height: 20%;">
                                        <div id="text-contenedor" class="main-content h-80">
                                            <span id="box-text" class="text-1 fw-bolder" data-bs-placement="top"
                                                type="button" data-bs-toggle="tooltip" title="texto del tooltip"><u>4
                                                    Embalses</u> </span>
                                            <span id="barra-text" class="mb-0">/</span>
                                            <span id="box-text" class="text-2 fw-bolder""
 data-bs-placement=" top" type="button" data-bs-toggle="tooltip" title="texto del tooltip"><u>1 Embalses</u></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="imgs" class="item flex-fill ">
                                    <div id="imgcontenedor" class="main-content h-80"
                                        style="border-top-right-radius: 10px;">
                                        <img class="box-img" src="./img/salinidad.png" type="button"
                                            data-bs-title="Turbidez" data-bs-toggle="popover"
                                            data-bs-content="Es la caracterizacion que tiene el cuerpo del agua tomada por el equipo">
                                        <span id="img-text" class="fw-bolder">Salinidad</span>
                                    </div> <!-- 80% de altura -->
                                    <div class="bottom-rectangle w-100" style="height: 20%;">
                                        <div id="text-contenedor" class="main-content h-80">
                                            <span id="box-text" class="text-1 fw-bolder" data-bs-placement="top"
                                                type="button" data-bs-toggle="tooltip" title="texto del tooltip"><u>0
                                                    Embalses</u> </span>
                                            <span id="barra-text" class="mb-0">/</span>
                                            <span id="box-text" class="text-2 fw-bolder""
 data-bs-placement=" top" type="button" data-bs-toggle="tooltip" title="texto del tooltip"><u>3 Embalses</u></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ARZEN AGREGAR DIV CONTENEDOR -->
            </div>
        </div>
    </div>
    <div class="container px-3">
        <div class="row">
            <div class="col-12 pt-2 px-0" id="container-div">
                <!-- ORLANDO AGREGAR DIV CONTENEDOR -->
                <div class="container py-3 px-0" style="padding-left:20px;">
                    <div class="card h-100" style=" box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px !important;">
                        <div class="card-header pb-0">
                        </div>
                        <div class="card-body col-12 h-100 pt-0" id="contenedor" style="height:300px !important;">
                            <div class="border border-radius-lg h-100 d-flex gap-2">
                                <div class="item flex-fill">
                                    <div id="imgcontenedor" class="main-content h-80"
                                        style="border-top-left-radius: 10px;">
                                        <img class="box-img" src="./img/h2o.png" type="button" data-bs-title="Turbidez"
                                            data-bs-toggle="popover"
                                            data-bs-content="Es la caracterizacion que tiene el cuerpo del agua tomada por el equipo">
                                        <span id="img-text" class="fw-bolder">Potencial oxido-Reducción</span>
                                    </div> <!-- 80% de altura -->
                                    <div class="bottom-rectangle w-100" style="height: 20%;">
                                        <div id="text-contenedor" class="main-content h-80">
                                            <span id="box-text" class="text-1 fw-bolder" data-bs-placement="top"
                                                type="button" data-bs-toggle="tooltip" title="texto del tooltip"><u>5
                                                    Embalses</u> </span>
                                            <span id="barra-text" class="mb-0">/</span>
                                            <span id="box-text" class="text-2 fw-bolder""
 data-bs-placement=" top" type="button" data-bs-toggle="tooltip" title="texto del tooltip"><u>0 Embalses</u></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item flex-fill ">
                                    <div id="imgcontenedor" class="main-content h-80">
                                        <img class="box-img" src="./img/conductividad.png" type="button"
                                            data-bs-title="Turbidez" data-bs-toggle="popover"
                                            data-bs-content="Es la caracterizacion que tiene el cuerpo del agua tomada por el equipo">
                                        <span id="img-text" class="fw-bolder">Conductividad</span>
                                    </div> <!-- 80% de altura -->
                                    <div class="bottom-rectangle w-100" style="height: 20%; box-sizing:border-box;">
                                        <div id="text-contenedor" class="main-content h-80">
                                            <span id="box-text" class="text-1 fw-bolder" data-bs-placement="top"
                                                type="button" data-bs-toggle="tooltip" title="texto del tooltip"><u>1
                                                    Embalses</u> </span>
                                            <span id="barra-text" class="mb-0">/</span>
                                            <span id="box-text" class="text-2 fw-bolder""
 data-bs-placement=" top" type="button" data-bs-toggle="tooltip" title="texto del tooltip"><u>4 Embalses</u></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item flex-fill ">
                                    <div id="imgcontenedor" class="main-content h-80"
                                        style="border-top-right-radius: 10px;">
                                        <img class="box-img" src="./img/hidrogeno.png" type="button"
                                            data-bs-title="Turbidez" data-bs-toggle="popover"
                                            data-bs-content="Es la caracterizacion que tiene el cuerpo del agua tomada por el equipo">
                                        <span id="img-text" class="fw-bolder">Potencial de Hidrógeno</span>
                                    </div> <!-- 80% de altura -->
                                    <div class="bottom-rectangle w-100" style="height: 20%;">
                                        <div id="text-contenedor" class="main-content h-80">
                                            <span id="box-text" class="text-1 fw-bolder""
 data-bs-placement=" top" type="button" data-bs-toggle="tooltip" title="texto del tooltip"><u>3 Embalses</u> </span>
                                            <span id="barra-text" class="mb-0">/</span>
                                            <span id="box-text" class="text-2 fw-bolder""
 data-bs-placement=" top" type="button" data-bs-toggle="tooltip" title="texto del tooltip"><u>2 Embalses</u></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ARZEN AGREGAR DIV CONTENEDOR -->
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-12 pt-2 bg-white rounded mt-4 shadow" id="container-div">
                <div class=" d-flex flex-row flex-wrap justify-content-around gap-2 pb-2" id="contain-charts">
                    <div class="col-12 pb-2 pt-1">

                        <h4 class="mb-0">MAPA</h4>

                    </div>
                    <div class="d-flex justify-content-center align-items-center bg-secondary w-100 rounded"
                        style="height: 700px;">
                        <div class="rounded" id="mapa-c"
                            style="position:absolute; height: 700px;width:79%;z-index:1400 !important;background-color:#8392ab">
                        </div>
                        <div id="mapa-container" class="d-flex rounded"
                            style="height: 700px; overflow: hidden !important;"></div>
                        <!-- <div id="mapa-portada" style="width: 100%; height: 100%;"></div> -->

                    </div>

                    <div class="row justify-content-center gap-sm-2 ">
                        <!-- <img src="./assets/icons/leyenda_mapa.png"> -->
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-4 mt-4 mb-3" style="padding-left:20px;" hidden>
                <div class="card z-index-2">
                    <div class="card-header pb-3">
                        <h6 class="mb-0">Registro de Reportes</h6>
                        <p class="text-sm">Cantidad de reportes realizados al mes</p>
                        <hr class="dark horizontal">
                        <div class="d-flex mb-3">
                            <label for="embalseSelect" class="text-sm my-auto me-1">Selecciona un embalse:</label>
                            <select style="width: 180px;" class="form-control form-select" id="embalseSelect"
                                onchange="cargarGrafico()">
                                <option style="display:none">Seleccione...</option>
                                <?php
 require_once 'php/Conexion.php';
 $sql_embalses = "SELECT id_embalse, nombre_embalse FROM embalses";
 $result_embalses = $conn->query($sql_embalses);
 while ($row_embalse = $result_embalses->fetch_assoc()) {
 echo '<option value="' . $row_embalse['id_embalse'] . '">' . $row_embalse['nombre_embalse'] . '</option>';
 }
 closeConection($conn);

 ?>
                            </select>

                        </div>
                    </div>
                    <div class="card-body p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-white shadow-dark py-3 pe-1">
                            <div class="chart mb-1 border border-radius-lg" style="height:350px !important;">
                                <canvas id="myChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </div>
</div>


<script src="./assets/js/Chart.js"></script>
<!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<!--script src="./assets/js/material-dashboard.min.js?v=3.0.4"></script-->
<script src="./assets/js/core/popper.min.js"></script>
<script src="./assets/js/core/bootstrap.min.js"></script>
<script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
<!-- <script src="./assets/js/plugins/chartjs.min.js"></script> -->
<script src="./assets/js/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="./assets/css/leaflet.css" />
<script src="./assets/js/leaflet.js"></script>
<script src="./assets/js/proj4.js"></script>



<body style="height:1500px">
</body>
<script>

</script>

<script>
var configuration = {
    type: 'bar',
    data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre',
            'Noviembre', 'Diciembre'
        ],
        datasets: []
    },
    options: {
        scales: {
            y: {
                title: {
                    display: true,
                    text: 'Cantidad de Reportes'
                },
                beginAtZero: true,
                precision: 0
            }
        }
    }
};

var ctx = document.getElementById('myChart').getContext('2d');


function volumen_actual() {
    $("#cont").html(
        '<link href="./assets/css/style-spinner.css" rel="stylesheet" /><div class="loaderPDF"><div class="lds-dual-ring"></div></div>'
        );

    $.ajax({
        url: 'php/Graficas/grafica_volumen_actual.php',
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            //$("#contenedor").html("");
            console.log("Volumen actual");
            $("#cont").html(response);
        },
        error: function(response) {

            alertify.error("Error inesperado.");

        }
    });
}

function grafica_dashboard() {
    return new Promise((resolve) => {
        $("#contenedor-1").html(
            '<link href="./assets/css/style-spinner.css" rel="stylesheet" /><div class="loaderPDF"><div class="lds-dual-ring"></div></div>'
            );
        $("#cont").html(
            '<link href="./assets/css/style-spinner.css" rel="stylesheet" /><div class="loaderPDF3"><div class="lds-dual-ring"></div></div>'
            );
        $("#contenedor-4").html(
            '<link href="./assets/css/style-spinner.css" rel="stylesheet" /><div class="loaderPDF2"><div class="lds-dual-ring"></div></div>'
            );
        $("#mapa-c").html(
            '<link href="./assets/css/style-spinner.css" rel="stylesheet" /><div class="loaderPDF" style="top:-100%;"><div class="lds-dual-ring"></div></div>'
            );
        $.ajax({
            url: 'php/Graficas/grafica_dashboard.php',
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                //$("#contenedor").html("");
                $("#contenedor-1").html(response);
                $("#mapa-c").fadeOut();
                resolve();
            },
            error: function(response) {

                console.log(response.responseText);

            }
        });

    });

};

function mapa_dashboard() {
    $("#mapa-container").html(
        '<link href="./assets/css/style-spinner.css" rel="stylesheet" /><div class="loaderPDF" style="top:-100%;"><div class="lds-dual-ring"></div></div>'
        );
    $.ajax({
        url: 'pages/mapa_dashboard.php',
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            //$("#contenedor").html("");
            $("#mapa-container").html(response);

        },
        error: function(response) {

            alertify.error("Error inesperado.");

        }
    });
};

function grafica_extraccion() {

    $.ajax({
        url: 'php/Graficas/grafica_extracciones.php',
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            //$("#contenedor").html("");
            $("#contenedor-4").html(response);

        },
        error: function(response) {

            alertify.error("Error inesperado.");

        }
    });
}


mapa_dashboard();
grafica_dashboard().then(() => {
    grafica_extraccion();
});
//volumen_actual();

$(document).ready(function() {

});

function cargarGrafico() {


    $('#embalseSelect').change(function() {
        var embalseId = $(this).val();
        console.log('Hola embalse', embalseId);

        $.ajax({
            url: './php/obtener_datos_embalses.php?id=' + embalseId,
            type: 'GET',
            dataType: 'json',
            success: function(datos) {

                datos_inicial = datos[0];
                if (window.myChart) {
                    window.myChart.destroy();
                }

                var datasets = [];
                var data = [];
                //console.log('Los datos:', datos_inicial);

                for (var mes = 1; mes <= 12; mes++) {
                    data.push(Math.round(datos_inicial[mes] || 0));
                }
                datasets.push({
                    label: $('#embalseSelect option:selected').text(),
                    data: data,
                    backgroundColor: 'rgba(' + Math.floor(Math.random() * 256) + ',' + Math
                        .floor(Math.random() * 256) + ',' + Math.floor(Math.random() *
                        256) + ', 0.7)',
                    borderColor: 'white',
                    borderWidth: 3
                });
                console.log(datasets);
                var config = {
                    type: 'bar',
                    data: {
                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                            'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ],
                        datasets: datasets
                    },
                    options: {
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                labels: {

                                    // This more specific font property overrides the global property
                                    font: {
                                        size: 20
                                    },

                                }
                            },
                        },
                        scales: {
                            y: {
                                title: {
                                    display: true,
                                    text: 'Cantidad de Reportes'
                                },
                                beginAtZero: true,
                                precision: 0
                            }
                        }
                    }
                };

                var ctx = document.getElementById('myChart').getContext('2d');
                window.myChart = new Chart(ctx, config);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });
}



//setInterval(volumen_actual, 1800000);
setInterval(mapa_dashboard, 1800000);
setInterval(grafica_dashboard, 1800000);
setInterval(grafica_extraccion, 1800000);
</script>

<!-- Inicialización JavaScript -->
<script>
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
</script>

<script>
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
</script>