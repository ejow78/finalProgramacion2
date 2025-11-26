<?php 
if (session_status() === PHP_SESSION_NONE) session_start();
$rol = $_SESSION['rol'] ?? 'comun'; 
$usuario_actual = $_SESSION['usuario'] ?? 'Usuario';

function traducirInteres($valor) {
    // Reutilizamos la lógica o mostramos directo
    return ucfirst($valor);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel - Mensajes</title>
<link rel="stylesheet" href="<?php echo ADMIN_URL; ?>estilos.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="header">
    <div class="header-top">
        <h2>Mensajes</h2>
        <div class="header-actions">
            <span class="user-badge"><i class="fas fa-user-circle"></i> <?= htmlspecialchars($usuario_actual) ?></span>
            <a href="<?php echo BASE_URL; ?>index.php" class="btn-dark" target="_blank">Volver al Sitio</a>
            <a href="<?php echo ADMIN_URL; ?>index.php?accion=logout" class="btn-danger">Salir</a>
        </div>
    </div>
    <div class="header-tabs">
        <a href="index.php?accion=inscripciones" class="tab-link">Inscripciones</a>
        <a href="index.php?accion=mensajes" class="tab-link active">Mensajes</a> <?php if ($rol === 'admin'): ?>
            <a href="index.php?accion=usuarios" class="tab-link">Usuarios</a>
            <a href="index.php?accion=formulario_examenes" class="tab-link">Exámenes</a>
        <?php endif; ?>
    </div>
</div>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert-success"><?= htmlspecialchars($_SESSION['success']) ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Remitente</th>
                <th>Contacto</th>
                <th>Interés</th>
                <th style="width:40%">Mensaje</th>
                <?php if ($rol === 'admin'): ?>
                <th>Acciones</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($mensajes as $m): ?>
        <tr>
            <td><?= htmlspecialchars(date("d/m/y H:i", strtotime($m['creadoa']))) ?></td>
            <td><strong><?= htmlspecialchars($m['nombre'] . ' ' . $m['apellido']) ?></strong></td>
            <td>
                <?= htmlspecialchars($m['email']) ?><br>
                <small><?= htmlspecialchars($m['telefono']) ?></small>
            </td>
            <td><?= htmlspecialchars(traducirInteres($m['interes'])) ?></td>
            <td style="white-space: pre-wrap; color: #555;"><?= htmlspecialchars($m['mensaje']) ?></td>
            <?php if ($rol === 'admin'): ?>
                <td class="actions-cell">
                    <a href="index.php?accion=eliminar_mensaje&id=<?= $m['id'] ?>" class="delete" onclick="return confirm('¿Eliminar este mensaje?')"><i class="fas fa-trash"></i> Eliminar</a>
                </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>