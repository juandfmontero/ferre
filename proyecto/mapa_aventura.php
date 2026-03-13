<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario_id'])) { header("Location: index.php"); exit(); }

$id = $_SESSION['usuario_id'];
$query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE id = '$id'");
$u = mysqli_fetch_assoc($query);

// Lógica de misiones dinámicas
$misiones = [
    'principiante' => ['Privacidad 101', 'Tus primeras claves', 'Navegación Básica'],
    'intermedio'   => ['Caza del Phishing', 'Doble Factor (2FA)', 'Redes Protegidas'],
    'avanzado'     => ['Criptografía Real', 'Servidores Seguros', 'Auditoría de Red']
];

$nivel = $u['nivel'];
$lista = $misiones[$nivel] ?? $misiones['principiante'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos.css">
    <title>Mapa | Adventure Academy</title>
</head>
<body>
    <div class="map-wrapper">
        <div class="user-bar">
            <div class="user-profile">
                <div class="avatar-circle"><img src="https://api.dicebear.com/7.x/bottts/svg?seed=<?php echo $u['avatar']; ?>"></div>
                <div class="user-text">
                    <h3><?php echo $u['nombre']; ?></h3>
                    <span class="badge"><?php echo ucfirst($nivel); ?></span>
                </div>
            </div>
            <a href="logout.php" style="color:white; font-size:0.8rem;">Cerrar Sesión</a>
        </div>

        <div class="map-content">
            <h2>Mapa de Aprendizaje</h2>
            <div class="misiones-grid">
                <?php foreach($lista as $index => $titulo): ?>
                <div class="card">
                    <h4><?php echo $titulo; ?></h4>
                    <p>Misión recomendada para nivel <?php echo $nivel; ?>.</p>
                    <a href="#" class="btn-mision">Empezar</a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <footer class="creditos-esquina">Hecho por 5to de Telemática A</footer>
</body>
</html>