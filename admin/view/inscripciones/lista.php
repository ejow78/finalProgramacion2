<?php $rol = $_SESSION['rol'] ?? 'comun'; ?>
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
</style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Listado de Preinscripciones</h2>
        <div class="nav-links">
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
            <th>Carrera</th>
            <th>Email</th>
            <th>Teléfono</th>
            <?php if ($rol === 'admin'): ?>
            <th>Acciones</th>
            <?php endif; ?>
        </tr>
        <?php foreach ($inscripciones as $i): ?>
        <tr>
            <td><?= htmlspecialchars(date("d/m/Y H:i", strtotime($i['creadoa']))) ?></td>
            <td><?= htmlspecialchars($i['nombre'] . ' ' . $i['apellido']) ?></td>
            <td><?= htmlspecialchars($i['dni']) ?></td>
            <td><?= htmlspecialchars($i['carrera']) ?></td>
            <td><?= htmlspecialchars($i['email']) ?></td>
            <td><?= htmlspecialchars($i['telefono']) ?></td>
            <?php if ($rol === 'admin'): ?>
                <td>
                    <a href="index.php?accion=eliminar_inscripcion&id=<?= $i['id'] ?>" onclick="return confirm('¿Eliminar esta inscripción?')">Eliminar</a>
                </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>