<?php 
require __DIR__ . '/includes/config.php'; 
// Incluimos el modelo para acceder a los datos guardados
require __DIR__ . '/admin/model/ExamenModel.php'; 

// Intentaremos crear el objeto si no existe (solucionando el error anterior)
if (!class_exists('ExamenModel')) {
    // Si el archivo falla, asumimos un fallo y definimos una estructura de datos segura
    $data = [
        'turnos' => [
            ['titulo' => 'Error al cargar fechas', 'contenido' => 'Por favor, comuníquese con la administración.']
        ]
    ];
} else {
    $examenModel = new ExamenModel();
    $data = $examenModel->obtenerTurnos();
}

$turnos_activos = array_filter($data['turnos'] ?? [], function($t) {
    return !empty($t['titulo']);
});

// Definición para el título principal
$titulo_principal = "Calendario de Mesas de Exámenes Finales";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo_principal) ?></title>
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Estilos para las tarjetas de turnos en el front-end */
        .turno-card {
            background: var(--bg-primary); 
            border: 1px solid var(--border);
            border-radius: var(--radius);
            margin-bottom: 32px;
            box-shadow: var(--shadow-md);
            overflow: hidden;
        }
        .turno-header {
            background: var(--bg-secondary);
            color: var(--text-primary);
            padding: 20px 30px;
            border-bottom: 2px solid var(--primary);
        }
        .turno-header h3 {
            font-size: 24px;
            font-weight: 600;
            color: var(--primary);
            margin: 0;
        }
        .turno-body {
            padding: 30px;
            white-space: pre-wrap; /* Mantiene los saltos de línea */
            font-family: 'Inter', sans-serif; /* Usamos la fuente principal, monospace se ve raro */
            font-size: 16px;
            color: var(--text-primary);
        }
        .text-muted {
            font-size: 14px;
        }
    </style>
</head>
<body>
   <?php include 'includes/header.php'; ?>   
    <main>
        <section class="section">
            <div class="container">
                <div class="section-header">
                    <h2><?= htmlspecialchars($titulo_principal) ?></h2>
                    <p>Consulta las fechas y horarios de las mesas de examen final para los próximos turnos.</p>
                </div>

                <?php if (!empty($turnos_activos)): ?>
                    <?php foreach ($turnos_activos as $turno): ?>
                        <div class="turno-card">
                            <div class="turno-header">
                                <h3><?= htmlspecialchars($turno['titulo']) ?></h3>
                            </div>
                            <div class="turno-body">
                                <?= htmlspecialchars($turno['contenido']) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="turno-card">
                        <div class="turno-header">
                            <h3>Sin Fechas Publicadas</h3>
                        </div>
                        <div class="turno-body">
                            Actualmente no hay turnos de exámenes publicados. Por favor, intente de nuevo más tarde o comuníquese con la administración.
                        </div>
                    </div>
                <?php endif; ?>
                
                <div style="margin-top: 40px;" class="text-center">
                    <a href="<?php echo BASE_URL; ?>contacto.php" class="btn-submit">Contactar por dudas</a>
                </div>
                
                <?php if (isset($data['ultima_modificacion'])): ?>
                    <p class="text-center text-muted" style="margin-top: 20px;">Última actualización: <?= date('d/m/Y H:i', strtotime($data['ultima_modificacion'])) ?></p>
                <?php endif; ?>
            </div>
        </section>
    </main>

   <?php include 'includes/footer.php'; ?>
    <script src="<?php echo JS_URL; ?>script.js"></script>
</body>
</html>