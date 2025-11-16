<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "ies2";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifico conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
