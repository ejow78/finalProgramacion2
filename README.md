# IES La Cocha

Este proyecto es el sitio web oficial del Instituto de Enseñanza Superior (IES) La Cocha, con un panel de administración para gestionar inscripciones, mensajes de contacto y el calendario de mesas de exámenes.

-----

## Arquitectura y Tecnologías

El proyecto sigue un patrón de diseño **Modelo-Vista-Controlador (MVC)** para la administración, mientras que la parte pública utiliza scripts PHP convencionales para el *routing* y el procesamiento de formularios.

### Tecnologías Clave

  * **Backend:** **PHP** (utiliza Programación Orientada a Objetos para la capa de lógica, sin herencia pero con fuerte **encapsulamiento** mediante propiedades `private` en los Modelos).
  * **Base de Datos:** **MySQL** (Conexión gestionada por la extensión MySQLi, con el nombre de base de datos `ies2`).
      * **Persistencia SQL:** Se utiliza para Usuarios, Preinscripciones y Mensajes de Contacto.
      * **Persistencia JSON:** La información de las mesas de exámenes se almacena en el archivo `admin/data/examenes.json` para facilitar la gestión dinámica y la visualización pública.
  * **Frontend:** HTML5, CSS3 y **JavaScript** (utilizado para el *carousel* y la generación dinámica de filas en el formulario de exámenes).

### Flujo de Control (MVC)

El flujo de control en la carpeta `admin` es gestionado por el archivo central `admin/index.php` (Router Frontal):

1.  **Entrada:** `admin/index.php` recibe la acción (`$_GET['accion']`).
2.  **Controller:** Se instancia y ejecuta el método correspondiente en el Controller (ej. `InscripcionController::listar()` o `ExamenController::guardar()`).
3.  **Model:** El Controller invoca al Model para manipular datos (MySQL o JSON).
4.  **View:** El Controller incluye la vista (`.php`) para renderizar el HTML final.

-----

## Funcionalidades Clave

### Sitio Público

  * **Oferta Académica:** Listado y páginas detalladas para Profesorados (Historia, Matemáticas) y Tecnicaturas (Software, Agroindustria, Agropecuaria).
  * **Preinscripción:** Captura de datos personales y carrera de interés, guardando la información en la tabla `preinscripciones`.
  * **Contacto:** Formulario que registra consultas en la tabla `mensajes_contacto`.
  * **Fechas de Exámenes:** Publicación del calendario de mesas de exámenes, leyendo la estructura de turnos desde el archivo JSON.

### Panel de Administración (`/admin/`)

  * **Autenticación:** Sistema de Login y Registro de usuarios con validación de contraseñas *hasheadas* y uso de CAPTCHA.
  * **Gestión de Inscripciones:** Permite listar, editar y eliminar los registros de preinscripción.
  * **Gestión de Mensajes:** Permite listar y eliminar los mensajes recibidos a través del formulario de contacto.
  * **Gestión de Exámenes:** Un formulario dinámico en JavaScript permite añadir múltiples "Llamados" (turnos) y múltiples materias a cada llamado, serializando la estructura en el archivo `examenes.json`.
  * **Gestión de Usuarios (Admin):** Muestra el listado de usuarios y permite registrar nuevos usuarios con rol `admin` o `comun`.

-----

## Instalación y Configuración

### Configurar la Base de Datos:
    * Abrí `phpMyAdmin` (usualmente `http://localhost/phpmyadmin`).
    * Crea una nueva base de datos.
    * Ejecuta las siguientes consultas SQL para crear las tablas:

    ```sql
    -- Tabla para las preinscripciones
    CREATE TABLE `preinscripciones` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nombre` varchar(100) NOT NULL,
      `apellido` varchar(100) NOT NULL,
      `dni` varchar(10) NOT NULL,
      `genero` varchar(20) NOT NULL,
      `localidad` varchar(100) NOT NULL,
      `direccion` varchar(255) NOT NULL,
      `email` varchar(100) NOT NULL,
      `telefono` varchar(20) NOT NULL,
      `carrera` varchar(100) NOT NULL,
      `creadoa` timestamp NOT NULL DEFAULT current_timestamp(),
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    -- Tabla para los mensajes de contacto
    CREATE TABLE `mensajes_contacto` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nombre` varchar(100) NOT NULL,
      `apellido` varchar(100) NOT NULL,
      `email` varchar(100) NOT NULL,
      `telefono` varchar(50) DEFAULT NULL,
      `interes` varchar(100) DEFAULT NULL,
      `mensaje` text NOT NULL,
      `creadoa` timestamp NOT NULL DEFAULT current_timestamp(),
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    -- Tabla para los usuarios administradores
    CREATE TABLE `usuarios` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `usuario` varchar(50) NOT NULL,
      `password` varchar(255) NOT NULL,
      `rol` varchar(20) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ```

### Conexión a la Base de Datos

Edita el archivo **`includes/conect.php`** con tus credenciales de MySQL:

```php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "ies2";
```


**Autor:** Edgar Javier Ortiz
