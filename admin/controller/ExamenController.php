<?php
require_once __DIR__ . '/../model/ExamenModel.php';

class ExamenController {
    private $examenModel;

    public function __construct() {
        $this->examenModel = new ExamenModel();
    }

    public function formulario() {
        $data = $this->examenModel->obtenerLlamados(); // Cambiado a obtenerLlamados()
        // Pasamos toda la data de llamados a la vista
        $llamados = $data['llamados'] ?? [];
        include __DIR__ . '/../view/examenes/form.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recibimos el array crudo de llamados desde el formulario dinámico
            $llamados_input = $_POST['llamados'] ?? []; // Cambiado a $_POST['llamados']

            $llamados_a_guardar = []; // Cambiado a $llamados_a_guardar
            
            // Procesamos y limpiamos los datos
            foreach ($llamados_input as $index => $l) { // Cambiado a $llamados_input y $l
                // Solo guardamos si tiene título
                if (empty($l['titulo'])) continue;

                $examenes_limpios = [];
                if (isset($l['examenes']) && is_array($l['examenes'])) {
                    foreach ($l['examenes'] as $ex) {
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

                $llamados_a_guardar[] = [ // Cambiado a $llamados_a_guardar
                    'id' => $index + 1,
                    'titulo' => $l['titulo'],
                    'anio' => $l['anio'] ?? date('Y'), // Guardamos el año
                    'examenes' => $examenes_limpios // Guardamos la lista de exámenes, no HTML
                ];
            }

            if (empty($llamados_a_guardar)) {
                // Si borró todo, guardamos vacío pero sin error
                $this->examenModel->guardarLlamados([]); // Cambiado a guardarLlamados
                $_SESSION['success'] = "Se han eliminado todos los llamados."; // Mensaje actualizado
            } else {
                $resultado = $this->examenModel->guardarLlamados($llamados_a_guardar); // Cambiado a guardarLlamados
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