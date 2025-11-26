<?php
class ExamenModel {
    private $filepath;

    public function __construct() {
        $this->filepath = __DIR__ . '/../data/examenes.json'; 
        // Asegurar que el directorio de data existe
        if (!is_dir(__DIR__ . '/../data')) {
            mkdir(__DIR__ . '/../data');
        }
    }

    // Obtener todos los turnos
    public function obtenerTurnos() {
        if (!file_exists($this->filepath) || filesize($this->filepath) === 0) {
            // Estructura inicial con un turno predeterminado
            return [
                'ultima_modificacion' => date('Y-m-d H:i:s'),
                'turnos' => [
                    [
                        'id' => 1,
                        'titulo' => 'Turno Noviembre/Diciembre',
                        'contenido' => 'Fechas disponibles pronto.'
                    ]
                ]
            ];
        }
        $data = file_get_contents($this->filepath);
        return json_decode($data, true);
    }

    // Guardar todos los turnos
    public function guardarTurnos(array $turnos) {
        // Limpiar turnos vacíos (si el título y contenido están vacíos)
        $turnos_limpios = array_filter($turnos, function($turno) {
            return !empty($turno['titulo']) || !empty($turno['contenido']);
        });

        $data = [
            'ultima_modificacion' => date('Y-m-d H:i:s'),
            'turnos' => array_values($turnos_limpios) // Reindexar el array
        ];
        return file_put_contents($this->filepath, json_encode($data, JSON_PRETTY_PRINT));
    }
}
?>