
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Tabla de Usuarios</title>
</head>
<body>
  <div class="container">
    <h2>Tabla de Usuarios</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
      <?php
          include('conexion.php');

          $result = mysqli_query($con, "SELECT id_usr, usr_name, usr_lastname, usr_email FROM usuarios");
          if (!$result) {
              die("Error en la consulta: " . mysqli_error($con));
          }

          if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id_usr'] . "</td>";
                echo "<td>" . $row['usr_name'] . "</td>";
                echo "<td>" . $row['usr_lastname'] . "</td>";
                echo "<td>" . $row['usr_email'] . "</td>";
                echo "<td>";
                echo "<button class='btn btn-primary' data-toggle='modal' data-target='#editarModal' data-id='" . $row['id_usr'] . "' data-name='" . $row['usr_name'] . "' data-lastname='" . $row['usr_lastname'] . "' data-email='" . $row['usr_email'] . "'>Editar</button>";                echo "<a href='controlador.php?id_usr=" . $row['id_usr'] . "' class='btn btn-danger'>Borrar</a>";
                echo "</td>";
                echo "</tr>";
              }
          } else {
              echo "No se encontraron registros";
          }

          mysqli_free_result($result);
          mysqli_close($con);
      ?>
      </tbody>
    </table>
  </div>
<!-- Botón para editar o crear registro -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarModal" data-id="" data-action="crear">
  Crear nuevo registro
</button>
  <!-- Modal de Edición -->
<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editarForm" action="registro.php" method="post">
          <div class="form-group">
            <label for="editId">ID:</label>
            <input type="text" class="form-control" id="editId" name="id" readonly>
          </div>
          <div class="form-group">
            <label for="editNombre">Nombre:</label>
            <input type="text" class="form-control" id="editNombre" name="nombre">
          </div>
          <div class="form-group">
            <label for="editApellido">Apellido:</label>
            <input type="text" class="form-control" id="editApellido" name="apellido">
          </div>
          <div class="form-group">
            <label for="editEmail">Email:</label>
            <input type="email" class="form-control" id="editEmail" name="email">
          </div>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php


