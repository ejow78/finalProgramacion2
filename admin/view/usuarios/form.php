<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$rol_sesion = $_SESSION['rol'] ?? 'comun';
$success = $_SESSION['success'] ?? '';
$error = $_SESSION['error'] ?? '';
unset($_SESSION['success'], $_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Usuario</title>
    <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>estilos.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="header">
        <div class="header-top">
            <h2>Registrar Usuario</h2>
            <div class="header-actions">
                <span class="user-badge"><i class="fas fa-user-circle"></i> <?= htmlspecialchars($_SESSION['usuario'] ?? 'Admin') ?></span>
                <a href="<?php echo BASE_URL; ?>index.php" class="btn-dark" target="_blank">Ver Sitio</a>
                <a href="<?php echo ADMIN_URL; ?>index.php?accion=logout" class="btn-danger">Salir</a>
            </div>
        </div>
        <div class="header-tabs">
            <a href="index.php?accion=inscripciones" class="tab-link">Inscripciones</a>
            <a href="index.php?accion=mensajes" class="tab-link">Mensajes</a>
            <a href="index.php?accion=usuarios" class="tab-link active">Usuarios</a>
            <a href="index.php?accion=formulario_examenes" class="tab-link">Exámenes</a>
        </div>
    </div>

    <?php if ($success): ?>
        <div class="alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="index.php?accion=guardar_usuario" method="POST" class="form-narrow">
        
        <h3 class="form-section-title">Credenciales de Acceso</h3>
        
        <div>
            <label>Nombre de Usuario:</label>
            <input type="text" name="usuario" required placeholder="Ej: jperez" autocomplete="off">
        </div>
        
        <div>
            <label>Contraseña:</label>
            <input type="password" name="password" required placeholder="Mínimo 4 caracteres">
        </div>
        
        <div>
            <label>Rol de Acceso:</label>
            <select name="rol" required>
                <option value="comun">Usuario Común</option>
                <option value="admin">Administrador</option>
            </select>
        </div>
        
        <div class="form-actions">
            <a href="index.php?accion=usuarios" class="btn-secondary">
                <i class="fas fa-arrow-left" style="margin-right: 8px;"></i> Volver
            </a>
            <button type="submit" class="btn-save">Crear Usuario</button>
        </div>
    </form>
</div>
</body>
</html>