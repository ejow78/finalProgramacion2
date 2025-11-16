<?php $rol = $_SESSION['rol'] ?? 'comun'; 
function traducirCarrera($valor) {
    switch ($valor) {
        case 'alimentos':
            return 'Técnico Superior en Agroindustria de los Alimentos';
        case 'historia':
            return 'Profesorado de Educación Secundaria en Historia';
        case 'matematicas':
            return 'Profesorado de Educación Secundaria en Matemáticas';
        case 'agropecuaria':
            return 'Técnico Superior en Gestión de Producción Agropecuaria';
        case 'software':
            return 'Técnico Superior en Desarrollo de Software';
        case 'otro':
            return 'Otro';
        default:
            return ucfirst($valor); // Devuelve el valor original si no hay traducción
    }
}
function traducirLocalidad($valor) {
    switch ($valor) {
        case 'alberdi':
            return 'Juan Bautista Alberdi';
        case 'aguilares':
            return 'Aguilares';
        case 'concepcion':
            return 'Concepción';
        case 'graneros':
            return 'Graneros';
        case 'lacocha':
            return 'La Cocha';
        case 'lamadrid':
            return 'La Madrid';
        case 'santana':
            return 'Santa Ana';
        case 'villabel':
            return 'Villa Belgrano';
        case 'otraloc':
            return 'Otro/a';
        default:
            return ucfirst($valor); // Devuelve el valor original si no hay traducción
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel - Inscripciones</title>
<link rel="stylesheet" href="<?php echo ADMIN_URL; ?>estilos.css">
<style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    .container { width: 95%; margin: auto; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; font-size: 14px; }
    th { background-color: #f2f2f2; }
    .header { display: flex; justify-content: space-between; align-items: center; }
    .nav-links a { text-decoration: none; padding: 8px 12px; background: #007bff; color: white; border-radius: 4px; margin-left: 10px; }
    .nav-links a.active { background: #0056b3; }
    .logout-btn { background-color: #f44336; color: white; padding: 10px 15px; border: none; cursor: pointer; text-decoration: none; border-radius: 4px; }
    .nav-links a.home { background: #030303ff; }
    .nav-links a.home:hover { background: #000000ff; }
</style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Preinscripciones</h2>
        <div class="nav-links">
            <a href="<?php echo BASE_URL; ?>index.php" class="home">Volver al Sitio</a> 
            <a href="index.php?accion=inscripciones" class="active">Inscripciones</a>
            <a href="index.php?accion=mensajes">Mensajes</a>
            <a href="<?php echo ADMIN_URL; ?>index.php?accion=logout" class="logout-btn">Cerrar sesión</a>
        </div>
    </div>

    <?php if (isset($_SESSION['success'])): ?>
        <div style="color: green; border: 1px solid green; padding: 10px; margin-top: 10px;"><?= htmlspecialchars($_SESSION['success']) ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <table>
        <tr>
            <th>Fecha</th>
            <th>Nombre y Apellido</th>
            <th>DNI</th>
            <th>Localidad / Dirección</th>
            <th>Carrera</th>
            <th>Email / Teléfono</th>
            <?php if ($rol === 'admin'): ?>
            <th>Acciones</th>
            <?php endif; ?>
        </tr>
        <?php foreach ($inscripciones as $i): ?>
        <tr>
            <td><?= htmlspecialchars(date("d/m/Y H:i", strtotime($i['creadoa']))) ?></td>
            <td><?= htmlspecialchars($i['nombre'] . ' ' . $i['apellido']) ?></td>
            <td><?= htmlspecialchars($i['dni']) ?></td>
            <td><?= htmlspecialchars(traducirLocalidad($i['localidad'])) ?><br><?= htmlspecialchars($i['direccion']) ?></td>
            <td><?= htmlspecialchars(traducirCarrera($i['carrera'])) ?></td>
            <td><?= htmlspecialchars($i['email']) ?><br><?= htmlspecialchars($i['telefono']) ?></td>
            <?php if ($rol === 'admin'): ?>
                <td>
                    <a href="index.php?accion=formulario_inscripcion&id=<?= $i['id'] ?>">Editar</a> | 
                    
                    <a href="index.php?accion=eliminar_inscripcion&id=<?= $i['id'] ?>" onclick="return confirm('¿Eliminar esta inscripción?')">Eliminar</a>
                </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>