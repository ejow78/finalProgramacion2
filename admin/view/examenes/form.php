<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$rol = $_SESSION['rol'] ?? 'comun';
// $turnos viene del controller
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel - Exámenes</title>
    <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>estilos.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .turno-wrapper {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            position: relative;
        }
        .btn-remove-turno {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #ef4444;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .examenes-list {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            overflow: hidden;
        }
        .examen-row {
            display: grid;
            grid-template-columns: 150px 2fr 2fr 40px;
            gap: 10px;
            padding: 10px;
            border-bottom: 1px solid #f1f5f9;
            align-items: center;
        }
        .examen-row:last-child { border-bottom: none; }
        .examen-row label { display: none; } /* Ocultar labels en filas repetidas */
        .examen-header-row {
            display: grid;
            grid-template-columns: 150px 2fr 2fr 40px;
            gap: 10px;
            padding: 10px;
            background: #e2e8f0;
            font-weight: bold;
            font-size: 13px;
            color: #475569;
        }
        .btn-add-examen {
            margin-top: 10px;
            background: #3b82f6;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
        }
        .btn-remove-row {
            color: #ef4444;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .form-row-header {
            display: grid;
            grid-template-columns: 3fr 1fr;
            gap: 20px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
    <div class="header-top">
        <h2>Gestión Mesas de Exámenes</h2>
        <div class="header-actions">
            <span class="user-badge"><i class="fas fa-user-circle"></i> <?= htmlspecialchars($_SESSION['usuario'] ?? 'Admin') ?></span>
            <a href="<?php echo BASE_URL; ?>index.php" class="btn-dark" target="_blank">Ver Sitio</a>
            <a href="<?php echo ADMIN_URL; ?>index.php?accion=logout" class="btn-danger">Salir</a>
        </div>
    </div>
    <div class="header-tabs">
        <a href="index.php?accion=inscripciones" class="tab-link">Inscripciones</a>
        <a href="index.php?accion=mensajes" class="tab-link">Mensajes</a>
        <?php if ($rol === 'admin'): ?>
            <a href="index.php?accion=usuarios" class="tab-link">Usuarios</a>
            <a href="index.php?accion=formulario_examenes" class="tab-link active">Exámenes</a> <?php endif; ?>
    </div>
</div>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert-success"><?= htmlspecialchars($_SESSION['success']) ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <form action="index.php?accion=guardar_examenes" method="POST" id="formExamenes">
        <div id="contenedor-turnos">
            </div>

        <div style="margin-top: 20px; display: flex; gap: 10px;">
            <button type="button" onclick="agregarTurno()" style="background:#64748b;">+ Agregar Nuevo Llamado</button>
            <button type="submit">Guardar</button>
        </div>
    </form>
</div>

<script>
    // Recuperamos los datos de PHP a JS
    let turnosData = <?php echo json_encode($turnos); ?>;
    
    // Si no hay datos, iniciamos con uno vacío
    if (!turnosData || turnosData.length === 0) {
        turnosData = [{ titulo: '', anio: new Date().getFullYear(), examenes: [] }];
    }

    function render() {
        const container = document.getElementById('contenedor-turnos');
        container.innerHTML = '';

        turnosData.forEach((turno, indexTurno) => {
            // Crear HTML del turno
            const turnoHtml = document.createElement('div');
            turnoHtml.className = 'turno-wrapper';
            turnoHtml.innerHTML = `
                <button type="button" class="btn-remove-turno" onclick="eliminarTurno(${indexTurno})">
                    <i class="fas fa-trash"></i> Eliminar llamado
                </button>
                <div class="form-row-header">
                    <div>
                        <label>Mes</label>
                        <input type="text" name="turnos[${indexTurno}][titulo]" value="${turno.titulo || ''}" required placeholder="Nombre del Turno">
                    </div>
                    <div>
                        <label>Año</label>
                        <input type="number" name="turnos[${indexTurno}][anio]" value="${turno.anio || new Date().getFullYear()}" required>
                    </div>
                </div>
                
                <div class="examenes-list" id="lista-examenes-${indexTurno}">
                    <div class="examen-header-row">
                        <div>Fecha</div>
                        <div>Materia / Espacio</div>
                        <div>Tribunal (Profesores)</div>
                        <div></div>
                    </div>
                    </div>
                <button type="button" class="btn-add-examen" onclick="agregarExamen(${indexTurno})">
                    <i class="fas fa-plus"></i> Agregar Fecha de Examen
                </button>
            `;
            container.appendChild(turnoHtml);

            // Renderizar los exámenes de este turno
            const listaExamenes = document.getElementById(`lista-examenes-${indexTurno}`);
            if(turno.examenes && turno.examenes.length > 0) {
                turno.examenes.forEach((examen, indexExamen) => {
                    const row = crearFilaExamen(indexTurno, indexExamen, examen);
                    listaExamenes.appendChild(row);
                });
            } else {
                // Agregar una fila vacía por defecto si no hay nada
                listaExamenes.appendChild(crearFilaExamen(indexTurno, 0, {}));
            }
        });
    }

    function crearFilaExamen(indexTurno, indexExamen, data) {
        const div = document.createElement('div');
        div.className = 'examen-row';
        div.innerHTML = `
            <input type="date" name="turnos[${indexTurno}][examenes][${indexExamen}][fecha]" value="${data.fecha || ''}">
            <input type="text" name="turnos[${indexTurno}][examenes][${indexExamen}][materia]" value="${data.materia || ''}" placeholder="Materia">
            <input type="text" name="turnos[${indexTurno}][examenes][${indexExamen}][tribunal]" value="${data.tribunal || ''}" placeholder="Tribunal">
            <button type="button" class="btn-remove-row" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        `;
        return div;
    }

    function agregarTurno() {
        turnosData.push({ titulo: '', anio: new Date().getFullYear(), examenes: [] });
        render();
    }

    function eliminarTurno(index) {
        if(confirm('¿Estás seguro de eliminar este turno completo?')) {
            turnosData.splice(index, 1);
            render();
        }
    }

    function agregarExamen(indexTurno) {
        const lista = document.getElementById(`lista-examenes-${indexTurno}`);
        // Calcular nuevo índice basado en hijos actuales para evitar conflictos
        const nuevoIndex = lista.children.length; 
        lista.appendChild(crearFilaExamen(indexTurno, nuevoIndex, {}));
    }

    // Inicializar
    document.addEventListener('DOMContentLoaded', render);
</script>
</body>
</html>