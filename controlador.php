<?php
include('conexion.php');

// Verificar si se recibió el parámetro 'id_usr'
if (isset($_GET['id_usr'])) {
  $id = $_GET['id_usr'];

  // Realizar la consulta para eliminar el registro
  $sql = "DELETE FROM usuarios WHERE id_usr = ?";
  $stmt = mysqli_prepare($con, $sql);

  if ($stmt) { // Verificar si la preparación de la sentencia fue exitosa
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    // Verificar si se eliminó correctamente
    if (mysqli_stmt_affected_rows($stmt) > 0) {
      echo "El registro ha sido eliminado exitosamente.";
    } else {
      echo "No se pudo eliminar el registro.";
    }

    mysqli_stmt_close($stmt);
  } else {
    echo "Error en la preparación de la consulta: " . mysqli_error($con);
  }
} else {
  echo "ID de registro no proporcionado.";
}

mysqli_close($con);
?>
