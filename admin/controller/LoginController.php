<?php
require_once __DIR__ . '/../model/UsuarioModel.php';

class LoginController {

    private $conn;

    public function __construct($db_connection) {
        $this->conn = $db_connection;
    }

    // Una session guarda información de un usuario mientras navega entre distintas páginas
    public function login() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Si se envió el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario_login'] ?? '';
            $password = $_POST['password_login'] ?? '';

            $usuarioModel = new UsuarioModel($this->conn);
            $user = $usuarioModel->obtenerUsuario($usuario);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['usuario'] = $user['usuario'];
                $_SESSION['rol'] = $user['rol'];

                // Redirigir correctamente al CRUD
                header("Location: index.php?accion=inscripciones");
                exit;
            } else {
                $_SESSION['error'] = 'Usuario o contraseña incorrectos.';
                // Redirigir correctamente al login
                header("Location: view/login.php"); 
                exit;
            }
        } else {
            // Si no se envió el formulario, mostrar login
            require_once __DIR__ . '/../view/login.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: view/login.php");
        exit();
    }
    

    public function registrar() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

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

        // Redirigir correctamente al registro
        header("Location: view/registro.php");
        exit();
    }
}
?>
