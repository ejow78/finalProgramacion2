<?php
// 1. Cargar la configuración y la conexión
require __DIR__ . '/includes/config.php';

// 2. Verificar que los datos vengan por POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acceso no permitido");
}

try {
    // 3. Obtener los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $dni = $_POST['dni'] ?? '';
    $genero = $_POST['genero'] ?? '';
    $localidad = $_POST['localidad'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $carrera = $_POST['carrera'] ?? '';

    // 4. Preparar la consulta SQL para la tabla 'preinscripciones'
    $sql = "INSERT INTO preinscripciones (nombre, apellido, dni, genero, localidad, direccion, email, telefono, carrera) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    // 5. Vincular los parámetros
    $stmt->bind_param("sssssssss", 
        $nombre, $apellido, $dni, $genero, $localidad, 
        $direccion, $email, $telefono, $carrera
    );

    // 6. Ejecutar y redirigir
    if ($stmt->execute()) {
        $_SESSION['flash_ok'] = "¡Preinscripción enviada con éxito!";
    } else {
        $_SESSION['flash_error'] = "Error al enviar la inscripción: " . $stmt->error;
    }

} catch (Exception $e) {
    $_SESSION['flash_error'] = "Error: " . $e->getMessage();
}

// 7. Redirigir de vuelta al formulario
header("Location: preinscripcion.php");
exit;
?>