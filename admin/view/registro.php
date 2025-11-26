<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
$success = $_SESSION['success'] ?? '';
unset($_SESSION['success']);
require_once __DIR__ . '/../../includes/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="icon" type="image/jpeg" href="<?php echo ADMIN_URL; ?>img/bebidas.jpg">
    <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>estilos.css">
</head>
<body class="auth-body">
<div class="login-container"> <h2 style="text-align:center; margin-bottom:30px;">Registrarse</h2>

    <?php if (!empty($error)): ?>
        <div class="alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <div class="alert-success"><?= htmlspecialchars($success) ?></div>
        <script>
            setTimeout(() => { window.location.href = '<?php echo ADMIN_URL; ?>index.php?accion=login'; }, 3000);
        </script>
    <?php endif; ?>

    <form action="<?php echo ADMIN_URL; ?>index.php?accion=registrar" method="POST">
        <label>Usuario:</label>
        <input type="text" name="usuario_registro" placeholder="Crear usuario" required>
        
        <label>Contraseña:</label>
        <input type="password" name="password_registro" placeholder="Crear contraseña" required pattern=".{4,}" title="Mínimo 4 caracteres">
        
        <button type="submit">Registrarse</button>
    </form>

    <p style="text-align:center; margin-top:20px;">¿Ya tenés cuenta? <a href="<?php echo ADMIN_URL; ?>index.php?accion=login">Iniciá sesión aquí</a></p>
</div>
</body>
</html>