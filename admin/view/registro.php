<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
$success = $_SESSION['success'] ?? '';
unset($_SESSION['success']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="icon" type="image/jpeg" href="<?php echo ADMIN_URL; ?>img/bebidas.jpg">
    <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>estilos.css">
</head>
<body>
<div class="container">
    <h2>Registrarse</h2>

    <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <div class="success"><?= htmlspecialchars($success) ?></div>
        <script>
            setTimeout(() => { window.location.href = 'login.php'; }, 3000);
        </script>
    <?php endif; ?>

    <form action="<?php echo ADMIN_URL; ?>index.php?accion=registrar" method="POST">
        <label>Usuario:</label>
        <input type="text" name="usuario_registro" placeholder="Crear usuario" required>
        <label>Contraseña:</label>
        <input type="password" name="password_registro" placeholder="Crear contraseña" required pattern=".{4,}" title="Mínimo 4 caracteres">
        <button type="submit">Registrarse</button>
    </form>

    <p>¿Ya tenés cuenta? <a href="login.php">Iniciá sesión aquí</a></p>
</div>
</body>
</html>