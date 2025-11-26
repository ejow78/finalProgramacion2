<?php 
require __DIR__ . '/includes/config.php'; 
require __DIR__ . '/admin/model/ExamenModel.php'; 

if (!class_exists('ExamenModel')) {
    $data = ['turnos' => []];
} else {
    $examenModel = new ExamenModel();
    $data = $examenModel->obtenerTurnos();
}

$turnos_activos = $data['turnos'] ?? [];
$titulo_principal = "Calendario de Mesas de Exámenes";

// Función auxiliar para formatear fecha bonita (ej: 12/03/2025)
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
    <style>
        .exam-table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            overflow: hidden;
            border: 1px solid #e5e7eb;
            margin-bottom: 40px;
        }
        .exam-header {
            background: #1e40af;
            color: white;
            padding: 15px 25px;
            font-size: 18px;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .exam-year {
            background: rgba(255,255,255,0.2);
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 0.9em;
        }
        .tabla-examenes {
            width: 100%;
            border-collapse: collapse;
        }
        .tabla-examenes th {
            background-color: #f1f5f9;
            color: #1f2937;
            font-weight: 600;
            padding: 12px 20px;
            text-align: left;
            border-bottom: 2px solid #e2e8f0;
        }
        .tabla-examenes td {
            padding: 12px 20px;
            border-bottom: 1px solid #e2e8f0;
            color: #4b5563;
        }
        .date-cell {
            font-weight: 700;
            color: #1e40af;
            background-color: #f8fafc;
            border-right: 1px solid #e2e8f0;
            width: 120px;
            text-align: center;
        }
        @media (max-width: 768px) {
            .tabla-examenes th { display: none; }
            .tabla-examenes tr { display: block; border-bottom: 2px solid #e2e8f0; margin-bottom: 10px; }
            .tabla-examenes td { display: block; text-align: right; padding: 8px 15px; border: none; position: relative; }
            .tabla-examenes td::before { content: attr(data-label); position: absolute; left: 15px; font-weight: 600; color: #64748b; }
            .date-cell { text-align: right; background: none; color: #1e40af; width: 100%; border: none; }
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
                    <p>Consulta las fechas, materias y tribunales confirmados.</p>
                </div>

                <?php if (!empty($turnos_activos)): ?>
                    <?php foreach ($turnos_activos as $turno): ?>
                        <div class="exam-table-container">
                            <div class="exam-header">
                                <span><i class="fas fa-calendar-alt"></i> <?= htmlspecialchars($turno['titulo']) ?></span>
                                <span class="exam-year"><?= htmlspecialchars($turno['anio'] ?? date('Y')) ?></span>
                            </div>
                            
                            <?php if (!empty($turno['examenes']) && is_array($turno['examenes'])): ?>
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
                                    foreach ($turno['examenes'] as $ex): 
                                        $fecha_actual = formatearFecha($ex['fecha']);
                                        // Simple lógica para no repetir visualmente la fecha si es la misma
                                        $mostrar_fecha = ($fecha_actual !== $fecha_anterior);
                                        $fecha_anterior = $fecha_actual;
                                    ?>
                                    <tr>
                                        <td class="date-cell" data-label="Fecha">
                                            <?= $mostrar_fecha ? $fecha_actual : '' ?>
                                        </td>
                                        <td data-label="Materia"><strong><?= htmlspecialchars($ex['materia']) ?></strong></td>
                                        <td data-label="Tribunal"><?= htmlspecialchars($ex['tribunal']) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                                <div style="padding: 20px; text-align: center; color: #64748b;">
                                    Todavía no se cargaron las fechas para este llamado.
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="text-align: center; padding: 40px; background: white; border-radius: 12px; border: 1px solid #e5e7eb;">
                        <h3>No hay fechas publicadas</h3>
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