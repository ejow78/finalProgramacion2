<?php
require_once __DIR__ . '/../model/ExamenModel.php';

class ExamenController {
    private $examenModel;

    public function __construct() {
        $this->examenModel = new ExamenModel();
    }

    public function formulario() {
        $data = $this->examenModel->obtenerTurnos();
        // Pasamos toda la data de turnos a la vista
        $turnos = $data['turnos'] ?? [];
        include __DIR__ . '/../view/examenes/form.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recibimos el array crudo de turnos desde el formulario dinámico
            $turnos_input = $_POST['turnos'] ?? [];

            $turnos_a_guardar = [];
            
            // Procesamos y limpiamos los datos
            foreach ($turnos_input as $index => $t) {
                // Solo guardamos si tiene título
                if (empty($t['titulo'])) continue;

                $examenes_limpios = [];
                if (isset($t['examenes']) && is_array($t['examenes'])) {
                    foreach ($t['examenes'] as $ex) {
                        // Guardamos el examen si tiene al menos materia o fecha
                        if (!empty($ex['materia']) || !empty($ex['fecha'])) {
                            $examenes_limpios[] = [
                                'fecha' => $ex['fecha'] ?? '',
                                'materia' => $ex['materia'] ?? '',
                                'tribunal' => $ex['tribunal'] ?? ''
                            ];
                        }
                    }
                    
                    // Ordenamos los exámenes por fecha para que salgan ordenados en la web
                    usort($examenes_limpios, function($a, $b) {
                        return strcmp($a['fecha'], $b['fecha']);
                    });
                }

                $turnos_a_guardar[] = [
                    'id' => $index + 1,
                    'titulo' => $t['titulo'],
                    'anio' => $t['anio'] ?? date('Y'), // Guardamos el año
                    'examenes' => $examenes_limpios // Guardamos la lista de exámenes, no HTML
                ];
            }

            if (empty($turnos_a_guardar)) {
                // Si borró todo, guardamos vacío pero sin error
                $this->examenModel->guardarTurnos([]);
                $_SESSION['success'] = "Se han eliminado todos los turnos.";
            } else {
                $resultado = $this->examenModel->guardarTurnos($turnos_a_guardar);
                if ($resultado !== false) {
                    $_SESSION['success'] = "Fechas guardadas y ordenadas correctamente.";
                } else {
                    $_SESSION['error'] = "Error al guardar el archivo JSON.";
                }
            }
        }
        header("Location: index.php?accion=formulario_examenes");
        exit;
    }
}
?>