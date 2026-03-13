<?php
include("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $tel = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $fecha = mysqli_real_escape_string($conexion, $_POST['fecha_nac']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $user = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $avatar = mysqli_real_escape_string($conexion, $_POST['avatar']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, telefono, fecha_nac, email, usuario, password, avatar) 
            VALUES ('$nombre', '$tel', '$fecha', '$email', '$user', '$pass', '$avatar')";

    if (mysqli_query($conexion, $sql)) {
        // REDIRECCIÓN DIRECTA AL LOGIN (Como Facebook)
        header("Location: index.php?registro=exito");
        exit();
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>