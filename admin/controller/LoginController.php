<?php
require_once __DIR__ . '/../model/UsuarioModel.php';

class LoginController {

    private $conn;

    public function __construct($db_connection) {
        $this->conn = $db_connection;
    }

    public function login() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario_login'] ?? '';
            $password = $_POST['password_login'] ?? '';
            
            // CAMBIO: Obtenemos el referrer desde el campo oculto del POST
            $referrer = $_POST['referrer'] ?? '';

            $usuarioModel = new UsuarioModel($this->conn);
            $user = $usuarioModel->obtenerUsuario($usuario);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['usuario'] = $user['usuario'];
                $_SESSION['rol'] = $user['rol'];

                // CAMBIO: Si el referrer no está vacío, volvemos a él.
                if (!empty($referrer)) {
                    header("Location: " . $referrer);
                } else {
                    // Si no, vamos al panel de inscripciones.
                    header("Location: index.php?accion=inscripciones");
                }
                exit;
                
            } else {
                $_SESSION['error'] = 'Usuario o contraseña incorrectos.';
                
                // CAMBIO: Redirigimos a la ACCIÓN 'login', no al ARCHIVO 'view/login.php'
                // Esto arregla la página en blanco.
                header("Location: index.php?accion=login"); 
                exit;
            }
        } else {
            // Si es GET, solo muestra la vista
            require_once __DIR__ . '/../view/login.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        
        // CAMBIO: Obtenemos el referrer desde la URL (GET)
        $referrer = $_GET['referrer'] ?? null;

        if (!empty($referrer)) {
            // Volvemos a la página donde estaba
            header("Location: " . $referrer); 
        } else {
            // Fallback: si no hay referrer, vamos a la home
            header("Location: " . BASE_URL); 
        }
        exit();
    }
    
    public function registrar() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario_registro'] ?? '';
            $password = $_POST['password_registro'] ?? '';

            if ($usuario && $password) {
                $usuarioModel = new UsuarioModel($this->conn);
                $resultado = $usuarioModel->registrarUsuario($usuario, $password);

                if ($resultado) {
                    $_SESSION['success'] = "Usuario registrado correctamente.";
                } else {
                    $_SESSION['error'] = "Error al registrar usuario. Puede que el usuario ya exista.";
                }
            } else {
                $_SESSION['error'] = "Debe completar todos los campos.";
            }

            // CAMBIO: Redirigimos a la ACCIÓN 'registrar', no al ARCHIVO 'view/registro.php'
            header("Location: index.php?accion=registrar");
            exit();
        }
        
        // Si es un GET, solo mostramos el formulario
        require_once __DIR__ . '/../view/registro.php';
    }
}
?>