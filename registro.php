<?php
include('conexion.php');

$con = new mysqli($servername, $username, $password, $database);

if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
} else {
    echo "Conexión exitosa a la base de datos.";

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $sql = "INSERT INTO usuarios (usr_name, usr_lastname, usr_email, usr_password) VALUES ('$nombre', '$apellido', '$email', '$contrasena')";

    $stmt =mysqli_prepare($con, $sql);

    mysqli_stmt_bind_param($stmt, $nombre, $apellido, $email, $password);

    if (mysqli_stmt_execute($stmt)) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar los datos: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
header("Location: inicio.html");
exit;
?>