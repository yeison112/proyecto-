<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editarProducto.css">

    <title>Editar Producto</title>
</head>
<body>
    <style>
        /* Estilos globales */

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

/* Estilos del formulario de edición */

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
input[type="submit"] {
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

/* Estilos para el mensaje de éxito o error */

.success-message,
.error-message {
  text-align: center;
  padding: 10px;
  margin-bottom: 15px;
  border-radius: 4px;
}

.success-message {
  color: #4caf50;
  background-color: #dff0d8;
  border: 1px solid #d0e9c6;
}

.error-message {
  color: #d8000c;
  background-color: #ffd2d2;
  border: 1px solid #ebccd1;
}

    </style>
    <?php
    include("../Dashboard/php/conexion.php");
    $con = conectar();

    // Verificar si se envió el formulario de edición
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los valores del formulario
        $id_producto = $_POST["id_producto"];
        $cantidad = $_POST["cantidad"];
        $id_tipo = $_POST["id_tipo"];
        $id_talla = $_POST["id_talla"];
        $id_color = $_POST["id_color"];
        $precio_und = $_POST["precio_und"];

        // Actualizar los datos del producto en la base de datos
        $sql = "UPDATE productos SET cantidad = $cantidad, id_tipo = $id_tipo, id_talla = $id_talla, id_color = $id_color, precio_und = $precio_und WHERE id_producto = $id_producto";
        if (mysqli_query($con, $sql)) {
            echo "El producto se ha actualizado correctamente.";
        } else {
            echo "Error al actualizar el producto: " . mysqli_error($con);
        }
    }

    // Obtener el ID del producto a editar
    if (isset($_GET["id"])) {
        $id_producto = $_GET["id"];

        // Consultar los datos del producto a editar
        $sql = "SELECT * FROM productos WHERE id_producto = $id_producto";
        $query = mysqli_query($con, $sql);

        // Comprobar si se encontró el producto
        if (mysqli_num_rows($query) == 1) {
            // Obtener los datos del producto
            $row = mysqli_fetch_assoc($query);
            $id_producto = $row['id_producto'];
            $cantidad = $row['cantidad'];
            $id_tipo = $row['id_tipo'];
            $id_talla = $row['id_talla'];
            $id_color = $row['id_color'];
            $precio_und = $row['precio_und'];

            // Mostrar el formulario de edición con los datos del producto
            echo '
            <h1>Editar Producto</h1>
            <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
                <input type="hidden" name="id_producto" value="' . $id_producto . '">
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" value="' . $cantidad . '" required><br>

                <label for="id_tipo">ID Tipo:</label>
                <input type="number" name="id_tipo" value="' . $id_tipo . '" required><br>

                <label for="id_talla">ID Talla:</label>
                <input type="number" name="id_talla" value="' . $id_talla . '" required><br>

                <label for="id_color">ID Color:</label>
                <input type="number" name="id_color" value="' . $id_color . '" required><br>

                <label for="precio_und">Precio Unitario:</label>
                <input type="number" name="precio_und" value="' . $precio_und . '" step="0.01" required><br>

                <input type="submit" value="Actualizar Producto">
                
            </form>';
        } else {
            echo "No se encontró el producto.";
        }
    }

    // Cerramos la conexión a la base de datos
    mysqli_close($con);
    ?>
</body>
</html>