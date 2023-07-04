<?php
include('conexion.php');
session_start();

// Obtener el email y la contraseña ingresados en el formulario de inicio de sesión
$email = $_POST['email'];
$contrasena = $_POST['password'];

// Realizar la consulta SQL para verificar las credenciales del usuario
$sql = "SELECT id_usr, usr_name FROM usuarios WHERE usr_email = ? AND usr_password = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "ss", $email, $contrasena);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $idUsuario, $nombreUsuario);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

if ($idUsuario) {
    $_SESSION['idUsuario'] = $idUsuario;
    $_SESSION['nombreUsuario'] = $nombreUsuario;

    // Otros datos del usuario, como el correo electrónico, también se pueden almacenar en la sesión
    $_SESSION['emailUsuario'] = $email;

    header("Location: inicio.html");
    exit;
} else {
    echo "Credenciales inválidas. Por favor, inténtalo de nuevo.";
}
$stmt = mysqli_prepare($con, $sql);
if (!$stmt) {
    die("Error en la preparación de la consulta: " . mysqli_error($con));
}
header("Location: inicio.html");
?>