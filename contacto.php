<?php
session_start();
$ok = $_SESSION['flash_ok']  ?? null;
$err = $_SESSION['flash_error'] ?? null;
unset($_SESSION['flash_ok'], $_SESSION['flash_error']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - IES La Cocha</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <!-- Contenido Body -->
    <main>
        <section class="section contact">
            <div class="container">
                <div class="section-header">
                    <h2>Contactanos</h2>
                    <p>¿Tenés preguntas? Estamos acá para ayudarte</p>
                </div>
                <div class="contact-content">
                    <!-- Form Contacto -->
                    <div class="contact-form-container">
                        <?php if ($ok): ?>
                            <div style="padding:10px;border-radius:6px;background:#e8f7ed;color:#1f7a3e;margin-bottom:12px">
                                <?= htmlspecialchars($ok) ?>
                            </div>
                        <?php endif; ?>
                
                        <?php if ($err): ?>
                            <div style="padding:10px;border-radius:6px;background:#fde2e1;color:#8a1f1f;margin-bottom:12px">
                                <?= htmlspecialchars($err) ?>
                            </div>
                        <?php endif; ?>
                        <form class="contact-form" id="contactFormPHP" method="POST" action="<?php echo BASE_URL; ?>procesar_contacto.php">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="firstName">Nombre *</label>
                                    <input type="text" id="firstName" name="firstName" required>
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Apellido *</label>
                                    <input type="text" id="lastName" name="lastName" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Teléfono</label>
                                    <input type="tel" id="phone" name="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="interest">Área de Interés</label>
                                <select id="interest" name="interest">
                                    <option value="">Selecciona una opción</option>
                                    <option value="alimentos">Técnico Superior en Agroindustria de los Alimentos</option>
                                    <option value="historia">Profesorado de Educación Secundaria en Historia</option>
                                    <option value="matematicas">Profesorado de Educación Secundaria en Matemáticas</option>
                                    <option value="agropecuaria">Técnico Superior en Gestión de Producción Agropecuaria</option>
                                    <option value="software">Técnico Superior en Desarrollo de Software</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message">Mensaje *</label>
                                <textarea id="message" name="message" rows="5" placeholder="Contanos como podemos ayudarte..." required></textarea>
                            </div>
                            <button type="submit" class="btn-submit">
                                Enviar Mensaje
                            </button>
                        </form>
                    </div>
                    
                    <!-- Mapa -->
                    <div class="map-container">
                        <div class="map-header">
                            <h3>Nuestra ubicación</h3>
                            <p>Sarmiento 150, La Cocha, Tucumán, Argentina</p>
                        </div>
                        <div class="map-embed">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d589.0419800283813!2d-65.58946114225895!3d-27.770886768642367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9423f16bcd38a087%3A0xef7f4dbc47845da9!2sI.E.S%20La%20Cocha!5e0!3m2!1sen!2sar!4v1753326352843!5m2!1sen!2sar"
                                width="100%" 
                                height="400" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/script.js"></script>
</body>
</html>
