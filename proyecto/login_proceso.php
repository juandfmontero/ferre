<?php
include("conexion.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identificador = mysqli_real_escape_string($conexion, $_POST['identificador']);
    $pass_ingresada = $_POST['password'];

    // Buscamos al usuario
    $sql = "SELECT * FROM usuarios WHERE usuario = '$identificador' OR email = '$identificador'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
        
        // Verificamos la contraseña encriptada
        if (password_verify($pass_ingresada, $usuario['password'])) {
            // Guardamos los datos en la SESIÓN
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['avatar'] = $usuario['avatar'];

            // REDIRECCIÓN AUTOMÁTICA AL PANEL
            header("Location: panel_control.php");
            exit(); // Es vital poner exit() después de un header
        } else {
            mostrarError("Contraseña incorrecta.");
        }
    } else {
        mostrarError("El usuario no existe.");
    }
}

// Función pequeña para mostrar errores con tu diseño
function mostrarError($mensaje) {
    echo "<!DOCTYPE html><html lang='es'><head><link rel='stylesheet' href='estilos.css'></head><body>";
    echo "<div class='main-container'><h2>Error</h2><p>$mensaje</p>";
    echo "<a href='index.php' class='btn'>Reintentar</a></div></body></html>";
}
?>