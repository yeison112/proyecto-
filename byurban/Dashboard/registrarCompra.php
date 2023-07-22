<?php
include("../Dashboard/php/conexion.php");
$con = conectar();

// Verificar si se envió el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $fecha_compra = $_POST["fecha_compra"];
    $cantidad = $_POST["cantidad"];
    $descripcion = $_POST["descripcion"];
    $precio_und = $_POST["precio_und"];
    $total = $_POST["total"];
    $id_proveedor = $_POST["id_proveedor"];
    $id_producto = $_POST["id_producto"];

    // Insertar los datos de la compra en la base de datos
    $sql = "INSERT INTO compras (fecha_compra, cantidad, descripcion, precio_und, total, id_proveedor, id_producto) VALUES ('$fecha_compra', $cantidad, '$descripcion', $precio_und, $total, $id_proveedor, $id_producto)";
    if (mysqli_query($con, $sql)) {
        echo "La compra se ha registrado correctamente.";
    } else {
        echo "Error al registrar la compra: " . mysqli_error($con);
    }
}

// Mostrar el formulario de registro
echo '
<h1>Registrar Compra</h1>
<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
    <label for="fecha_compra">Fecha:</label>
    <input type="date" name="fecha_compra" required><br>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" required><br>

    <label for="descripcion">Descripción:</label>
    <input type="text" name="descripcion" required><br>

    <label for="precio_und">Precio Unitario:</label>
    <input type="number" name="precio_und" step="0.01" required><br>

    <label for="total">Total:</label>
    <input type="number" name="total" step="0.01" required><br>

    <label for="id_proveedor">ID Proveedor:</label>
    <input type="number" name="id_proveedor" required><br>

    <label for="id_producto">ID Producto:</label>
    <input type="number" name="id_producto" required><br>

    <input type="submit" value="Registrar Compra">
</form>';

// Cerramos la conexión a la base de datos
mysqli_close($con);
?>