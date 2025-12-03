<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "v";

// Crear conexión
$conn = new mysqli("localhost", "root", "", "v");
// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>