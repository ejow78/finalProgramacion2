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
        <div id="contenedor-llamados"></div>

        <div style="margin-top: 20px; display: flex; gap: 10px;">
            <button type="button" onclick="agregarLlamado()" style="background:#64748b;">+ Agregar Nuevo Llamado</button>
            <button type="submit">Guardar Todos los Cambios</button>
        </div>
    </form>
</div>

<script>
    let llamadosData = <?php echo json_encode($llamados); ?>;
    
   if (!llamadosData || llamadosData.length === 0) {
        llamadosData = [{ titulo: '', anio: new Date().getFullYear(), examenes: [] }];
    }

    function render() {
        const container = document.getElementById('contenedor-llamados');
        container.innerHTML = '';

        llamadosData.forEach((llamado, indexLlamado) => {
            const llamadoHtml = document.createElement('div');
            llamadoHtml.className = 'llamado-wrapper'; // Clase CSS renombrada
            llamadoHtml.innerHTML = `
                <button type="button" class="btn-remove-llamado" onclick="eliminarLlamado(${indexLlamado})">
                    <i class="fas fa-trash"></i> Eliminar Llamado
                </button>
                <div class="form-row-header">
                    <div>
                        <label>Mes</label>
                        <input type="text" name="llamados[${indexLlamado}][titulo]" value="${llamado.titulo || ''}" required placeholder="Ej: Julio - Agosto">
                    </div>
                    <div>
                        <label>Año</label>
                        <input type="number" name="llamados[${indexLlamado}][anio]" value="${llamado.anio || new Date().getFullYear()}" required>
                    </div>
                </div>
                
                <div class="examenes-list" id="lista-examenes-${indexLlamado}">
                    <div class="examen-header-row">
                        <div>Fecha</div>
                        <div>Materia / Espacio</div>
                        <div>Tribunal (Profesores)</div>
                        <div></div>
                    </div>
                </div>
                <button type="button" class="btn-add-examen" onclick="agregarExamen(${indexLlamado})">
                    <i class="fas fa-plus"></i> Agregar Fecha de Examen
                </button>
            `;
            container.appendChild(llamadoHtml);

            const listaExamenes = document.getElementById(`lista-examenes-${indexLlamado}`);
            if(llamado.examenes && llamado.examenes.length > 0) {
                llamado.examenes.forEach((examen, indexExamen) => {
                    const row = crearFilaExamen(indexLlamado, indexExamen, examen);
                    listaExamenes.appendChild(row);
                });
            } else {
                listaExamenes.appendChild(crearFilaExamen(indexLlamado, 0, {}));
            }
        });
    }

    function crearFilaExamen(indexLlamado, indexExamen, data) {
        const div = document.createElement('div');
        div.className = 'examen-row';
        div.innerHTML = `
            <input type="date" name="llamados[${indexLlamado}][examenes][${indexExamen}][fecha]" value="${data.fecha || ''}">
            <input type="text" name="llamados[${indexLlamado}][examenes][${indexExamen}][materia]" value="${data.materia || ''}" placeholder="Materia">
            <input type="text" name="llamados[${indexLlamado}][examenes][${indexExamen}][tribunal]" value="${data.tribunal || ''}" placeholder="Tribunal">
            <button type="button" class="btn-remove-row" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        `;
        return div;
    }

    function agregarLlamado() {
        llamadosData.push({ titulo: '', anio: new Date().getFullYear(), examenes: [] });
        render();
    }

    function eliminarLlamado(index) {
        if(confirm('¿Estás seguro de eliminar este llamado completo?')) {
            llamadosData.splice(index, 1);
            render();
        }
    }

    function agregarExamen(indexLlamado) {
        const lista = document.getElementById(`lista-examenes-${indexLlamado}`);
        const nuevoIndex = lista.children.length; 
        lista.appendChild(crearFilaExamen(indexLlamado, nuevoIndex, {}));
    }

    document.addEventListener('DOMContentLoaded', render);
</script>
</body>
</html>