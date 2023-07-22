<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
</head>
<body>
<style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 30px;
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

    // Verificar si se envió el formulario de creación
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los valores del formulario
        $cantidad = $_POST["cantidad"];
        $id_tipo = $_POST["id_tipo"];
        $id_talla = $_POST["id_talla"];
        $id_color = $_POST["id_color"];
        $precio_und = $_POST["precio_und"];

        // Insertar los datos del producto en la base de datos
        $sql = "INSERT INTO productos (cantidad, id_tipo, id_talla, id_color, precio_und) VALUES ($cantidad, $id_tipo, $id_talla, $id_color, $precio_und)";
        if (mysqli_query($con, $sql)) {
            echo "El producto se ha creado correctamente.";
        } else {
            echo "Error al crear el producto: " . mysqli_error($con);
        }
    }
    ?>

    <h1>Crear Producto</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" required><br>

        <label for="id_tipo">ID Tipo:</label>
        <input type="number" name="id_tipo" required><br>

        <label for="id_talla">ID Talla:</label>
        <input type="number" name="id_talla" required><br>

        <label for="id_color">ID Color:</label>
        <input type="number" name="id_color" required><br>

        <label for="precio_und">Precio Unitario:</label>
        <input type="number" name="precio_und" step="0.01" required><br>

        <input type="submit" value="Crear Producto">
    </form>

    <?php
    // Cerramos la conexión a la base de datos
    mysqli_close($con);
    ?>
</body>
</html>