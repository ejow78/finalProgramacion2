<?php require __DIR__ . '/../includes/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecnicatura Superior en Agroindrustria de los Alimentos</title>
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
                    <span class="breadcrumb-current">Tecnicatura Superior en Agroindustria de los Alimentos</span>
                </nav>
            </div>
        </section>

        <!-- header carrera -->
        <section class="career-header">
            <div class="container">
                <div class="career-header-content">
                    <div class="career-info">
                        <h1 class="career-title">Tecnicatura Superior en Agroindustria de los Alimentos</h1>
                        <p class="career-description">
                            La Tecnicatura en Agroindustria de los Alimentos forma técnicos especializados en el procesamiento, conservación y control de calidad de productos alimentarios. Los estudiantes adquieren conocimientos sobre tecnologías de producción, legislación alimentaria, seguridad e higiene, y gestión de procesos. La formación combina teoría con prácticas en laboratorio, y prepara profesionales capaces de innovar en la industria alimentaria.
                        </p>
                    </div>
                    <div class="career-hero-image">
                        <img src="<?php echo IMG_URL; ?>how-to-choose-your-programming-language-for-your-software.jpg" alt="Técnico en Agroindustria de Alimentos" class="hero-illustration">
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
                            <p>Técnico especializado en procesamiento y control de calidad de alimentos, capaz de gestionar procesos productivos seguros e innovadores.</p>
                            <ul class="skills-list">
                                <li>Procesamiento y transformación de alimentos</li>
                                <li>Control de calidad e inocuidad alimentaria</li>
                                <li>Conocimiento de legislación alimentaria</li>
                                <li>Gestión de procesos agroindustriales</li>
                                <li>Uso de tecnología en la producción alimentaria</li>
                                <li>Análisis microbiológicos y químicos</li>
                                <li>Desarrollo y formulación de productos alimentarios</li>
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
                                        <li>Química General e Inorgánica</li>
                                        <li>Química Orgánica Aplicada</li>
                                        <li>Microbiología General</li>
                                        <li>Análisis de Alimentos</li>
                                        <li>Matemática Aplicada</li>
                                        <li>Biología Celular</li>
                                        <li>Introducción a la Agroindustria</li>
                                        <li>Prácticas de Laboratorio I</li>
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
                                        <li>Tecnología de Procesamiento de Alimentos</li>
                                        <li>Conservación de Alimentos</li>
                                        <li>Microbiología Alimentaria</li>
                                        <li>Bromatología</li>
                                        <li>Legislación Alimentaria</li>
                                        <li>Seguridad e Higiene Alimentaria</li>
                                        <li>Prácticas de Laboratorio II</li>
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
                                        <li>Tecnología de Productos Lácteos</li>
                                        <li>Tecnología de Productos Cárnicos</li>
                                        <li>Tecnología de Productos Vegetales</li>
                                        <li>Control de Calidad e Inocuidad</li>
                                        <li>Gestión de Procesos Agroindustriales</li>
                                        <li>Desarrollo de Nuevos Productos</li>
                                        <li>Prácticas Profesionales</li>
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
                                    <p>Turno Tarde: 14:00 - 18:30 hs</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-graduation-cap"></i>
                                <div>
                                    <strong>Título:</strong>
                                    <p>Técnico Superior en Agroindustria de los Alimentos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Call to Action -->
                <div class="career-cta">
                    <div class="cta-content">
                        <h3>¿Interesado en innovar en la industria alimentaria?</h3>
                        <p>Si deseas trabajar en el procesamiento de alimentos, control de calidad y desarrollo de nuevos productos, esta tecnicatura te abrirá puertas en una industria en constante crecimiento. Únete a nuestro programa y sé parte del futuro alimentario.</p>
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
