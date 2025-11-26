<?php
require_once __DIR__ . '/../includes/config.php';

define('CONTROLLER_PATH', __DIR__ . '/controller');
define('MODEL_PATH', __DIR__ . '/model');
define('VIEW_PATH', __DIR__ . '/view');
define('HELPER_PATH', __DIR__ . '/helpers');

require_once CONTROLLER_PATH . '/LoginController.php';
require_once CONTROLLER_PATH . '/UsuarioController.php';
require_once CONTROLLER_PATH . '/InscripcionController.php'; 
require_once CONTROLLER_PATH . '/MensajeController.php';     
require_once CONTROLLER_PATH . '/ExamenController.php'; // Aseguramos incluir esto

$accion = $_GET['accion'] ?? 'login';

switch ($accion) {
    // --- LOGIN & AUTH ---
    case 'login':
        $controller = new LoginController($conn);
        $controller->login();
        break;
    case 'registrar':
        $controller = new LoginController($conn);
        $controller->registrar();
        break;
    case 'logout':
        $controller = new LoginController($conn);
        $controller->logout();
        break;

    // --- USUARIOS (Solo Admin) ---
    case 'usuarios': 
        $controller = new UsuarioController($conn);
        $controller->listar();
        break;
    case 'formulario_usuario':
        $controller = new UsuarioController($conn);
        $controller->formulario();
        break;
    case 'guardar_usuario':
        $controller = new UsuarioController($conn);
        $controller->guardar_usuario();
        break;

    // --- INSCRIPCIONES ---
    case 'inscripciones': 
        $controller = new InscripcionController($conn);
        $controller->listar();
        break;
    case 'eliminar_inscripcion':
        $controller = new InscripcionController($conn);
        $controller->eliminar();
        break;
    case 'formulario_inscripcion': 
        $controller = new InscripcionController($conn);
        $controller->formulario();
        break;
    case 'guardar_inscripcion': 
        $controller = new InscripcionController($conn);
        $controller->guardar();
        break;

    // --- MENSAJES ---
    case 'mensajes':
        $controller = new MensajeController($conn);
        $controller->listar();
        break;
    case 'eliminar_mensaje':
        $controller = new MensajeController($conn);
        $controller->eliminar();
        break;

    // --- EXAMENES ---
    case 'formulario_examenes':
        $controller = new ExamenController();
        $controller->formulario();
        break;
    case 'guardar_examenes':
        $controller = new ExamenController();
        $controller->guardar();
        break;

    default:
        if (!empty($_SESSION['usuario'])) {
             header("Location: index.php?accion=inscripciones");
             exit;
        }
        $controller = new LoginController($conn);
        $controller->login();
        break;
}
?>