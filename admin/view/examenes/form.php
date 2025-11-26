<?php
// Aseguramos que la sesión esté iniciada y cargamos el header del panel
if (session_status() === PHP_SESSION_NONE) session_start();
$rol = $_SESSION['rol'] ?? 'comun';

// Acceso a los datos que vienen del controller
$data = $data ?? ['titulo' => '', 'contenido' => ''];
?>

<div class="container mt-4">
    <div class="edit-card">
        <div class="edit-card-header">
            <h2>Administrar Fechas de Exámenes</h2>
            <p>Define el título y el contenido detallado de las fechas de exámenes finales.</p>
        </div>
        <div class="edit-card-body">
            
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success mb-4">
                    <span><?= htmlspecialchars($_SESSION['success']) ?></span>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger mb-4">
                    <span><?= htmlspecialchars($_SESSION['error']) ?></span>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            
            <form action="index.php?accion=guardar_examenes" method="POST">
                
                <div class="form-group">
                    <label for="titulo" class="form-label">Título del Turno de Exámenes</label>
                    <input type="text" id="titulo" name="titulo" class="form-control" 
                           value="<?= htmlspecialchars($data['titulo'] ?? '') ?>" required>
                </div>

                <div class="form-group">
                    <label for="contenido" class="form-label">Contenido (Fechas y Detalles)</label>
                    <textarea id="contenido" name="contenido" class="form-control" rows="10" required 
                              placeholder="Ej: Historia - 12/12/2026&#10;Matemáticas - 15/12/2026"><?= htmlspecialchars($data['contenido'] ?? '') ?></textarea>
                    <small class="text-muted">Puedes usar saltos de línea para un mejor formato.</small>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar Fechas</button>
                </div>
            </form>
        </div>
    </div>
</div>
