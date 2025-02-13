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


<?php

?>

<script src="./assets/js/jquery/jquery.min.js"></script>


<div class="container-fluid py-5">
  <div class="row justify-content-center">
    <?php if ($_SESSION["Tipo"] == "Admin") { ?>

    <?php }  ?>
    <?php if ($_SESSION["Tipo"] == "Admin") { ?>

    <?php }  ?>

    <?php if ($_SESSION["Tipo"] == "Admin") { ?>

    <?php }  ?>
  </div>



  <!--grafica -->

  <!-- ... (tu código HTML) ... -->


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
    #titulo-graficas-seguimiento{
      font-size: 40px;
      color: white;
      text-shadow: 0 0 10px #8392ab;
    }
  </style>


<div class="container px-3">
    <div class="row">
      <div class="col-12 pt-2 px-0" id="container-div">
      <h4 id="titulo-graficas-seguimiento" class="mb-0">Seguimiento y Monitoreo / Gráficos </h4>
         <!-- ORLANDO AGREGAR DIV CONTENEDOR -->
             <div class="container py-3 px-0" style="padding-left:20px;">
              <div class="card h-100" style=" box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px !important;">
                <hr class="dark horizontal">
                <div class="card-body col-12 h-100 pt-0" id="contenedor" style="height:300px !important;">
                  <div class="border border-radius-lg h-100">
                    <div class="col-12 pb-2 pt-1">

                    </div>

                  </div>
                </div>
              </div>
            </div>
            <!-- ORLANDO AGREGAR DIV CONTENEDOR -->

      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">

      <div class="col-12 pt-2 bg-white rounded mt-4 shadow" id="container-div">
        <div class=" d-flex flex-row flex-wrap justify-content-around gap-2 pb-2" id="contain-charts">
          <div class="col-12 pb-2 pt-1">

          </div>
          <div class="d-flex justify-content-center align-items-center bg-secondary w-100 rounded" style="height: 700px;">
          <div class="rounded" id="mapa-c" style="position:absolute; height: 700px;width:79%;z-index:1400 !important;background-color:#8392ab"></div>
            <div id="mapa-container" class="d-flex rounded" style="height: 700px; overflow: hidden !important;"></div>
            
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
              <select style="width: 180px;" class="form-control form-select" id="embalseSelect" onchange="cargarGrafico()">
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
            <div class="bg-white  shadow-dark  py-3 pe-1">
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
  var configuration = {
    type: 'bar',
    data: {
      labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
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
    $("#cont").html('<link href="./assets/css/style-spinner.css" rel="stylesheet" /><div class="loaderPDF"><div class="lds-dual-ring"></div></div>');

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
      $("#contenedor-1").html('<link href="./assets/css/style-spinner.css" rel="stylesheet" /><div class="loaderPDF"><div class="lds-dual-ring"></div></div>');
      $("#cont").html('<link href="./assets/css/style-spinner.css" rel="stylesheet" /><div class="loaderPDF3"><div class="lds-dual-ring"></div></div>');
      $("#contenedor-4").html('<link href="./assets/css/style-spinner.css" rel="stylesheet" /><div class="loaderPDF2"><div class="lds-dual-ring"></div></div>');
      $("#mapa-c").html('<link href="./assets/css/style-spinner.css" rel="stylesheet" /><div class="loaderPDF" style="top:-100%;"><div class="lds-dual-ring"></div></div>');
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
    $("#mapa-container").html('<link href="./assets/css/style-spinner.css" rel="stylesheet" /><div class="loaderPDF" style="top:-100%;"><div class="lds-dual-ring"></div></div>');
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
  grafica_dashboard().then(() => {grafica_extraccion();});
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
            backgroundColor: 'rgba(' + Math.floor(Math.random() * 256) + ',' + Math.floor(Math.random() * 256) + ',' + Math.floor(Math.random() * 256) + ', 0.7)',
            borderColor: 'white',
            borderWidth: 3
          });
          console.log(datasets);
          var config = {
            type: 'bar',
            data: {
              labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
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