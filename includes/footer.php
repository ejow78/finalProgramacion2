<?php
require_once __DIR__ . '/config.php';
?>
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Información de Contacto</h3>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>info@ieslacocha.edu.ar</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>(0381) 123-4567</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Sarmiento 150, La Cocha, Tucumán</span>
                    </div>
                </div>
            </div>
            <div class="footer-section">
                <h3>Enlaces Rápidos</h3>
                <ul class="footer-links">
                    <li><a href="<?php echo BASE_URL; ?>index.php">Inicio</a></li>
                    <li><a href="<?php echo BASE_URL; ?>carreras.php">Carreras</a></li>
                    <li><a href="<?php echo BASE_URL; ?>preinscripcion.php">Preinscripciones abiertas</a></li>
                    <li><a href="<?php echo BASE_URL; ?>contacto.php">Contacto</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Institucional</h3>
                <div class="institutional-logos">
                    <a href="https://www.argentina.gob.ar/educacion/infod" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo IMG_URL; ?>logo_infod.png" alt="Logo INFOD">
                    </a>
                    <a href="https://www.argentina.gob.ar/educacion" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo IMG_URL; ?>logo_ministerio.png" alt="Logo Ministerio">
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; Diaz Santiago Ortiz Edgar. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
