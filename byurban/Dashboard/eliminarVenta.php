<?php
include("../Dashboard/php/conexion.php");
$con = conectar();

// Verificar si se proporcionó un ID de venta válido
if (isset($_GET["id"])) {
    $id_venta = $_GET["id"];

    // Eliminar la venta de la base de datos
    $sql = "DELETE FROM ventas WHERE id_venta = $id_venta";
    if (mysqli_query($con, $sql)) {
        echo "La venta se ha eliminado correctamente.";
    } else {
        echo "Error al eliminar la venta: " . mysqli_error($con);
    }
} else {
    echo "No se proporcionó un ID de venta válido.";
}

// Cerramos la conexión a la base de datos
mysqli_close($con);
?>