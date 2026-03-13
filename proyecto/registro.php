<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos.css">
    <title>Registro | Adventure Academy</title>
</head>
<body>
    <div class="form-card">
        <h2>Únete a la Academia</h2>
        <form action="procesar.php" method="POST">
            <div class="avatar-selector">
                <input type="radio" name="avatar" value="1" id="av1" checked>
                <label for="av1"><img src="https://api.dicebear.com/7.x/bottts/svg?seed=1"></label>
                <input type="radio" name="avatar" value="2" id="av2">
                <label for="av2"><img src="https://api.dicebear.com/7.x/bottts/svg?seed=2"></label>
                <input type="radio" name="avatar" value="3" id="av3">
                <label for="av3"><img src="https://api.dicebear.com/7.x/bottts/svg?seed=3"></label>
            </div>

            <div class="campo-grupo">
                <div class="campo"><label>Nombre</label><input type="text" name="nombre" required></div>
                <div class="campo"><label>Teléfono</label><input type="text" name="telefono" required></div>
            </div>

            <div class="campo"><label>Correo</label><input type="email" name="email" required></div>

            <div class="campo-grupo">
                <div class="campo"><label>Usuario</label><input type="text" name="usuario" required></div>
                <div class="campo"><label>Fecha Nac.</label><input type="date" name="fecha_nac" required></div>
            </div>

            <div class="campo-grupo">
                <div class="campo"><label>Contraseña</label><input type="password" name="password" required></div>
                <div class="campo"><label>Confirmar</label><input type="password" name="confirm_password" required></div>
            </div>

            <button type="submit" class="btn-submit">Registrarme Ahora</button>
        </form>
    </div>
    <footer class="creditos-esquina">Hecho por 5to de Telemática A</footer>
</body>
</html>