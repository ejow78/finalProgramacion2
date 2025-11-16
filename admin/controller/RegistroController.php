<?php
require_once __DIR__ . '/../model/UsuarioModel.php';

class RegistroController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new UsuarioModel();
    }

    public function registrar() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $usuario = trim($_POST['usuario_registro'] ?? '');
            $password = trim($_POST['password_registro'] ?? '');
       
       //Para recordar:
       //trim: eliminar los espacio en blanco
       //!empty comprobar si una variable esta vacía
       // strlen: devuelve un número entero que representa la longitud de la cadena

            if (!empty($usuario) && strlen($password) >= 4) {
                if ($this->usuarioModel->registrarUsuario($usuario, $password)) {
                    header("Location: ../view/login.php");
                    exit();
                } else {
                    echo "Error al registrar usuario.";
                }
            } else {
                echo "Completa todos los campos (mínimo 4 caracteres).";
            }
        }
        include __DIR__ . '/../view/registro.php';
    }
}
?>
