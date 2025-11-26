<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$rol = $_SESSION['rol'] ?? 'comun';
$titulo = $inscripcion ? 'Editar Inscripción' : 'Nueva Inscripción';

$opciones_genero = ['masculino' => 'Masculino', 'femenino' => 'Femenino', 'otrog' => 'Otro/a'];
$opciones_localidad = [
    'alberdi' => 'Juan Bautista Alberdi', 'aguilares' => 'Aguilares', 'concepcion' => 'Concepción',
    'graneros' => 'Graneros', 'lacocha' => 'La Cocha', 'lamadrid' => 'La Madrid',
    'santana' => 'Santa Ana', 'villabel' => 'Villa Belgrano', 'otraloc' => 'Otro/a'
];
$opciones_carrera = [
    'alimentos' => 'Técnico Superior en Agroindustria de los Alimentos',
    'historia' => 'Profesorado de Educación Secundaria en Historia',
    'matematicas' => 'Profesorado de Educación Secundaria en Matemáticas',
    'agropecuaria' => 'Técnico Superior en Gestión de Producción Agropecuaria',
    'software' => 'Técnico Superior en Desarrollo de Software',
    'otro' => 'Otro'
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($titulo) ?></title>
    <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>estilos.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="header">
        <div class="header-top">
            <h2><?= htmlspecialchars($titulo) ?></h2>
            <div class="header-actions">
                <span class="user-badge"><i class="fas fa-user-circle"></i> <?= htmlspecialchars($_SESSION['usuario'] ?? 'Admin') ?></span>
                <a href="<?php echo BASE_URL; ?>index.php" class="btn-dark" target="_blank">Ver Sitio</a>
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

    <form action="index.php?accion=guardar_inscripcion" method="POST">
        <input type="hidden" name="id" value="<?= $inscripcion['id'] ?? '' ?>">

        <h3 class="form-section-title">Datos Personales</h3>
        <div class="form-row">
            <div>
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?= htmlspecialchars($inscripcion['nombre'] ?? '') ?>" required>
            </div>
            <div>
                <label>Apellido:</label>
                <input type="text" name="apellido" value="<?= htmlspecialchars($inscripcion['apellido'] ?? '') ?>" required>
            </div>
        </div>

        <div class="form-row">
            <div>
                <label>DNI:</label>
                <input type="text" name="dni" value="<?= htmlspecialchars($inscripcion['dni'] ?? '') ?>" required>
            </div>
            <div>
                <label>Género:</label>
                <select name="genero">
                    <option value="">Seleccionar...</option>
                    <?php foreach($opciones_genero as $val => $label): ?>
                        <option value="<?= $val ?>" <?= ($inscripcion['genero']??'') == $val ? 'selected' : '' ?>><?= $label ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <h3 class="form-section-title">Ubicación y Contacto</h3>
        <div class="form-row">
            <div>
                <label>Localidad:</label>
                <select name="localidad">
                    <option value="">Seleccionar...</option>
                    <?php foreach($opciones_localidad as $val => $label): ?>
                        <option value="<?= $val ?>" <?= ($inscripcion['localidad']??'') == $val ? 'selected' : '' ?>><?= $label ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label>Dirección:</label>
                <input type="text" name="direccion" value="<?= htmlspecialchars($inscripcion['direccion'] ?? '') ?>">
            </div>
        </div>

        <div class="form-row">
            <div>
                <label>Email:</label>
                <input type="email" name="email" value="<?= htmlspecialchars($inscripcion['email'] ?? '') ?>" required>
            </div>
            <div>
                <label>Teléfono:</label>
                <input type="text" name="telefono" value="<?= htmlspecialchars($inscripcion['telefono'] ?? '') ?>">
            </div>
        </div>

        <div style="margin-top: 10px;">
            <label>Carrera Seleccionada:</label>
            <select name="carrera" required class="select-highlight">
                <option value="">Seleccionar carrera...</option>
                <?php foreach($opciones_carrera as $val => $label): ?>
                    <option value="<?= $val ?>" <?= ($inscripcion['carrera']??'') == $val ? 'selected' : '' ?>><?= $label ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-actions">
            <a href="index.php?accion=inscripciones" class="btn-secondary">
                <i class="fas fa-arrow-left" style="margin-right: 8px;"></i> Volver
            </a>
            <button type="submit" class="btn-save">Guardar Cambios</button>
        </div>
    </form>
</div>
</body>
</html>