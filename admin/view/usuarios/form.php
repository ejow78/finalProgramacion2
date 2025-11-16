<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$success = $_SESSION['success'] ?? '';
unset($_SESSION['success']);
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="/programacion2025/CRUD-MVC/estilos.css">
</head>
<body>
<div class="container">
    <h2>Registro de Usuarios</h2>

    <?php if ($success): ?>
        <div class="success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="index.php?accion=guardar_usuario" method="POST" class="formulario">
        <label>Usuario:</label>
        <input type="text" name="usuario" required>

        <label>Contraseña:</label>
        <input type="password" name="password" required>

        <label>Rol:</label>
        <select name="rol" required>
            <option value="comun">Usuario común</option>
            <option value="admin">Administrador</option>
        </select>

        <button type="submit" class="btn">Registrar</button>
    </form>

    <p><a href="index.php?accion=bebidas" class="btn-volver">Volver al listado</a></p>
</div>
</body>
</html>
