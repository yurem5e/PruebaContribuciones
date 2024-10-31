<?php
session_start();
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar_producto'])) {
    $nombre_producto = $_POST['nombre'];
    $precio = $_POST['valor'];

    $sql = "INSERT INTO productos (nombre, descripcion, valor) VALUES (?, ?, ?)";
    $stmt->bind_param("sdi", $nombre_producto, $precio);

    if ($stmt->execute()) {
        echo "Producto agregado correctamente.";
    } else {
        echo "Error al agregar el producto.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>compras</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<div class="login-container">
        <h1>compras</h1>
        <form method="POST" action="">
            <input type="text" placeholder="Nombre De Producto" name="nombre" required ><br>
            
            <input type="number" step="0.01" placeholder="Precio" name="valor" required><br>

            <button type="submit" name="agregar_producto" class="btn">Comprar</button>
        </form>
    </div>
</body>
</html>
