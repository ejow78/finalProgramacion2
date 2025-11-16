<?php

class UsuariosModel {
    private $conn;

    public function __construct($db_connection) {
        $this->conn = $db_connection;
    }

    public function listarUsuarios() {
        $sql = "SELECT id, usuario, rol FROM usuario";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function registrarUsuario($usuario, $password, $rol = 'comun') {
        // Hash de la contraseña
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    
        $stmt = $this->conn->prepare("INSERT INTO usuarios (usuario, password, rol) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $usuario, $password_hashed, $rol);
    
        return $stmt->execute();
    }
    

    public function obtenerUsuario($usuario) {
        $stmt = $this->conn->prepare("SELECT id, usuario, password, rol FROM usuario WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
