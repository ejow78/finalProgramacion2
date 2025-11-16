<?php require __DIR__ . '/../includes/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecnicatura Superior en Gestión en Producción Agropecuaria</title>
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
   <?php include __DIR__ . '/../includes/header.php'; ?>   
    <!-- Main Content -->
    <main>
        <!-- mini menu -->
        <section class="breadcrumb-section">
            <div class="container">
                <nav class="breadcrumb">
                    <a href="<?php echo BASE_URL; ?>index.php" class="breadcrumb-link">Inicio</a>
                    <span class="breadcrumb-separator">></span>
                    <a href="<?php echo BASE_URL; ?>carreras.php" class="breadcrumb-link">Carreras</a>
                    <span class="breadcrumb-separator">></span>
                    <span class="breadcrumb-current">Tecnicatura Superior en Gestión en Producción Agropecuaria</span>
                </nav>
            </div>
        </section>

        <!-- header carrera -->
        <section class="career-header">
            <div class="container">
                <div class="career-header-content">
                    <div class="career-info">
                        <h1 class="career-title">Tecnicatura Superior en Gestión en Producción Agropecuaria</h1>
                        <p class="career-description">
                            La Tecnicatura en Gestión de Producción Agropecuaria forma técnicos especializados en la administración y optimización de procesos productivos agrícolas y ganaderos. Los estudiantes adquieren conocimientos sobre cultivos, crianza, sanidad animal, gestión de recursos y sustentabilidad. La formación combina teoría con prácticas de campo, tecnologías modernas y herramientas de gestión empresarial. El objetivo es preparar profesionales capaces de mejorar la productividad y competitividad del sector agropecuario.
                        </p>
                    </div>
                    <div class="career-hero-image">
                        <img src="<?php echo IMG_URL; ?>how-to-choose-your-programming-language-for-your-software.jpg" alt="Técnico en Producción Agropecuaria" class="hero-illustration">
                    </div>
                </div>
            </div>
        </section>

        <!-- Detalles carrera -->
        <section class="career-details">
            <div class="container">
                <div class="career-details-grid">
                    <!-- Perfil del Egresado -->
                    <div class="detail-card">
                        <h3 class="detail-title">Perfil del egresado</h3>
                        <div class="detail-content">
                            <p>Técnico especializado en la gestión integral de procesos agropecuarios, capaz de optimizar la producción de forma sustentable y rentable.</p>
                            <ul class="skills-list">
                                <li>Gestión de cultivos y producción agrícola</li>
                                <li>Administración ganadera y sanidad animal</li>
                                <li>Uso de tecnologías agrícolas modernas</li>
                                <li>Gestión empresarial agropecuaria</li>
                                <li>Producción sustentable y ambiental</li>
                                <li>Análisis de mercado agropecuario</li>
                                <li>Manejo de recursos naturales</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Plan de Estudios -->
                    <div class="detail-card">
                        <h3 class="detail-title">Plan de estudios</h3>
                        <div class="detail-content">
                            <div class="curriculum-year">
                                <button class="curriculum-toggle" onclick="toggleCurriculum('año1')">
                                    <span>Primer Año</span>
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="curriculum-content" id="año1">
                                    <ul class="subjects-list">
                                        <li>Biología General</li>
                                        <li>Química Agrícola</li>
                                        <li>Matemática Aplicada</li>
                                        <li>Botánica Agrícola</li>
                                        <li>Suelos y Fertilidad</li>
                                        <li>Ecología Agraria</li>
                                        <li>Introducción a la Informática Agrícola</li>
                                        <li>Prácticas de Campo I</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="curriculum-year">
                                <button class="curriculum-toggle" onclick="toggleCurriculum('año2')">
                                    <span>Segundo Año</span>
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="curriculum-content" id="año2">
                                    <ul class="subjects-list">
                                        <li>Producción de Cultivos Extensivos</li>
                                        <li>Producción de Cultivos Intensivos</li>
                                        <li>Zootecnia General</li>
                                        <li>Sanidad Animal</li>
                                        <li>Máquinas y Mecanización Agrícola</li>
                                        <li>Gestión Empresarial Agrícola</li>
                                        <li>Prácticas de Campo II</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="curriculum-year">
                                <button class="curriculum-toggle" onclick="toggleCurriculum('año3')">
                                    <span>Tercer Año</span>
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="curriculum-content" id="año3">
                                    <ul class="subjects-list">
                                        <li>Producción Ganadera Intensiva</li>
                                        <li>Forrajes y Alimentación Animal</li>
                                        <li>Técnicas de Riego y Drenaje</li>
                                        <li>Producción Orgánica Sustentable</li>
                                        <li>Comercialización Agropecuaria</li>
                                        <li>Legislación Agropecuaria</li>
                                        <li>Prácticas de Campo III</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Duración y Modalidad -->
                    <div class="detail-card">
                        <h3 class="detail-title">Duración y modalidad</h3>
                        <div class="detail-content">
                            <div class="info-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <strong>Duración:</strong>
                                    <p>3 años</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-certificate"></i>
                                <div>
                                    <strong>Modalidad:</strong>
                                    <p>Presencial</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-calendar"></i>
                                <div>
                                    <strong>Horarios:</strong>
                                    <p>Turno Mañana: 07:00 - 12:00 hs</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-graduation-cap"></i>
                                <div>
                                    <strong>Título:</strong>
                                    <p>Técnico Superior en Gestión de Producción Agropecuaria</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Call to Action -->
                <div class="career-cta">
                    <div class="cta-content">
                        <h3>¿Apasionado por la agricultura y ganadería?</h3>
                        <p>Si deseas aplicar tecnología e innovación al sector agropecuario, optimizar procesos productivos y contribuir al desarrollo rural, esta tecnicatura es para ti. Únete y conviértete en un profesional altamente demandado.</p>
                        <div class="cta-buttons">
                            <a href="<?php echo BASE_URL; ?>preinscripcion.php" class="btn-primary">Inscribirme</a>
                            <a href="<?php echo BASE_URL; ?>contacto.php" class="btn-secondary">Más información</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

   <?php include __DIR__ . '/../includes/footer.php'; ?>

    <script src="<?php echo JS_URL; ?>script.js"></script>
</body>
</html>
