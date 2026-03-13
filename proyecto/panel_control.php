<?php
session_start();
include("conexion.php");

// 1. SEGURIDAD: Si no hay sesión, al login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

$id_usuario = $_SESSION['usuario_id'];
$nombre = $_SESSION['nombre'];

// 2. LÓGICA DE SALTO: Si ya tiene nivel, mandarlo directo al mapa
$query = mysqli_query($conexion, "SELECT nivel FROM usuarios WHERE id = '$id_usuario'");
$datos = mysqli_fetch_assoc($query);

if ($datos['nivel'] !== 'no_definido' && !empty($datos['nivel'])) {
    header("Location: mapa_aventura.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Academy | Nivel</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="main-container">
        <h2>¡Bienvenido, <?php echo $nombre; ?>!</h2>
        <p>Para iniciar tu viaje, dinos qué tanto sabes de tecnología.</p>

        <form action="guardar_nivel.php" method="POST" class="opciones-nivel">
            
            <button type="submit" name="nivel" value="principiante" class="btn-nivel">
                <strong>🌱 Principiante</strong>
                <span>Estoy aprendiendo lo básico sobre internet.</span>
            </button>

            <button type="submit" name="nivel" value="intermedio" class="btn-nivel">
                <strong>🔍 Intermedio</strong>
                <span>Sé proteger mis cuentas y navegar con cuidado.</span>
            </button>

            <button type="submit" name="nivel" value="avanzado" class="btn-nivel">
                <strong>🛡️ Avanzado</strong>
                <span>Entiendo sobre redes, virus y seguridad profunda.</span>
            </button>

        </form>

        <a href="logout.php" style="display:block; margin-top:20px; color:#e74c3c; text-decoration:none; font-size:0.85rem;">Cerrar Sesión</a>
    </div>

    <footer class="creditos-esquina">
        Hecho por 5to de Telemática A
    </footer>
</body>
</html>