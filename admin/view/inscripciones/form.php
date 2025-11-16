<?php
$opciones_genero = [
    'masculino' => 'Masculino',
    'femenino' => 'Femenino',
    'otrog' => 'Otro/a'
];

$opciones_localidad = [
    'alberdi' => 'Juan Bautista Alberdi',
    'aguilares' => 'Aguilares',
    'concepcion' => 'Concepción',
    'graneros' => 'Graneros',
    'lacocha' => 'La Cocha',
    'lamadrid' => 'La Madrid',
    'santana' => 'Santa Ana',
    'villabel' => 'Villa Belgrano',
    'otraloc' => 'Otro/a'
];

$opciones_carrera = [
    'alimentos' => 'Técnico Superior en Agroindustria de los Alimentos',
    'historia' => 'Profesorado de Educación Secundaria en Historia',
    'matematicas' => 'Profesorado de Educación Secundaria en Matemáticas',
    'agropecuaria' => 'Técnico Superior en Gestión de Producción Agropecuaria',
    'software' => 'Técnico Superior en Desarrollo de Software',
    'otro' => 'Otro'
];

// Variable con el valor guardado (para legibilidad)
$genero_guardado = $inscripcion['genero'] ?? '';
$localidad_guardada = $inscripcion['localidad'] ?? '';
$carrera_guardada = $inscripcion['carrera'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Inscripción</title>
    <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>estilos.css">
    <style>
        .container { width: 600px; }
    </style>
</head>
<body>
<div class="container">
    <h2><?= $inscripcion ? 'Editar Inscripción' : 'Nueva Inscripción' ?></h2>

    <form action="index.php?accion=guardar_inscripcion" method="POST">
    
        <input type="hidden" name="id" value="<?= $inscripcion['id'] ?? '' ?>">

        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($inscripcion['nombre'] ?? '') ?>" required>

        <label>Apellido:</label>
        <input type="text" name="apellido" value="<?= htmlspecialchars($inscripcion['apellido'] ?? '') ?>" required>
        
        <label>DNI:</label>
        <input type="text" name="dni" value="<?= htmlspecialchars($inscripcion['dni'] ?? '') ?>" required>
        
        <label>Género:</label>
        <input type="text" name="genero" value="<?= htmlspecialchars($inscripcion['genero'] ?? '') ?>">
        
        <label>Localidad:</label>
        <input type="text" name="localidad" value="<?= htmlspecialchars($inscripcion['localidad'] ?? '') ?>">
        
        <label>Dirección:</label>
        <input type="text" name="direccion" value="<?= htmlspecialchars($inscripcion['direccion'] ?? '') ?>">
        
        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($inscripcion['email'] ?? '') ?>" required>
        
        <label>Teléfono:</label>
        <input type="text" name="telefono" value="<?= htmlspecialchars($inscripcion['telefono'] ?? '') ?>">
        
        <label>Carrera:</label>
        <input type="text" name="carrera" value="<?= htmlspecialchars($inscripcion['carrera'] ?? '') ?>" required>

        <button type="submit">Guardar Cambios</button>
    </form>

    <p><a href="index.php?accion=inscripciones">Volver al listado</a></p>
</div>
</body>
</html>