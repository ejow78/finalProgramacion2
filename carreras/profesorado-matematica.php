<?php require __DIR__ . '/../includes/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesorado de Educación Secundaria en Matemáticas</title>
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
                    <span class="breadcrumb-current">Profesorado de Educación Secundaria en Matemáticas</span>
                </nav>
            </div>
        </section>

        <!-- header carrera -->
        <section class="career-header">
            <div class="container">
                <div class="career-header-content">
                    <div class="career-info">
                        <h1 class="career-title">Profesorado de Educación Secundaria en Matemáticas</h1>
                        <p class="career-description">
                            El Profesorado en Matemáticas capacita docentes especializados en la enseñanza de esta disciplina fundamental. Los estudiantes adquieren conocimientos profundos en álgebra, geometría, análisis y estadística, combinados con estrategias pedagógicas innovadoras. La formación enfatiza la resolución de problemas, el razonamiento lógico y la aplicación práctica de conceptos matemáticos. El objetivo es formar educadores capaces de inspirar a los jóvenes y desarrollar su pensamiento matemático y analítico.
                        </p>
                    </div>
                    <div class="career-hero-image">
                        <img src="<?php echo IMG_URL; ?>how-to-choose-your-programming-language-for-your-software.jpg" alt="Profesor de Matemáticas en clase" class="hero-illustration">
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
                            <p>Docente especializado en la enseñanza de matemáticas, con sólidos fundamentos en teoría matemática y capacidad para transmitir conocimientos complejos de manera clara y motivadora.</p>
                            <ul class="skills-list">
                                <li>Dominio de álgebra, geometría, análisis y estadística</li>
                                <li>Resolución de problemas y pensamiento lógico-deductivo</li>
                                <li>Diseño de estrategias didácticas innovadoras</li>
                                <li>Aplicación de tecnología educativa en matemáticas</li>
                                <li>Evaluación formativa y retroalimentación constructiva</li>
                                <li>Promoción del razonamiento crítico y analítico</li>
                                <li>Capacidad de motivar y fomentar el interés por las matemáticas</li>
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
                                        <li>Álgebra I</li>
                                        <li>Geometría Euclidiana</li>
                                        <li>Análisis Matemático I</li>
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
                                        <li>Didáctica Específica de Matemáticas</li>
                                        <li>Álgebra II</li>
                                        <li>Análisis Matemático II</li>
                                        <li>Probabilidad y Estadística</li>
                                        <li>Geometría Analítica</li>
                                        <li>Recursos Educativos en Matemáticas</li>
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
                                        <li>Álgebra Lineal</li>
                                        <li>Análisis Matemático III</li>
                                        <li>Ecuaciones Diferenciales</li>
                                        <li>Geometría Diferencial</li>
                                        <li>Tecnología Digital en la Enseñanza</li>
                                        <li>Evaluación en Matemáticas</li>
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
                                        <li>Seminario: Aplicaciones de Matemáticas</li>
                                        <li>Seminario: Historia y Filosofía de las Matemáticas</li>
                                        <li>Taller de Resolución de Problemas</li>
                                        <li>Recursos Virtuales y Plataformas Educativas</li>
                                        <li>Inclusión y Matemáticas</li>
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
                                    <p>Turno Noche: 18:00 - 22:30 hs</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-graduation-cap"></i>
                                <div>
                                    <strong>Título:</strong>
                                    <p>Profesor/a de Educación Secundaria en Matemáticas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Call to Action -->
                <div class="career-cta">
                    <div class="cta-content">
                        <h3>¿Apasionado por los números y la educación?</h3>
                        <p>Si deseas compartir tu amor por las matemáticas y formar jóvenes pensadores lógicos y analíticos, este programa es para ti. Únete a nuestro profesorado y conviértete en un educador que inspira.</p>
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
