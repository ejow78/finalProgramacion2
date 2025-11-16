<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar bebida</title>
    <style>
        body {font-family: Arial; background:#f0f0f0; padding:40px;}
        .formulario {background:white; padding:20px; border-radius:8px; width:400px; margin:auto;}
        input, button {width:100%; padding:8px; margin-top:10px;}
        button {background:#007bff; color:white; border:none; cursor:pointer;}
        button:hover {background:#0056b3;}
        a {display:block; margin-top:15px; text-align:center;}
    </style>
</head>
<body>
<div class="formulario">
    <h2>Insertar bebida</h2>
    <form method="POST" action="index.php?controller=RegistroController&accion=insertar">
        <input type="text" name="descripcion" placeholder="Descripción" required>
        <input type="number" step="0.01" name="precio" placeholder="Precio" required>
        <input type="number" name="stock" placeholder="Stock" required>
        <input type="text" name="oferta" placeholder="Oferta">
        <input type="number" name="stockminimo" placeholder="Stock mínimo">
        <input type="text" name="factura" placeholder="Factura">
        <button type="submit">Guardar</button>
    </form>
    <a href="index.php?controller=RegistroController&accion=modificar">Volver</a>
</div>
</body>
</html>
