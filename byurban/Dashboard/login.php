<?php
include("../Dashboard/php/conexion.php");
$con = conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    // Realizar una consulta a la base de datos para verificar el correo y la contraseña
    $query = "SELECT * FROM usuarios WHERE correo='$correo' AND contraseña='$contraseña'";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $idTipoUsuario = $row['id_tipo'];

            // Redirigir según el tipo de usuario
            switch ($idTipoUsuario) {
                case 1:
                    header("Location: pagina_vendedor.php");
                    break;
                case 2:
                    header("Location: pagina_cajero.php");
                    break;
                case 3:
                    header("Location: gerente.php");
                    break;
                case 4:
                    header("Location: pagina_cliente.php");
                    break;
                default:
                    echo "Tipo de usuario desconocido.";
                    break;
            }
        } else {
            echo "Correo electrónico o contraseña inválidos.";
        }
    } else {
        echo "Error al ejecutar la consulta en la base de datos.";
    }
}
?>