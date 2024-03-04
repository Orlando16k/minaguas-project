

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'Conexion.php';

if (isset($_GET['id'])) {
    $sql = "";
    if($_GET['id'] == "inicial"){
        $sql = "SELECT MONTH(fecha) as mes, COUNT(*) as cantidad, id_embalse FROM datos_embalse GROUP BY MONTH(fecha) LIMIT 1";
    }else{
        $embalseId = $_GET['id'];
        $sql = "SELECT MONTH(fecha) as mes, COUNT(*) as cantidad, id_embalse FROM datos_embalse WHERE id_embalse = '$embalseId' GROUP BY MONTH(fecha)";
    }

    // echo '<script>';
    // echo 'console.log("ID del embalse:", ' . json_encode($embalseId) . ');';
    // echo '</script>';

    
    $result = $conn->query($sql);

    if ($result === false) {
        die('Error en la consulta: ' . $conn->error);
    }

    $datos = array();
    $id_embalse = "Embalse";
    while ($row = $result->fetch_assoc()) {
        $mes = $row["mes"];
        $cantidad = $row["cantidad"];

        // Almacena los datos en un formato adecuado para el gráfico
        $datos[$mes] = $cantidad;
        $id_embalse = $row["id_embalse"];
    }
    $result2 = $conn->query("SELECT nombre_embalse FROM embalses WHERE id_embalse = $id_embalse");
    $row2 = $result2->fetch_assoc();
    $embalse = $row2["nombre_embalse"];

    // echo json_encode([json_encode($datos), 0]);
    echo json_encode([$datos, $embalse]);
}

$conn->close();
?>

