<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Mensajes de sesión
$success = $_SESSION['success'] ?? '';
unset($_SESSION['success']);

$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title><?= $bebida ? 'Editar Bebida' : 'Nueva Bebida' ?></title>
<link rel="stylesheet" href="/programacion2025/CRUD-MVC/estilos.css">
</head>
<body>
<div class="container">
<h2><?= $bebida ? 'Editar Bebida' : 'Agregar Nueva Bebida' ?></h2>

<?php if (!empty($error)): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div class="success"><?= htmlspecialchars($success) ?></div>
    <script>
        alert("<?= htmlspecialchars($success) ?>");
        setTimeout(() => { window.location.href = 'index.php?accion=bebidas'; }, 1500);
    </script>
<?php endif; ?>

<form action="index.php?accion=guardar_bebida" method="POST">
    <input type="hidden" name="id" value="<?= $bebida['id'] ?? '' ?>">

    <label>Descripción:</label>
    <input type="text" name="descripcion" value="<?= $bebida['descripcion'] ?? '' ?>" required>

    <label>Precio:</label>
    <input type="number" step="0.01" name="precio" value="<?= $bebida['precio'] ?? '' ?>" required>

    <label>Stock:</label>
    <input type="number" name="stock" value="<?= $bebida['stock'] ?? '' ?>" required>

    <label>Oferta:</label>
    <input type="text" name="oferta" value="<?= $bebida['oferta'] ?? '' ?>">

    <label>Stock mínimo:</label>
    <input type="number" name="stockminimo" value="<?= $bebida['stockminimo'] ?? '' ?>">

    <label>Factura:</label>
    <input type="text" name="factura" value="<?= $bebida['factura'] ?? '' ?>">

    <button type="submit">Guardar</button>
</form>

<p><a href="index.php?accion=bebidas">Volver al listado</a></p>
</div>
</body>
</html>
