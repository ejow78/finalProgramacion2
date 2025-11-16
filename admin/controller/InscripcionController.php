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

    // ... (después de la función listar())

    public function formulario() {
        $inscripcion = null;
        if (isset($_GET['id'])) {
            // Si hay ID, buscamos la inscripción para editar
            $inscripcion = $this->inscripcionModel->obtener($_GET['id']);
        }
        // Cargamos la vista del formulario (que vamos a crear en el Paso 3)
        include __DIR__ . '/../view/inscripciones/form.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recibimos todos los datos del formulario
            $id = $_POST['id']; // El ID viene en un campo oculto
            $nombre = $_POST['nombre'] ?? '';
            $apellido = $_POST['apellido'] ?? '';
            $dni = $_POST['dni'] ?? '';
            $genero = $_POST['genero'] ?? '';
            $localidad = $_POST['localidad'] ?? '';
            $direccion = $_POST['direccion'] ?? '';
            $email = $_POST['email'] ?? '';
            $telefono = $_POST['telefono'] ?? '';
            $carrera = $_POST['carrera'] ?? '';

            // Usamos el ID para saber si estamos actualizando o creando
            if (!empty($id)) {
                // Actualizar
                $this->inscripcionModel->actualizar($id, $nombre, $apellido, $dni, $genero, $localidad, $direccion, $email, $telefono, $carrera);
                $_SESSION['success'] = "Inscripción actualizada correctamente.";
            } 
            // Opcional: Si quisieras agregar un 'else' aquí, podrías CREAR inscripciones
            // desde el admin, pero por ahora solo editamos.
            
            header("Location: index.php?accion=inscripciones");
            exit;
        }
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