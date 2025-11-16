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
            return ucfirst($valor); 
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel - Mensajes</title>
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
    td.mensaje { max-width: 400px; white-space: pre-wrap; word-break: break-word; }
    .nav-links a.home { background: #030303ff; }
    .nav-links a.home:hover { background: #000000ff; }
</style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Listado de Mensajes de Contacto</h2>
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
            <th>Email/Teléfono</th>
            <th>Área de Interés</th>
            <th>Mensaje</th>
            <?php if ($rol === 'admin'): ?>
            <th>Acciones</th>
            <?php endif; ?>
        </tr>
        <?php foreach ($mensajes as $m): ?>
        <tr>
            <td><?= htmlspecialchars(date("d/m/Y H:i", strtotime($m['creadoa']))) ?></td>
            <td><?= htmlspecialchars($m['nombre'] . ' ' . $m['apellido']) ?></td>
            <td><?= htmlspecialchars($m['email']) ?><br><?= htmlspecialchars($m['telefono']) ?></td>
            <td><?= htmlspecialchars(traducirCarrera($m['interes'])) ?></td>
            <td class="mensaje"><?= htmlspecialchars($m['mensaje']) ?></td>
            <?php if ($rol === 'admin'): ?>
                <td>
                    <a href="index.php?accion=eliminar_mensaje&id=<?= $m['id'] ?>" onclick="return confirm('¿Eliminar este mensaje?')">Eliminar</a>
                </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>