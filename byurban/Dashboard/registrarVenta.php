<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Ventas</title>
</head>
<body>
<style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            text-align: center;
            margin: 30px 0;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="number"],
        input[type="date"] {
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

    // Verificar si se envió el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los valores del formulario
        $id_producto = $_POST["id_producto"];
        $fecha_venta = $_POST["fecha_venta"];
        $cantidad = $_POST["cantidad"];
        $precio_total = $_POST["precio_total"];

        // Insertar los datos de la venta en la base de datos
        $sql = "INSERT INTO ventas (id_producto, fecha_venta, cantidad, precio_total) VALUES ($id_producto, '$fecha_venta', $cantidad, $precio_total)";
        if (mysqli_query($con, $sql)) {
            echo "La venta se ha registrado correctamente.";
        } else {
            echo "Error al registrar la venta: " . mysqli_error($con);
        }
    }

    mysqli_close($con);
    ?>

    <h1>Registro de Ventas</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="id_producto">ID Producto:</label>
        <input type="number" name="id_producto" required><br>

        <label for="fecha_venta">Fecha de Venta:</label>
        <input type="date" name="fecha_venta" required><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" required><br>

        <label for="precio_total">Precio Total:</label>
        <input type="number" name="precio_total" required><br>

        <input type="submit" value="Registrar Venta">
    </form>
</body>
</html>