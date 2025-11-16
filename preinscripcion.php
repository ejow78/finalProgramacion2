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
    <title>Preinscripción - IES La Cocha</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>

  

    <?php include 'includes/header.php'; ?>



    <!-- Contenido Body -->
    <main>
        <section class="section preregistro">
            <div class="container">
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
                <div class="section-header">
                    <h2>Preinscripción</h2>
                    <p>Completa el formulario</p>
                </div>
                <div class="preregistro-content">
      <div class="preregistro-form-container">
        <form class="registroform-form" id="registroform" action="<?php echo BASE_URL; ?>procesar_registro.php" method="POST">
  
          <div class="form-row">
            <div class="form-group">
              <label for="nombre">Nombre *</label>
              <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
              <label for="apellido">Apellido *</label>
              <input type="text" id="apellido" name="apellido" required>
            </div>
            <div class="form-group">
              <label for="dni">DNI *</label>
              <input type="number" id="dni" name="dni" required>
            </div>
            <div class="form-group">
              <label for="genero">Género *</label>
              <select id="genero" name="genero" required>
                <option value="" disabled selected hidden>Selecciona una opción</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otrog">Otro/a</option>
              </select>
            </div>
          </div>


          <div class="form-row">
            <div class="form-group full">
              <label for="localidad">Localidad *</label>
              <select id="localidad" name="localidad" required>
                <option value="" disabled selected hidden>Selecciona una opción</option>
                <option value="alberdi">Juan Bautista Alberdi</option>
                <option value="aguilares">Aguilares</option>
                <option value="concepcion">Concepción</option>
                <option value="graneros">Graneros</option>
                <option value="lacocha">La Cocha</option>
                <option value="lamadrid">La Madrid</option>
                <option value="santana">Santa Ana</option>
                <option value="villabel">Villa Belgrano</option>
                <option value="otraloc">Otro/a</option>
              </select>
            </div>
            <div class="form-group">
              <label for="direccion">Dirección *</label>
              <input type="text" id="direccion" name="direccion" required>
            </div>
            <div class="form-group">
              <label for="email">Email *</label>
              <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="telefono">Teléfono</label>
              <input type="tel" id="telefono" name="telefono" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group full">
              <label for="carrera">Carrera *</label>
              <select id="carrera" name="carrera" required>
                <option value="" disabled selected hidden>Selecciona una opción</option>
                <option value="alimentos">Técnico Superior en Agroindustria de los Alimentos</option>
                <option value="historia">Profesorado de Educación Secundaria en Historia</option>
                <option value="matematicas">Profesorado de Educación Secundaria en Matemáticas</option>
                <option value="agropecuaria">Técnico Superior en Gestión de Producción Agropecuaria</option>
                <option value="software">Técnico Superior en Desarrollo de Software</option>
                <option value="otro">Otro</option>
              </select>
            </div>

            <h5>*Presentar de manera física fotocopia de DNI (ambos lados) y fotocopia de título o constancia de título en tramite*</h5>

          <button type="submit" class="btn-submit">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="script.js"></script>
</body>
</php>