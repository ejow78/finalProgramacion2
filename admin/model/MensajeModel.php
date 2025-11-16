<?php
class MensajeModel {
    private $conn;

    public function __construct($db_connection) {
        $this->conn = $db_connection;
    }

    public function listar() {
        // Usa la tabla 'mensajes_contacto' y ordena por 'creadoa'
        $sql = "SELECT * FROM mensajes_contacto ORDER BY creadoa DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function eliminar($id) {
        $stmt = $this->conn->prepare("DELETE FROM mensajes_contacto WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>