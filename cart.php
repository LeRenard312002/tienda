<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
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
        <h1>Carrito de Compras</h1>
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
    <main>
        <h2>Productos</h2>
        <div class="product-grid">
  </head>
        <?php
        include 'db.php';
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            if (!isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] = 0;
            }
            $_SESSION['cart'][$id]++;
        }
        ?>
        <h2>Productos en el Carrito</h2>
        <ul>
            <?php
            $total = 0;
            if (!empty($_SESSION['cart'])) {
                $ids = implode(',', array_keys($_SESSION['cart']));
                $sql = "SELECT * FROM productos WHERE id IN ($ids)";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    $quantity = $_SESSION['cart'][$row['id']];
                    $subtotal = $row['precio'] * $quantity;
                    $total += $subtotal;
                    echo "<li>{$row['nombre']} x $quantity - \${$subtotal}</li>";
                }
            } else {
                echo "El carrito está vacío.";
            }
            echo "<p>Total: \${$total}</p>";
            ?>
        </ul>
        <a href="checkout.php">Proceder al Pago</a>
    </main>
</body>
</html>