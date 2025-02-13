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
    .flex-padre {
      width: 1050px;
      height: 500px;
      display: flex;
      flex-direction: column;

    }
    .flex-hijo {
      font-size:25px;
      width: 200px;
      height: 100px;
      border: 3px solid black;
      margin: 20px;
      justify-content: center;
      align-items: center;
      display: flex;
    }
     .embalses_select{
      padding-top: 50px;
      padding
    }
      .contenedor-equipos-propiedades{
        border: 2px solid #D6DBE1;
        border-radius: 15px;
    }
    #titulo-situacion{
      font-size: 30px;
      color: white;
      text-shadow: 0 0 5px gray, 0 0 33px gray, 0 0 15px gray;
    }
    #txt-calidad{
      font-size: 40px;
      color: white;
      text-shadow: 0 0 5px #8392ab;
    }
  </style>

<!-- titulo Principal del modulo!-->
<div align="right">
        <h3 class="mb-0" id="txt-calidad">Calidad de Agua</h3>
    </div>
        <!-- titulo de la pagina!-->
<h4 id="titulo-situacion" class="mb-0"">Situacion por Embalse</h4>
<div class="container px-3">
    <div class="row">
      <div class="col-12 pt-2 px-0" id="container-div">
         <!-- ORLANDO AGREGAR DIV CONTENEDOR -->
             <div class="container py-3 px-0" style="padding-left:30px;">
              <div class="card h-100" style=" box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
            <hr> 
              <select id="embalses_select" class="form-select" required style="width: 180px; height: 50px; padding-left: 55px; background-color: #CDE5F0; margin-bottom: 10px; margin-left: 30px;">
                                <option value="line">Tulé</option>
                                <option value="bar">Turimiquire</option>
                                <option value="bar">Camatagua</option>
                                <option value="bar">Clavellinos</option>
                                <option value="bar">Dos Cerritos</option>
                                <option value="bar">Guàrico</option>
                                <option value="bar">Las Barrancas</option>
                                <option value="bar">Pao la Balsa</option>
                                <option value="bar">Pao - Cachinche</option>
                                <option value="bar">Taguaza</option>
                                <option value="bar"></option>
                            </select>              
            </hr>
              <div class="contenedor-equipos-propiedades">
              <hr>
                  <select id="equipos_select" class="form-select" required style="width: 180px; height: 50px; padding-left: 45px; background-color: #CDE5F0; margin-bottom: 10px; margin-left: 30px;">
                    <option value="#">Equipo 1</option>
                    <option value="#">Equipo 2</option>
                    <option value="#">Equipo 3</option>
                    <option value="#">Equipo 4</option>
                    <option value="#">Equipo 5</option>
                    <option value="#">Equipo 6</option>
                  </select>
              </hr>
                <hr class="dark horizontal">

                <div class="flex-padre">
                  <div style="display: flex;">
                    <div class="flex-hijo" style="border-radius: 15px;">pH</div>
                    <div class="flex-hijo" style="border-radius: 15px;">Turbiedad</div>
                    <div class="flex-hijo" style="border-radius: 15px;">Resistividad</div>
                    <div class="flex-hijo" style="border-radius: 15px;">TSS</div>
                  </div>
            <div style="display:flex;">
              <div class="flex-hijo" style="border-radius: 15px;">ORP</div>
              <div class="flex-hijo" style="border-radius: 15px;">Salinidad</div>
              <div class="flex-hijo" style="border-radius: 15px; text-align: center;">OD / % saturacion</div>
              <div class="flex-hijo" style="border-radius: 15px;">TDS</div>   
            </div>
                </div>
              </div>
                  </div>
                </div>
              </div>
            </div>

      </div>
    </div>
  </div>

  <div class="container d-flex flex-row gap-5">

      <div class="bg-white  mt-4 shadow" style="display:flex; justify-content: center; width:500px; height: 400px; border-radius: 20px; border: 3px solid #D6DBE1">
          <div  id="myMap" style="margin-top: 24px;  height: 350px; width: 450px; position: absolute; border-radius: 20px; border: 2px solid gray; ">
<!--           <div class="rounded" id="#" style="position:absolute; height: 100px;width:100px; !important;background-color:#8392ab"></div> -->
    <!--         <div id="#" class="d-flex rounded" style="height: 150px; overflow: hidden !important;"></div> -->
            <!-- <div id="mapa-portada" style="width: 100%; height: 100%;"></div> -->
            
          </div>
        
      </div>

      <div class="bg-white rounded mt-4 shadow" style="width:500px; height: 400px;">
        <div class=" d-flex flex-row flex-wrap justify-content-around gap-2 pb-2"  style="width: px; height: 350px;" >
          <div class="col-12 pb-2 pt-1">

                  <select class="form-select" required style="width: 180px; height: 50px; padding-left: 45px; background-color: #CDE5F0; margin-top: 20px; margin-left: 150px;">
                    <option value="#">Equipo 1</option>
                    <option value="#">Equipo 2</option>
                  </select>
          

          </div>
          <div   style="height: 300px; width: 450px;">
          <div class="chart mb-1 border border-radius-lg" style="height:350px !important;">
                <canvas id="tuChart" width="400" height="200"></canvas>
<!--           <div class="rounded" id="#" style="position:absolute; height: 100px;width:100px; !important;background-color:#8392ab"></div> -->
    <!--         <div id="#" class="d-flex rounded" style="height: 150px; overflow: hidden !important;"></div> -->
            <!-- <div id="mapa-portada" style="width: 100%; height: 100%;"></div> -->
            
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

  var ctx = document.getElementById('tuChart').getContext('2d');


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

$(document).ready(function(){

// Inicializa el mapa directamente
var map = L.map('myMap').setView([10.392386562212769, -67.17991586904276], 15);

// Agrega las capas de OpenStreetMap
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 6,
}).addTo(map);
})

</script>