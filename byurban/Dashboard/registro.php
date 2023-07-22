<?php
// Conectar a la base de datos (modifica los valores según tu configuración)
$conexion = new mysqli('byurban', 'usuario', 'contraseña', 'registro');

// Verificar si la conexión tuvo éxito
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$apellido= $_POST['apellido'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Se encripta la contraseña

// Insertar los datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";

if ($conexion->query($sql) === TRUE) {
    echo "Registro exitoso. ¡Bienvenido, $nombre!";
} else {
    echo "Error al registrar el usuario: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
