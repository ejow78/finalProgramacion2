<?php require __DIR__ . '/includes/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IES La Cocha</title>
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <!-- Hero Carousel -->
    <section class="hero">
        <div class="carousel" id="carousel">
            <div class="carousel-slide active">
                <img src="<?php echo IMG_URL; ?>inscripciones.webp" alt="Campus universitario">
                <div class="carousel-content">
                    <h2>Preinscribite!</h2>
                    <p>Ya estan abiertas las preinscripciones para el ciclo lectivo 2026</p>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="<?php echo IMG_URL; ?>MathClass_0033_hero.jpg" alt="Estudiantes">
                <div class="carousel-content">
                    <h2>Formando el Futuro</h2>
                    <p>lorem ipsum</p>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="<?php echo IMG_URL; ?>Agro1-1100x733-1.jpg" alt="Graduación">
                <div class="carousel-content">
                    <h2>Tu Futuro Comienza Aquí</h2>
                    <p>lorem ipsum</p>
                </div>
            </div>
            <button class="carousel-btn prev" id="prevBtn">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="carousel-btn next" id="nextBtn">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </section>

    <!-- Contenido Body -->
    <main>
        <!-- Oferta academica -->
        <section class="section programs">
            <div class="container">
                <div class="section-header">
                    <h2>Nuestra Oferta Académica</h2>
                    <p>Carreras diseñadas para el mundo laboral actual</p>
                </div>
                <div class="programs-grid">
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3>Tecnicatura en Desarrollo de Software</h3>
                        <p>Desarrolla aplicaciones web y móviles con las tecnologías más demandadas del mercado.</p>
                        <a href="<?php echo CARRERAS_URL; ?>tecnicatura-software.php" class="program-link">Ver más <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-network-wired"></i>
                        </div>
                        <h3>Profesorado en Matemáticas</h3>
                        <p>Especialízate en la enseñanza de matemáticas con un enfoque práctico y actualizado.</p>
                        <a href="<?php echo CARRERAS_URL; ?>profesorado-matematica.php" class="program-link">Ver más <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <h3>Profesorado en Historia</h3>
                        <p>Especialízate en la enseñanza de la historia con un enfoque práctico y actualizado.</p>
                        <a href="<?php echo CARRERAS_URL; ?>profesorado-historia.php" class="program-link">Ver más <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sobre Nosotros -->
        <section class="section about">
            <div class="container">
                <div class="about-content">
                    <div class="about-text">
                        <div class="section-header">
                            <h2>Sobre Nosotros</h2>
                            <p>Instituto de Enseñanza Superior La Cocha</p>
                        </div>
                        <p class="about-description">
                            Este Instituto Superior de Formación Docente forma parte del sistema de educación pública de gestión estatal. <br>A través de este sitio en Internet, nuestro Instituto podrá comunicar novedades, acercar información, compartir experiencias y brindar apoyo y asesoramiento a alumnos, docentes e interesados en formar parte de esta comunidad educativa. <br>Junto con varios cientos de Institutos, integramos la Red Virtual de Institutos Superiores de Formación Docente coordinada por el INFD (Instituto Nacional de Formación Docente) dependiente del Ministerio de Educación de la Nación Argentina.
                        </p>
                    </div>
                    <div class="about-image">
                        <img src="<?php echo IMG_URL; ?>carrusel2.png" alt="Instituto La Cocha">
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php include 'includes/footer.php'; ?>

    <script src="<?php echo JS_URL; ?>script.js"></script>
</body>
</php>
