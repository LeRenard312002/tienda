<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>

.dropdown {
  display: inline-block;
  position: relative;
}
.dropdown-content {
  display: none;
  position: absolute;
  width: 100%;
  overflow: 50%;
  box-shadow: 0px 10px 10px 0px rgba(219, 189, 52, 0.4);
}
.dropdown:hover .dropdown-content {
  display: block;
}
.dropdown-content a {
  display: block;
  color: #tftyf;
  padding: 15px;
  text-decoration: none;
}
.dropdown-content a:hover {
  color: #rrrr;
  background-color: #2222;
}


        .my-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .my-button:hover {
            background-color: #45a049;
        }
        
        .my-button:active {
            background-color: #3e8e41;
        }

        p {
  font-family: "Trebuchet MS", Arial, sans-serif;
}

img { float: left;
     width: 260px; 
     height: 260px; 
     margin-right: 5em;
     }

     body {
        padding: 3% 0 3% 0; 
    background-image: url("fondo.jpg");
    width: 100%;
    height: 100%;
    background-position: center center;
    background-repeat: no-repeat;

}

    </style>

<body>
    <header>
        <h1>Crear Cuenta</h1>

        <div class="dropdown">
  <button>Menu de la tienda virtual</button>
  <div class="dropdown-content">

        <nav>
            <a href="index.php">Inicio</a>
            <a href="productos.html">Carrito</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php if ($_SESSION['is_admin']): ?>
                    <a href="add_product.php">Agregar Producto</a>
                <?php endif; ?>
                <a href="logout.php">Cerrar Sesión</a>
            <?php else: ?>
                <a href="login.php">Iniciar Sesión</a>
                <a href="register.php">Crear Cuenta</a>
            <?php endif; ?>
        </nav>

    </header>
    <main>
        <form action="register.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>
            <button type="submit">Registrar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include 'db.php';
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES ('$nombre', '$email', '$contrasena')";

            if ($conn->query($sql) === TRUE) {
                echo "Registro exitoso. <a href='login.php'>Iniciar Sesión</a>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </main>
</body>
</html>