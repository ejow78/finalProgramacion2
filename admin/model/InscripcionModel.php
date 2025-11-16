<?php
class InscripcionModel {
    private $conn;

    public function __construct($db_connection) {
        $this->conn = $db_connection;
    }

    public function listar() {
        // Usa la tabla 'preinscripciones' y ordena por 'creadoa'
        $sql = "SELECT * FROM preinscripciones ORDER BY creadoa DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function obtener($id) {
        $stmt = $this->conn->prepare("SELECT * FROM preinscripciones WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $nombre, $apellido, $dni, $genero, $localidad, $direccion, $email, $telefono, $carrera) {
        $sql = "UPDATE preinscripciones SET 
                    nombre=?, apellido=?, dni=?, genero=?, localidad=?, 
                    direccion=?, email=?, telefono=?, carrera=? 
                WHERE id=?";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssssssi", 
            $nombre, $apellido, $dni, $genero, $localidad, 
            $direccion, $email, $telefono, $carrera, $id
        );
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conn->prepare("DELETE FROM preinscripciones WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>