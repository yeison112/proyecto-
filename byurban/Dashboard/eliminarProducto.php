<?php
include("../Dashboard/php/conexion.php");
$con = conectar();

// Verificar si se proporcionó un ID de producto válido
if (isset($_GET["id"])) {
    $id_producto = $_GET["id"];

    // Eliminar el producto de la base de datos
    $sql = "DELETE FROM productos WHERE id_producto = $id_producto";
    if (mysqli_query($con, $sql)) {
        echo "El producto se ha eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($con);
    }
} else {
    echo "No se proporcionó un ID de producto válido.";
}

// Cerramos la conexión a la base de datos
mysqli_close($con);
?>