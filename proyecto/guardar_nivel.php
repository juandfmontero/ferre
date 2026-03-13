<?php
session_start();
include("conexion.php");

// Verificamos que el usuario esté logueado y que haya enviado un nivel
if (isset($_SESSION['usuario_id']) && isset($_POST['nivel'])) {
    $id_usuario = $_SESSION['usuario_id'];
    $nivel_elegido = mysqli_real_escape_string($conexion, $_POST['nivel']);

    // Actualizamos el nivel en la base de datos
    $sql = "UPDATE usuarios SET nivel = '$nivel_elegido' WHERE id = '$id_usuario'";

    if (mysqli_query($conexion, $sql)) {
        // Guardamos el nivel también en la sesión para usarlo luego
        $_SESSION['nivel'] = $nivel_elegido;
        
        // Redirigimos a la primera lección o al mapa de la academia
        header("Location: mapa_aventura.php");
        exit();
    } else {
        echo "Error al guardar tu progreso: " . mysqli_error($conexion);
    }
} else {
    header("Location: index.php");
    exit();
}
?>