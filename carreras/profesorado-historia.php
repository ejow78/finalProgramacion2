<?php require __DIR__ . '/../includes/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesorado de Educación Secundaria en Historia</title>
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
                    <span class="breadcrumb-current">Profesorado de Educación Secundaria en Historia</span>
                </nav>
            </div>
        </section>

        <!-- header carrera -->
        <section class="career-header">
            <div class="container">
                <div class="career-header-content">
                    <div class="career-info">
                        <h1 class="career-title">Profesorado de Educación Secundaria en Historia</h1>
                        <p class="career-description">
                            El Profesorado en Historia forma docentes especializados en la enseñanza de la historia en nivel secundario. Los estudiantes desarrollan competencias para analizar, interpretar y comunicar procesos históricos, promoviendo el pensamiento crítico en sus alumnos. La formación combina conocimientos disciplinares sobre distintas épocas y regiones, con herramientas pedagógicas y didácticas modernas. El objetivo es preparar profesionales capaces de educar ciudadanos conscientes de su contexto histórico y social.
                        </p>
                    </div>
                    <div class="career-hero-image">
                        <img src="<?php echo IMG_URL; ?>how-to-choose-your-programming-language-for-your-software.jpg" alt="Profesor de Historia en clase" class="hero-illustration">
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
                            <p>Docente capacitado para enseñar historia en educación secundaria, con sólidos conocimientos historiográficos y habilidades pedagógicas para estimular el pensamiento crítico y el análisis reflexivo en sus estudiantes.</p>
                            <ul class="skills-list">
                                <li>Dominio de períodos históricos (Antigüedad, Edad Media, Modernidad, Contemporáneo)</li>
                                <li>Análisis crítico de fuentes y documentos históricos</li>
                                <li>Diseño de estrategias didácticas innovadoras</li>
                                <li>Gestión de espacios de debate y reflexión</li>
                                <li>Integración de tecnología en la enseñanza de la historia</li>
                                <li>Evaluación formativa y retroalimentación constructiva</li>
                                <li>Promoción del pensamiento crítico y ciudadanía activa</li>
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
                                        <li>Pedagogía General</li>
                                        <li>Didáctica General</li>
                                        <li>Psicología Educacional</li>
                                        <li>Filosofía de la Educación</li>
                                        <li>Historia Medieval</li>
                                        <li>Historia de América Colonial</li>
                                        <li>Historiografía e Introducción a la Investigación Histórica</li>
                                        <li>Práctica Docente I</li>
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
                                        <li>Didáctica Específica de la Historia</li>
                                        <li>Historia Moderna de Europa</li>
                                        <li>Historia Moderna de América Latina</li>
                                        <li>Historia de América Independiente</li>
                                        <li>Teoría de la Historia</li>
                                        <li>Recursos Audiovisuales en la Enseñanza</li>
                                        <li>Práctica Docente II</li>
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
                                        <li>Historia Argentina I</li>
                                        <li>Historia Argentina II</li>
                                        <li>Historia Contemporánea de Europa</li>
                                        <li>Historia Contemporánea de América Latina</li>
                                        <li>Análisis de Fuentes Documentales</li>
                                        <li>Nuevas Tecnologías en la Enseñanza de la Historia</li>
                                        <li>Práctica Docente III (Residencia Pedagógica)</li>
                                    </ul>
                                </div>
                            </div>
                              <div class="curriculum-year">
                                <button class="curriculum-toggle" onclick="toggleCurriculum('año4')">
                                    <span>Cuarto Año</span>
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="curriculum-content" id="año4">
                                    <ul class="subjects-list">
                                        <li>Seminario: Historia Local y Regional</li>
                                        <li>Seminario: Historia y Memoria</li>
                                        <li>Evaluación y Acreditación en Historia</li>
                                        <li>Taller de Producción de Materiales Didácticos</li>
                                        <li>Derechos Humanos y Educación Cívica</li>
                                        <li>Práctica Docente IV (Residencia Intensiva)</li>
                                        <li>Trabajo Final Integrador</li>
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
                                    <p>4 años</p>
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
                                    <p>Profesor/a de Educación Secundaria en Historia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Call to Action -->
                <div class="career-cta">
                    <div class="cta-content">
                        <h3>¿Interesado en formar futuras generaciones?</h3>
                        <p>Si eres apasionado por la historia y deseas contribuir a la educación de jóvenes, esta carrera es para ti. Únete a nuestro programa y conviértete en un docente innovador capaz de transformar la enseñanza de la historia en tu comunidad.</p>
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
