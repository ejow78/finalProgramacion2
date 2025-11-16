<?php
require_once __DIR__ . '/../model/MensajeModel.php';

class MensajeController {
    private $mensajeModel;

    public function __construct($conn) {
        $this->mensajeModel = new MensajeModel($conn);
    }

    public function listar() {
        $mensajes = $this->mensajeModel->listar();
        include __DIR__ . '/../view/mensajes/lista.php';
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $this->mensajeModel->eliminar($_GET['id']);
            $_SESSION['success'] = "Mensaje eliminado correctamente.";
        }
        header("Location: index.php?accion=mensajes");
        exit;
    }
}
?>