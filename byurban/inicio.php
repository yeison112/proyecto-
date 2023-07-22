<!DOCTYPE html>
<html>
<head>
  <title>Inicio de sesión</title>
  <link rel="stylesheet" type="text/css" href="inicio.css">
</head>
<body>

  <div class="head">
    <div class="logo">
      <a href="#">Logo</a>
    </div>
    <nav class="navbar">
      <a href="registro.html">Registro</a>
      <a href="index.html">Inicio</a>
      <a href="productos.html">Productos</a>
    </nav>
  </div>

  <div class="container">
    <div class="form-wrapper">
      <form action="Dashboard/login.php" method="post">
        <h2>Inicio de sesión</h2>
        <div class="form-group">
          <label for="email">Correo electrónico:</label>
          <input type="email" id="correo" name="correo" required>
        </div>
        <div class="form-group">
          <label for="password">Contraseña:</label>
          <input type="password" id="contraseña" name="contraseña" required>
        </div>
        <input type="submit" value="Iniciar sesión">
      </form>
    </div>
  </div>

</body>
</html>
