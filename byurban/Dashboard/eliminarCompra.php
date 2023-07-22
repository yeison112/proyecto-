<?php
include("../Dashboard/php/conexion.php");
$con = conectar();

// Verificar si se proporcionó un ID de compra válido
if (isset($_GET["id"])) {
    $id_compra = $_GET["id"];

    // Eliminar la compra de la base de datos
    $sql = "DELETE FROM compras WHERE id_compra = $id_compra";
    if (mysqli_query($con, $sql)) {
        echo "La compra se ha eliminado correctamente.";
    } else {
        echo "Error al eliminar la compra: " . mysqli_error($con);
    }
} else {
    echo "No se proporcionó un ID de compra válido.";
}

// Cerramos la conexión a la base de datos
mysqli_close($con);
?>