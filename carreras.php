<!DOCTYPE php>
<php lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carreras - IES La Cocha</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <!-- Contenido Body -->
    <main>
        <!-- Oferta academica -->
        <section class="section programs">
            <div class="container">
                <div class="section-header">
                    <h2>Nuestras carreras</h2>
                </div>
                <div class="programs-grid">
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-clock-rotate-left"></i>
                        </div>
                        <h3>Profesorado de Educación Secundaria en Historia</h3>
                        <p>Especialízate en la enseñanza de la historia con un enfoque práctico y actualizado.</p>
                        <a href="carreras/profesorado-historia.php" class="program-link">Más información <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-calculator"></i>
                        </div>
                        <h3>Profesorado de Educación Secundaria en Matemáticas</h3>
                        <p>Especialízate en la enseñanza de matemáticas con un enfoque práctico y actualizado.</p>
                        <a href="carreras/profesorado-matematica.php" class="program-link">Más información <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h3>Técnico Superior en Gestion en Producción Agropecuaria</h3>
                        <p>Aprende a gestionar y optimizar la producción de recursos agrícolas y ganaderos.</p>
                        <a href="carreras/tecnicatura-agropecuaria.php" class="program-link">Más información <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-network-wired"></i>
                        </div>
                        <h3>Técnico Superior en Agroindrustria de los Alimentos</h3>
                        <p>Especialízate en el procesamiento y control de calidad de alimentos para la industria alimentaria.</p>
                        <a href="carreras/tecnicatura-agroindustria-alimentos.php" class="program-link">Más información <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3>Tecnicatura en Desarrollo de Software</h3>
                        <p>Desarrolla aplicaciones web y móviles con las tecnologías más demandadas del mercado.</p>
                        <a href="carreras/tecnicatura-software.php" class="program-link">Más información <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/script.js"></script>
</body>
</php>
