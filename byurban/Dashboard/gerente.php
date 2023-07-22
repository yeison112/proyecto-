<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="gerente.css">
    <link rel="stylesheet" href="gerente.css">

  <title>BeUrban</title>
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

/* Estilos del encabezado */

header {
  background-color: #007bff;
  padding: 15px 0;
}

header h1 {
  color: #fff;
}

/* Estilos de la barra de navegación */

nav {
  background-color: #333;
  text-align: center;
}

nav ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

nav ul li {
  display: inline-block;
  margin-right: 20px;
}

nav ul li:last-child {
  margin-right: 0;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
  padding: 10px 15px;
  display: block;
}

nav ul li a:hover {
  background-color: #444;
}

/* Estilos del contenido principal */

main {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

.module {
  margin-bottom: 30px;
}

/* Estilos de la tabla */

table {
  width: 100%;
  border-collapse: collapse;
}

table th,
table td {
  padding: 10px;
  border: 1px solid #ccc;
  text-align: center;
}

table th {
  background-color: #007bff;
  color: #fff;
}

/* Estilos de los enlaces para crear registros */

.module a {
  display: inline-block;
  background-color: #007bff;
  color: #fff;
  padding: 8px 15px;
  text-decoration: none;
  margin-bottom: 10px;
  border-radius: 4px;
}

.module a:hover {
  background-color: #0056b3;
}

/* Estilos para la tabla cuando no se encuentran resultados */

.module table tbody tr td {
  text-align: center;
  color: #888;
}

/* Estilos de los botones de acción en la tabla */

.module table tbody tr td a {
  display: inline-block;
  background-color: #444;
  color: #fff;
  padding: 6px 10px;
  text-decoration: none;
  margin-right: 5px;
  border-radius: 4px;
}

.module table tbody tr td a:hover {
  background-color: #666;
}

  </style>
  <header>
    <h1>Bienvenido Gerente! </h1>
  </header>
  <nav>
    <ul>
      <li><a href="#pedidos">Pedidos</a></li>
      <li><a href="#ventas">Ventas</a></li>
      <li><a href="#inventario">Inventario</a></li>
      <li><a href="#compras">Compras</a></li>
      <li><a href="#usuarios">Usuarios</a></li>
      <li><a href="../index.html">Cerrar Sesión</a></li>

    </ul>
  </nav>
  <main>
    <div id="pedidos" class="module">
      <h2>Pedidos</h2>

      <a href="../Dashboard/registrarPedido.php"> Crear Pedido</a>
      <?php

include("../Dashboard/php/conexion.php");
$con = conectar();

$sql = "SELECT * FROM pedidos";
$query = mysqli_query($con, $sql);

// Comprobamos si hay resultados
if (mysqli_num_rows($query) > 0) {
    echo '<table>
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>Fecha</th>
                    <th>Dirección</th>
                    <th>ID Estado</th>
                    <th>ID Producto</th>
                    <th>ID Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>';
    // Iteramos sobre los resultados
    while ($row = mysqli_fetch_assoc($query)) {
        // Accedemos a los datos de cada fila
        $id_pedido = $row['id_pedido'];
        $fecha = $row['fecha'];
        $direccion = $row['direccion'];
        $id_estado = $row['id_estado'];
        $id_producto = $row['id_producto'];
        $id_usuario = $row['id_usuario'];

        // Agregamos una fila a la tabla con los datos y los botones de editar y eliminar
        echo "<tr>
                <td>$id_pedido</td>
                <td>$fecha</td>
                <td>$direccion</td>
                <td>$id_estado</td>
                <td>$id_producto</td>
                <td>$id_usuario</td>
                <td>
                    <a href='actualizarPedido.php?id=$id_pedido'>Editar</a>
                    <a href='eliminarPedido.php?id=$id_pedido'>Eliminar</a>
                </td>
              </tr>";
    }
    echo '</tbody>
          </table>';
} else {
    echo "No se encontraron resultados.";
}
?>

    </div>
    <div id="ventas" class="module">
      <h2>Ventas</h2>
      <a href="../Dashboard/registrarVenta.php">Crear Venta</a>
    
    <?php
 
    
    $sql_ventas = "SELECT * FROM ventas";
    $query_ventas = mysqli_query($con, $sql_ventas);
    
    // Comprobamos si hay resultados
    if (mysqli_num_rows($query_ventas) > 0) {
        echo '<table>
                <thead>
                    <tr>
                        <th>ID Venta</th>
                        <th>ID Producto</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Precio Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>';
        // Iteramos sobre los resultados
        while ($row = mysqli_fetch_assoc($query_ventas)) {
            // Accedemos a los datos de cada fila
            $id_venta = $row['id_venta'];
            $id_producto = $row['id_producto'];
            $fecha_venta = $row['fecha_venta'];
            $cantidad = $row['cantidad'];
            $precio_total = $row['precio_total'];
            
            // Agregamos una fila a la tabla con los datos y los botones de editar y eliminar
            echo "<tr>
                    <td>$id_venta</td>
                    <td>$id_producto</td>
                    <td>$fecha_venta</td>
                    <td>$cantidad</td>
                    <td>$precio_total</td>
                    <td>
                        <a href='actualizarVenta.php?id=$id_venta'>Editar</a>
                        <a href='eliminarVenta.php?id=$id_venta'>Eliminar</a>
                    </td>
                  </tr>";
        }
        echo '</tbody>
              </table>';
    } else {
        echo "No se encontraron resultados.";
    }
    ?>
    </div>
    <div id="inventario" class="module">
      <h2>Inventario</h2>
      <a href="../Dashboard/registrarProducto.php">Agregar Producto</a>
    
    <?php
    
    
    $sql_inventario = "SELECT * FROM productos";
    $query_inventario = mysqli_query($con, $sql_inventario);
    
    // Comprobamos si hay resultados
    if (mysqli_num_rows($query_inventario) > 0) {
        echo '<table>
                <thead>
                    <tr>
                        <th>ID Producto</th>
                        <th>Cantidad</th>
                        <th>ID Tipo</th>
                        <th>ID Talla</th>
                        <th>ID Color</th>
                        <th>Precio Unitario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>';
        // Iteramos sobre los resultados
        while ($row = mysqli_fetch_assoc($query_inventario)) {
            // Accedemos a los datos de cada fila
            $id_producto = $row['id_producto'];
            $cantidad = $row['cantidad'];
            $id_tipo = $row['id_tipo'];
            $id_talla = $row['id_talla'];
            $id_color = $row['id_color'];
            $precio_und = $row['precio_und'];
            
            // Agregamos una fila a la tabla con los datos y los botones de editar y eliminar
            echo "<tr>
                    <td>$id_producto</td>
                    <td>$cantidad</td>
                    <td>$id_tipo</td>
                    <td>$id_talla</td>
                    <td>$id_color</td>
                    <td>$precio_und</td>
                    <td>
                        <a href='actualizarProducto.php?id=$id_producto'>Editar</a>
                        <a href='eliminarProducto.php?id=$id_producto'>Eliminar</a>
                    </td>
                  </tr>";
        }
        echo '</tbody>
              </table>';
    } else {
        echo "No se encontraron resultados.";
    }
    ?>
    </div>
    <div id="compras" class="module">
      <h2>Compras</h2>
      <a href="../Dashboard/registrarCompra.php">Agregar Compra</a>
    
    <?php
    
    
    $sql_compras = "SELECT * FROM compras";
    $query_compras = mysqli_query($con, $sql_compras);
    
    // Comprobamos si hay resultados
    if (mysqli_num_rows($query_compras) > 0) {
        echo '<table>
                <thead>
                    <tr>
                        <th>ID Compra</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Descripción</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                        <th>ID Proveedor</th>
                        <th>ID Producto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>';
        // Iteramos sobre los resultados
        while ($row = mysqli_fetch_assoc($query_compras)) {
            // Accedemos a los datos de cada fila
            $id_compra = $row['id_compra'];
            $fecha_compra = $row['fecha_compra'];
            $cantidad = $row['cantidad'];
            $descripcion = $row['descripcion'];
            $precio_und = $row['precio_und'];
            $total = $row['total'];
            $id_proveedor = $row['id_proveedor'];
            $id_producto = $row['id_producto'];
            
            // Agregamos una fila a la tabla con los datos y los botones de editar y eliminar
            echo "<tr>
                    <td>$id_compra</td>
                    <td>$fecha_compra</td>
                    <td>$cantidad</td>
                    <td>$descripcion</td>
                    <td>$precio_und</td>
                    <td>$total</td>
                    <td>$id_proveedor</td>
                    <td>$id_producto</td>
                    <td>
                        <a href='actualizarCompra.php?id=$id_compra'>Editar</a>
                        <a href='eliminarCompra.php?id=$id_compra'>Eliminar</a>
                    </td>
                  </tr>";
        }
        echo '</tbody>
              </table>';
    } else {
        echo "No se encontraron resultados.";
    }
    ?>
    </div>
    <div id="usuarios" class="module">
      <h2>Usuarios</h2>
      <a href="../Dashboard/registrarUsuario.php">Agregar Usuario</a>
    
    <?php
   
    
    $sql_usuarios = "SELECT * FROM usuarios";
    $query_usuarios = mysqli_query($con, $sql_usuarios);
    
    // Comprobamos si hay resultados
    if (mysqli_num_rows($query_usuarios) > 0) {
        echo '<table>
                <thead>
                    <tr>
                        <th>ID Usuario</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Fecha de Nacimiento</th>
                        <th>ID Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>';
        // Iteramos sobre los resultados
        while ($row = mysqli_fetch_assoc($query_usuarios)) {
            // Accedemos a los datos de cada fila
            $id_usuario = $row['id_usuario'];
            $nombres = $row['nombres'];
            $apellidos = $row['apellidos'];
            $telefono = $row['telefono'];
            $correo = $row['correo'];
            $fecha_nacimiento = $row['fecha_nacimiento'];
            $id_tipo = $row['id_tipo'];
            
            // Agregamos una fila a la tabla con los datos y los botones de editar y eliminar
            echo "<tr>
                    <td>$id_usuario</td>
                    <td>$nombres</td>
                    <td>$apellidos</td>
                    <td>$telefono</td>
                    <td>$correo</td>
                    <td>$fecha_nacimiento</td>
                    <td>$id_tipo</td>
                    <td>
                        <a href='actualizarUsuario.php?id=$id_usuario'>Editar</a>
                        <a href='eliminarUsuario.php?id=$id_usuario'>Eliminar</a>
                    </td>
                  </tr>";
        }
        echo '</tbody>
              </table>';
    } else {
        echo "No se encontraron resultados.";
    }
    ?>
    </div>
  </main>
</body>
</html>