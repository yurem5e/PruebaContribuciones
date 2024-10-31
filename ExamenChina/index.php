<?php
    include "alert.php";
    include "conn.php";
    if(isset($_POST["inicio"])){
        header('Location: productos.php');
        exit();
    }
    if(isset($_POST['registro'])){
        header('Location: registro.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
    <link rel="stylesheet" href="css.css">
    
</head>
<body>
<div class="login-container">
        <h2>Iniciar Sesión</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="inicio" class="btn">Iniciar Sesión</button>
        </form>
        <p>¿No tienes una cuenta? <a href="registro.php" class="btn">Regístrate aquí</a></p>
    </div>
</body>
</html>
