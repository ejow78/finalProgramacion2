<?php
require_once __DIR__ . '/../model/UsuarioModel.php';

class UsuarioController {

    private $usuarioModel;

    public function __construct($db_connection) {
        $this->usuarioModel = new UsuarioModel();
    }

    // Mostrar formulario de registro de usuario (admin)
    public function formulario() {
        // Solo admin puede ver
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
            $_SESSION['error'] = "No tenés permisos para esta acción.";
            header("Location: index.php?accion=bebidas");
            exit;
        }

        $usuarios = $this->usuarioModel->listarUsuarios();
        include __DIR__ . '/../view/usuarios/form.php';
    }

    // Guardar usuario (admin o comun)
   public function guardar_usuario() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['usuario'] ?? '';
        $password = $_POST['password'] ?? '';
        $rol = $_POST['rol'] ?? 'comun';

        if ($usuario && $password) {
            $usuarioModel = new UsuarioModel();
            $resultado = $usuarioModel->registrarUsuario($usuario, $password, $rol);

            if ($resultado) {
                $_SESSION['success'] = "Usuario registrado correctamente. Inicie sesión.";
            } else {
                $_SESSION['error'] = "Error al registrar usuario. Puede que el usuario ya exista.";
            }
        } else {
            $_SESSION['error'] = "Debe completar todos los campos.";
        }

        // Redirigir al inicio (login por defecto)
        header("Location: view/registro.php");
        exit;
    }
}

    
}
?>
