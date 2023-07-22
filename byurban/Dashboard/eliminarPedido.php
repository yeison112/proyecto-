<?php

include("../Dashboard/php/conexion.php");
$con = conectar();

// Verificar si se proporcionó un ID de pedido válido
if (isset($_GET["id"])) {
    $id_pedido = $_GET["id"];

    // Eliminar el pedido de la base de datos
    $sql = "DELETE FROM pedidos WHERE id_pedido = $id_pedido";
    if (mysqli_query($con, $sql)) {
        echo "El pedido se ha eliminado correctamente.";
    } else {
        echo "Error al eliminar el pedido: " . mysqli_error($con);
    }
} else {
    echo "No se proporcionó un ID de pedido válido.";
}

// Cerramos la conexión a la base de datos
mysqli_close($con);

?>