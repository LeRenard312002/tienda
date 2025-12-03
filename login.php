<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
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
        <h1>Iniciar Sesión</h1>
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
        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include 'db.php';
            $email = $_POST['email'];
            $contrasena = $_POST['contrasena'];

            $sql = "SELECT * FROM usuarios WHERE email = '$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($contrasena, $row['contrasena'])) {
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_nombre'] = $row['nombre'];
                    $_SESSION['is_admin'] = $row['is_admin']; // Almacena si el usuario es administrador
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Contraseña incorrecta.";
                }
            } else {
                echo "No se encontró una cuenta con ese email.";
            }

            $conn->close();
        }
        ?>
    </main>
</body>
</html>