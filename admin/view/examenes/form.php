<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$rol = $_SESSION['rol'] ?? 'comun';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel - Exámenes</title>
    <link rel="stylesheet" href="<?php echo ADMIN_URL; ?>estilos.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="header">
        <div class="header-top">
            <h2>Gestor de Mesas de Examen</h2>
            <div class="header-actions">
                <span class="user-badge"><i class="fas fa-user-circle"></i> <?= htmlspecialchars($_SESSION['usuario'] ?? 'Admin') ?></span>
                <a href="<?php echo BASE_URL; ?>index.php" class="btn-dark" target="_blank">Volver al Sitio</a>
                <a href="<?php echo ADMIN_URL; ?>index.php?accion=logout" class="btn-danger">Cerrar Sesión</a>
            </div>
        </div>
        <div class="header-tabs">
            <a href="index.php?accion=inscripciones" class="tab-link">Inscripciones</a>
            <a href="index.php?accion=mensajes" class="tab-link">Mensajes</a>
            <?php if ($rol === 'admin'): ?>
                <a href="index.php?accion=usuarios" class="tab-link">Usuarios</a>
                <a href="index.php?accion=formulario_examenes" class="tab-link active">Exámenes</a>
            <?php endif; ?>
        </div>
    </div>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert-success"><?= htmlspecialchars($_SESSION['success']) ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <form action="index.php?accion=guardar_examenes" method="POST" id="formExamenes">
        <div id="contenedor-turnos"></div>

        <div style="margin-top: 20px; display: flex; gap: 10px;">
            <button type="button" onclick="agregarTurno()" style="background:#64748b;">+ Agregar Nuevo Llamado</button>
            <button type="submit">Guardar Todos los Cambios</button>
        </div>
    </form>
</div>

<script>
    let turnosData = <?php echo json_encode($turnos); ?>;
    
    if (!turnosData || turnosData.length === 0) {
        turnosData = [{ titulo: '', anio: new Date().getFullYear(), examenes: [] }];
    }

    function render() {
        const container = document.getElementById('contenedor-turnos');
        container.innerHTML = '';

        turnosData.forEach((turno, indexTurno) => {
            const turnoHtml = document.createElement('div');
            turnoHtml.className = 'turno-wrapper';
            turnoHtml.innerHTML = `
                <button type="button" class="btn-remove-turno" onclick="eliminarTurno(${indexTurno})">
                    <i class="fas fa-trash"></i> Eliminar Llamado
                </button>
                <div class="form-row-header">
                    <div>
                        <label>Mes</label>
                        <input type="text" name="turnos[${indexTurno}][titulo]" value="${turno.titulo || ''}" required placeholder="Ej: Julio - Agosto">
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

            const listaExamenes = document.getElementById(`lista-examenes-${indexTurno}`);
            if(turno.examenes && turno.examenes.length > 0) {
                turno.examenes.forEach((examen, indexExamen) => {
                    const row = crearFilaExamen(indexTurno, indexExamen, examen);
                    listaExamenes.appendChild(row);
                });
            } else {
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
        const nuevoIndex = lista.children.length; 
        lista.appendChild(crearFilaExamen(indexTurno, nuevoIndex, {}));
    }

    document.addEventListener('DOMContentLoaded', render);
</script>
</body>
</html>