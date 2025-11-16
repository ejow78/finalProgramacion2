<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensaje</title>
    <link rel="icon" type="image/jpeg" href="/programacion2025/CRUD-MVC/img/bebidas.jpg">
    <style>
        body {font-family: Arial; background:#f9f9f9; text-align:center; padding:40px;}
        .msg {background:white; display:inline-block; padding:30px; border-radius:8px; box-shadow:0 0 10px #ccc;}
        a {display:block; margin-top:15px; text-decoration:none; color:#007bff;}
    </style>
</head>
<body>
    <div class="msg">
        <h2><?= htmlspecialchars($mensaje) ?></h2>
        <a href="index.php?controller=RegistroController&accion=modificar">Volver</a>
    </div>
</body>
</html>
