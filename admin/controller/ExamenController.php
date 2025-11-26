<?php
require_once __DIR__ . '/../model/ExamenModel.php';

class ExamenController {
    private $examenModel;

    public function __construct() {
        $this->examenModel = new ExamenModel();
    }

    public function formulario() {
        // Carga todos los turnos existentes
        $data = $this->examenModel->obtenerTurnos();
        // $turnos ahora es un array
        $turnos = $data['turnos']; 
        include __DIR__ . '/../view/examenes/form.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recibe los datos como arrays de turnos
            $titulos = $_POST['titulo'] ?? [];
            $contenidos = $_POST['contenido'] ?? [];
            $turnos_a_guardar = [];

            // Reconstruye el array de turnos
            foreach ($titulos as $index => $titulo) {
                $turnos_a_guardar[] = [
                    'id' => $index + 1, // Usar index + 1 como ID simple
                    'titulo' => $titulo,
                    'contenido' => $contenidos[$index] ?? ''
                ];
            }
            
            // Verifica si al menos un turno tiene datos
            $has_content = array_filter($turnos_a_guardar, function($t) {
                return !empty($t['titulo']) || !empty($t['contenido']);
            });

            if (empty($has_content)) {
                $_SESSION['error'] = "Debe completar al menos un Título y su Contenido.";
            } else {
                $resultado = $this->examenModel->guardarTurnos($turnos_a_guardar);
                if ($resultado !== false) {
                    $_SESSION['success'] = "Fechas de exámenes actualizadas correctamente.";
                } else {
                    $_SESSION['error'] = "Error al guardar las fechas.";
                }
            }
        }
        header("Location: index.php?accion=formulario_examenes");
        exit;
    }
}
?>