<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Academy | Login</title> 
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="main-container">
        <h1>Adventure Academy</h1>
        <p>Inicia sesión para continuar tu aventura.</p>

        <form action="login_proceso.php" method="POST">
            <div class="campo">
                <label>Usuario o Correo</label>
                <input type="text" name="identificador" placeholder="Tu usuario" required>
            </div>
            <div class="campo">
                <label>Contraseña</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-submit">Entrar a la Academia</button>
        </form>

        <div class="footer-link">
            ¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a>
        </div>
    </div>
    <footer class="creditos-esquina">Hecho por 5to de Telemática A</footer>
</body>
</html>