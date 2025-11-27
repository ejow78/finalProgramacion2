<?php 
require __DIR__ . '/includes/config.php'; 
require __DIR__ . '/admin/model/ExamenModel.php'; 

if (!class_exists('ExamenModel')) {
    $data = ['llamados' => []]; 
} else {
    $examenModel = new ExamenModel();
    $data = $examenModel->obtenerLlamados();
}


$llamados_activos = $data['llamados'] ?? []; 
$titulo_principal = "Calendario de Mesas de Exámenes";

function formatearFecha($fecha) {
    if (empty($fecha)) return '-';
    return date('d/m/Y', strtotime($fecha));
}
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
</head>
<body>
   <?php include 'includes/header.php'; ?>   
    <main>
        <section class="section">
            <div class="container">
                <div class="section-header">
                    <h2><?= htmlspecialchars($titulo_principal) ?></h2>
                    <p>Consulta las fechas, materias y tribunales confirmados.</p>
                </div>

                <?php if (!empty($llamados_activos)): ?>
                    <?php foreach ($llamados_activos as $llamado): ?> 
                        <div class="exam-table-container">
                            <div class="exam-header">
                                <span><i class="fas fa-calendar-alt"></i> Llamado de <?= htmlspecialchars($llamado['titulo']) ?></span>
                                <span class="exam-year"><?= htmlspecialchars($llamado['anio'] ?? date('Y')) ?></span>
                            </div>
                            
                            <?php if (!empty($llamado['examenes']) && is_array($llamado['examenes'])): ?>
                            <table class="tabla-examenes">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Espacio Curricular / Materia</th>
                                        <th>Tribunal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $fecha_anterior = '';
                                    foreach ($llamado['examenes'] as $ex): 
                                        $fecha_actual = formatearFecha($ex['fecha']);
                                        $mostrar_fecha = ($fecha_actual !== $fecha_anterior);
                                        $fecha_anterior = $fecha_actual;
                                    ?>
                                    <tr>
                                        <td class="date-cell" data-label="Fecha">
                                            <?= $mostrar_fecha ? $fecha_actual : '' ?>
                                        </td>
                                        <td data-label="Materia">
                                            <strong><?= htmlspecialchars($ex['materia']) ?></strong>
                                        </td>
                                        <td data-label="Tribunal">
                                            <?= htmlspecialchars($ex['tribunal']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>                            
                            <?php else: ?>
                                <div style="padding: 20px; text-align: center; color: #64748b;">
                                    Todavía no se cargaron las materias para este llamado.
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="text-align: center; padding: 40px; background: white; border-radius: 12px; border: 1px solid #e5e7eb;">
                        <h3>No hay llamados publicados</h3>
                        <p>Por favor, vuelva a consultar más tarde.</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
   <?php include 'includes/footer.php'; ?>
    <script src="<?php echo JS_URL; ?>script.js"></script>
</body>
</html>