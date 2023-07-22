<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        h1 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="date"],
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    


    </style>

<?php

include("../Dashboard/php/conexion.php");
$con = conectar();

$sql = "SELECT * FROM pedidos";
$query = mysqli_query($con, $sql);


// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $fecha = $_POST["fecha"];
    $direccion = $_POST["direccion"];
    $id_estado = $_POST["id_estado"];
    $id_producto = $_POST["id_producto"];
    $id_usuario = $_POST["id_usuario"];

    // Insertar los datos del pedido en la base de datos
    $sql = "INSERT INTO pedidos (fecha, direccion, id_estado, id_producto, id_usuario) VALUES ('$fecha', '$direccion', $id_estado, $id_producto, $id_usuario)";
    if (mysqli_query($con, $sql)) {
        echo "El pedido se ha registrado correctamente.";
    } else {
        echo "Error al registrar el pedido: " . mysqli_error($con);
    }
}



?>

<h1>Formulario de Pedido</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required><br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" required><br>

        <label for="id_estado">ID Estado:</label>
        <input type="number" name="id_estado" required><br>

        <label for="id_producto">ID Producto:</label>
        <input type="number" name="id_producto" required><br>

        <label for="id_usuario">ID Usuario:</label>
        <input type="number" name="id_usuario" required><br>

        <input type="submit" value="Enviar Pedido">
    </form>
</body>
</html>