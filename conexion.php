<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "bd_tienda";

$con = mysqli_connect($servername, $username, $password, $database);

if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
