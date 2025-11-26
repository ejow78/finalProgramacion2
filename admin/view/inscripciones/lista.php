<?php 
if (session_status() === PHP_SESSION_NONE) session_start();
$rol = $_SESSION['rol'] ?? 'comun'; 
$usuario_actual = $_SESSION['usuario'] ?? 'Usuario';

function traducirCarrera($valor) {
    switch ($valor) {
        case 'alimentos': return 'Téc. Sup. en Alimentos';
        case 'historia': return 'Prof. Historia';
        case 'matematicas': return 'Prof. Matemáticas';
        case 'agropecuaria': return 'Téc. Sup. Agropecuaria';
        case 'software': return 'Téc. Sup. Software';
        default: return ucfirst($valor);
    }
}
function traducirLocalidad($valor) {
    // (Mismo código de traducción que tenías, abreviado para el ejemplo)
    $map = [
        'alberdi' => 'Juan Bautista Alberdi', 'aguilares' => 'Aguilares', 'concepcion' => 'Concepción',
        'lacocha' => 'La Cocha', 'lamadrid' => 'La Madrid', 'santana' => 'Santa Ana'
    ];
    return $map[$valor] ?? ucfirst($valor);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel - Inscripciones</title>
<link rel="stylesheet" href="<?php echo ADMIN_URL; ?>estilos.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="header">
    <div class="header-top">
        <h2>Inscripciones</h2>
        <div class="header-actions">
            <span class="user-badge">
                <i class="fas fa-user-circle"></i> <?= htmlspecialchars($usuario_actual) ?>
            </span>
            <a href="<?php echo BASE_URL; ?>index.php" class="btn-dark" target="_blank">Volver al Sitio</a>
            <a href="<?php echo ADMIN_URL; ?>index.php?accion=logout" class="btn-danger">Salir</a>
        </div>
    </div>

    <div class="header-tabs">
        <a href="index.php?accion=inscripciones" class="tab-link active">Inscripciones</a>
        <a href="index.php?accion=mensajes" class="tab-link">Mensajes</a>
        <?php if ($rol === 'admin'): ?>
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
                <th>Datos Personales</th>
                <th>Domicilio</th>
                <th>Carrera</th>
                <th>Contacto</th>
                <?php if ($rol === 'admin'): ?>
                <th>Acciones</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($inscripciones as $i): ?>
        <tr>
            <td><?= htmlspecialchars(date("d/m/y H:i", strtotime($i['creadoa']))) ?></td>
            <td>
                <strong><?= htmlspecialchars($i['nombre'] . ' ' . $i['apellido']) ?></strong><br>
                <small>DNI: <?= htmlspecialchars($i['dni']) ?></small>
            </td>
            <td><?= htmlspecialchars(traducirLocalidad($i['localidad'])) ?><br><small><?= htmlspecialchars($i['direccion']) ?></small></td>
            <td><span style="background:#e0f2fe; color:#0369a1; padding:4px 8px; border-radius:4px; font-size:12px;"><?= htmlspecialchars(traducirCarrera($i['carrera'])) ?></span></td>
            <td><?= htmlspecialchars($i['email']) ?><br><small><?= htmlspecialchars($i['telefono']) ?></small></td>
            <?php if ($rol === 'admin'): ?>
                <td class="actions-cell">
                    <a href="index.php?accion=formulario_inscripcion&id=<?= $i['id'] ?>" class="edit"><i class="fas fa-edit"></i></a>
                    <a href="index.php?accion=eliminar_inscripcion&id=<?= $i['id'] ?>" class="delete" onclick="return confirm('¿Eliminar esta inscripción?')"><i class="fas fa-trash"></i></a>
                </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>