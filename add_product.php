<?php
session_start();
include 'db.php';

// Verifica si el usuario ha iniciado sesión y si es un administrador (esto es solo un ejemplo, debes implementar tu propia lógica de verificación de administrador).
if (!isset($_SESSION['user_id']) || !$_SESSION['is_admin']) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen']; // En un entorno real, deberías subir y almacenar la imagen correctamente

    $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES ('$nombre', '$descripcion', '$precio', '$imagen')";

    if ($conn->query($sql) === TRUE) {
        echo "Producto agregado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Agregar Producto</h1>
        <div class="dropdown">
  <button>Menu de la tienda virtual</button>
  <div class="dropdown-content">
        <nav>
            <a href="index.php">Inicio</a>
            <a href="cart.php">Carrito</a>
            <a href="add_product.php">Agregar Producto</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php">Cerrar Sesión</a>
            <?php else: ?>
                <a href="login.php">Iniciar Sesión</a>
                <a href="register.php">Crear Cuenta</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>
        <form action="add_product.php" method="post">
            <label for="nombre">Nombre del Producto:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
            <label for="precio">Precio:</label>
            <input type="number" step="0.01" id="precio" name="precio" required>
            <label for="imagen">URL de la Imagen:</label>
            <input type="text" id="imagen" name="imagen" required>
            <button type="submit">Agregar Producto</button>
        </form>
    </main>
</body>
</html>