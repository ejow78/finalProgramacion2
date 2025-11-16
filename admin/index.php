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



$accion = $_GET['accion'] ?? 'login';


switch ($accion) {
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


    case 'formulario_usuario':
        $controller = new UsuarioController($conn);
        $controller->formulario();
        break;
    case 'guardar_usuario':
        $controller = new UsuarioController($conn);
        $controller->guardar_usuario();
        break;


    case 'inscripciones': 
        $controller = new InscripcionController($conn);
        $controller->listar();
        break;
    case 'eliminar_inscripcion':
        $controller = new InscripcionController($conn);
        $controller->eliminar();
        break;


    case 'mensajes':
        $controller = new MensajeController($conn);
        $controller->listar();
        break;
    case 'eliminar_mensaje':
        $controller = new MensajeController($conn);
        $controller->eliminar();
        break;

    default:
        // Si no se reconoce la acción, decidimos a dónde ir.
        if (!empty($_SESSION['usuario'])) {
             // Si el usuario está logueado, lo mandamos a inscripciones
             header("Location: index.php?accion=inscripciones");
             exit;
        }
        // Si no está logueado, a la fuerza al login.
        $controller = new LoginController($conn);
        $controller->login();
        break;
}
?>