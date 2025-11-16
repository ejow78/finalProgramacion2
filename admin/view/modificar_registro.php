<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') die("Solo admin.");

require_once "helpers/conexion.php";
$result = mysqli_query($conn,"SELECT * FROM bebidas ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Bebidas</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" type="image/jpeg" href="/programacion2025/CRUD-MVC/img/bebidas.jpg">
</head>
<body>
<div class="container">
    <h1>Modificar Bebidas</h1>
    <form method="post" action="actualizar_registro.php">
        <table border="1">
            <tr>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Oferta</th>
                <th>Stock mínimo</th>
                <th>Factura</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td>
                    <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
                    <input type="text" name="descripcion[]" value="<?= htmlspecialchars($row['descripcion']) ?>">
                </td>
                <td><input type="number" step="0.01" name="precio[]" value="<?= $row['precio'] ?>"></td>
                <td><input type="number" name="stock[]" value="<?= $row['stock'] ?>"></td>
                <td><input type="text" name="oferta[]" value="<?= htmlspecialchars($row['oferta']) ?>"></td>
                <td><input type="number" name="stockminimo[]" value="<?= $row['stockminimo'] ?>"></td>
                <td><input type="text" name="factura[]" value="<?= htmlspecialchars($row['factura']) ?>"></td>
            </tr>
            <?php } ?>
        </table>
        <button type="submit">Actualizar</button>
    </form>
    <p><a href="index.php">Volver al listado</a></p>
</div>
</body>
</html>
