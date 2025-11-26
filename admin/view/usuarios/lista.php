<?php $rol_actual = $_SESSION['rol'] ?? 'comun'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel - Usuarios</title>
<link rel="stylesheet" href="<?php echo ADMIN_URL; ?>estilos.css">
</head>
<body>
<div class="container">
   <div class="header">
    <div class="header-top">
        <h2>Gestión de Usuarios</h2>
        <div class="header-actions">
            <span class="user-badge"><i class="fas fa-user-circle"></i> <?= htmlspecialchars($_SESSION['usuario'] ?? 'Admin') ?></span>
            <a href="<?php echo BASE_URL; ?>index.php" class="btn-dark" target="_blank">Ver Sitio</a>
            <a href="<?php echo ADMIN_URL; ?>index.php?accion=logout" class="btn-danger">Salir</a>
        </div>
    </div>
    <div class="header-tabs">
        <a href="index.php?accion=inscripciones" class="tab-link">Inscripciones</a>
        <a href="index.php?accion=mensajes" class="tab-link">Mensajes</a>
        <a href="index.php?accion=usuarios" class="tab-link active">Usuarios</a> <a href="index.php?accion=formulario_examenes" class="tab-link">Exámenes</a>
    </div>
</div>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert-success"><?= htmlspecialchars($_SESSION['success']) ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <div style="margin-bottom: 20px; text-align: right;">
        <a href="index.php?accion=formulario_usuario" class="button" style="background:#10b981; color:white; padding:10px 20px; text-decoration:none; border-radius:6px;">+ Nuevo Usuario</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u['id']) ?></td>
                <td><?= htmlspecialchars($u['usuario']) ?></td>
                <td>
                    <span style="padding: 4px 8px; border-radius: 4px; background: <?= $u['rol'] === 'admin' ? '#dbeafe' : '#f3f4f6' ?>; color: <?= $u['rol'] === 'admin' ? '#1e40af' : '#374151' ?>;">
                        <?= htmlspecialchars(ucfirst($u['rol'])) ?>
                    </span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>