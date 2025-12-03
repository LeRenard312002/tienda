<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
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
        <h1>Pago</h1>
        <div class="dropdown">
  <button>Menu de la tienda virtual</button>
  <div class="dropdown-content">
        <nav>
            <a href="index.php">Inicio</a>
            <a href="productos.html">Carrito</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php">Cerrar Sesión</a>
            <?php else: ?>
                <a href="login.php">Iniciar Sesión</a>
            <a href="register.php">Crear Cuenta</a>
        <?php endif; ?>
    </nav>
</header>
<main>
    <h2>Detalles del Pago</h2>
    <!-- Simulación de formulario de pago -->
    <form action="checkout.php" method="post">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <label for="address">Dirección:</label>
        <input type="text" id="address" name="address" required>
        <button type="submit">Realizar Pago</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'db.php';
        $name = $_POST['name'];
        $address = $_POST['address'];
        $total = 0;

        // Crear pedido
        $sql = "INSERT INTO pedidos (usuario_id, total) VALUES ({$_SESSION['user_id']}, $total)";
        if ($conn->query($sql) === TRUE) {
            $pedido_id = $conn->insert_id;

            // Insertar detalles del pedido
            foreach ($_SESSION['cart'] as $id => $quantity) {
                $sql = "SELECT * FROM productos WHERE id = $id";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $price = $row['precio'];
                $total += $price * $quantity;

                $sql = "INSERT INTO detalles_pedido (pedido_id, producto_id, cantidad, precio) 
                        VALUES ($pedido_id, $id, $quantity, $price)";
                $conn->query($sql);
            }

            // Actualizar total del pedido
            $sql = "UPDATE pedidos SET total = $total WHERE id = $pedido_id";
            $conn->query($sql);

            echo "<p>Gracias por su compra, " . htmlspecialchars($name) . "!</p>";
            session_destroy();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</main>
</body>
</html>