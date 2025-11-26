<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// ... (código PHP sin cambios)

$referrer = $_GET['referrer'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>estilos.css">
    <link rel="icon" type="image/jpeg" href="<?php echo ADMIN_URL; ?>img/bebidas.jpg">
</head>
<body>
<div class="container">
    <h2>Iniciar sesión</h2>

    <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <div class="success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form action="<?php echo ADMIN_URL; ?>index.php?accion=login" method="POST">
    
        <input type="hidden" name="referrer" value="<?= htmlspecialchars($referrer) ?>">

        <label>Usuario:</label>
        <input type="text" name="usuario_login" placeholder="Ingresar usuario" required>
        <label>Contraseña:</label>
        <input type="password" name="password_login" placeholder="Ingresar contraseña" required>
        <label>Captcha:</label>
        <input type="text" name="captcha" placeholder="Código de seguridad" required>
        <img src="<?php echo ADMIN_URL; ?>helpers/captcha.php" alt="captcha">
        <a href="#" onclick="this.previousElementSibling.src='<?php echo ADMIN_URL; ?>helpers/captcha.php?'+Math.random(); return false;">Recargar captcha</a>

        <button type="submit">Ingresar</button>
        
        <p>¿No tenés una cuenta? <a href="<?php echo ADMIN_URL; ?>index.php?accion=registrar">Registrate aquí</a></p>
        
    </form>
</div>
</body>
</html>