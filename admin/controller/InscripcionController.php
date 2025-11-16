<?php
require_once __DIR__ . '/../model/InscripcionModel.php';

class InscripcionController {
    private $inscripcionModel;

    public function __construct($conn) {
        $this->inscripcionModel = new InscripcionModel($conn);
    }

    // Mostrar listado
    public function listar() {
        $inscripciones = $this->inscripcionModel->listar();
        include __DIR__ . '/../view/inscripciones/lista.php';
    }

    // Eliminar inscripcion
    public function eliminar() {
        if (isset($_GET['id'])) {
            $this->inscripcionModel->eliminar($_GET['id']);
            $_SESSION['success'] = "Inscripción eliminada correctamente.";
        }
        header("Location: index.php?accion=inscripciones");
        exit;
    }
}
?>