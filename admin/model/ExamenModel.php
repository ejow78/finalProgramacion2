<?php
class ExamenModel {
    private $filepath;

    public function __construct() {
        $this->filepath = __DIR__ . '/../data/examenes.json'; 
        if (!is_dir(__DIR__ . '/../data')) {
            mkdir(__DIR__ . '/../data');
        }
    }


    public function obtenerLlamados() {
        if (!file_exists($this->filepath) || filesize($this->filepath) === 0) {
            return [
                'ultima_modificacion' => date('Y-m-d H:i:s'),
                'llamados' => [
                    [
                        'id' => 1,
                        'titulo' => 'Proximamente',
                        'contenido' => 'Fechas disponibles pronto.'
                    ]
                ]
            ];
        }
        $data = file_get_contents($this->filepath);
        $result = json_decode($data, true);
        
        if (isset($result['turnos'])) {
            $result['llamados'] = $result['turnos'];
            unset($result['turnos']);
        }
        
        return $result;
    }

    public function guardarLlamados(array $llamados) {
        $llamados_limpios = array_filter($llamados, function($llamado) {
            return !empty($llamado['titulo']) || (isset($llamado['examenes']) && !empty($llamado['examenes']));
        });

        $data = [
            'ultima_modificacion' => date('Y-m-d H:i:s'),
            'llamados' => array_values($llamados_limpios)
        ];
        return file_put_contents($this->filepath, json_encode($data, JSON_PRETTY_PRINT));
    }
}
?>