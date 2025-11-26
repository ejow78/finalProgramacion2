<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$referrer = $_GET['referrer'] ?? '';
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
$success = $_SESSION['success'] ?? '';
unset($_SESSION['success']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>estilos.css">
    <link rel="icon" type="image/jpeg" href="<?php echo ADMIN_URL; ?>img/bebidas.jpg">
</head>
<body class="auth-body"> <div class="login-container"> <h2 style="text-align:center; margin-bottom:30px;">Iniciar sesión</h2>

    <?php if (!empty($error)): ?>
        <div class="alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <div class="alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form action="<?php echo ADMIN_URL; ?>index.php?accion=login" method="POST">
    
        <input type="hidden" name="referrer" value="<?= htmlspecialchars($referrer) ?>">

        <label>Usuario:</label>
        <input type="text" name="usuario_login" placeholder="Ingresar usuario" required>
        
        <label>Contraseña:</label>
        <input type="password" name="password_login" placeholder="Ingresar contraseña" required>
        
        <label>Captcha:</label>
        <div class="captcha-wrapper">
            <input type="text" name="captcha" placeholder="Código de seguridad" required style="margin-bottom:0;">
            <div class="captcha-box">
                <img src="<?php echo ADMIN_URL; ?>helpers/captcha.php" alt="captcha">
                <a href="#" onclick="this.previousElementSibling.src='<?php echo ADMIN_URL; ?>helpers/captcha.php?'+Math.random(); return false;">Recargar</a>
            </div>
        </div>

        <button type="submit" style="margin-top: 20px;">Ingresar</button>
        
        <p style="text-align:center; margin-top:20px;">¿No tenés una cuenta? <a href="<?php echo ADMIN_URL; ?>index.php?accion=registrar">Registrate aquí</a></p>
    </form>
</div>
</body>
</html>