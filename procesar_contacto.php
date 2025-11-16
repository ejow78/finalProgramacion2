<?php
// 1. Cargar la configuración y la conexión
require __DIR__ . '/includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acceso no permitido");
}

try {
    // 2. Obtener los datos (mapeamos 'interest' a 'interes')
    $nombre = $_POST['firstName'] ?? '';
    $apellido = $_POST['lastName'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefono = $_POST['phone'] ?? '';
    $interes = $_POST['interest'] ?? ''; // El form usa 'interest', la DB usa 'interes'
    $mensaje = $_POST['message'] ?? '';

    // 3. Preparar la consulta para 'mensajes_contacto'
    $sql = "INSERT INTO mensajes_contacto (nombre, apellido, email, telefono, interes, mensaje) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    // 4. Vincular los parámetros
    $stmt->bind_param("ssssss", 
        $nombre, $apellido, $email, $telefono, $interes, $mensaje
    );

    // 5. Ejecutar y redirigir
    if ($stmt->execute()) {
        $_SESSION['flash_ok'] = "¡Mensaje enviado con éxito!";
    } else {
        $_SESSION['flash_error'] = "Error al enviar el mensaje: " . $stmt->error;
    }

} catch (Exception $e) {
    $_SESSION['flash_error'] = "Error: " . $e->getMessage();
}

// 6. Redirigir de vuelta
header("Location: contacto.php");
exit;
?>