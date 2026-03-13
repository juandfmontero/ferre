<?php
// Si tu XAMPP dice 3306, usa solo "127.0.0.1"
// Si realmente configuraste XAMPP para usar el 3307, déjalo como está
$host = "127.0.0.1"; 
$user = "root";
$pass = "";
$db   = "adventure_db";

// Intento de conexión
$conexion = mysqli_connect($host, $user, $pass, $db);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($conexion, "utf8");
?>