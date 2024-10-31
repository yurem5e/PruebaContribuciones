<?php
    include "alert.php";
    include "conn.php";
    if(isset($_POST['registrar'])){
        $checkEmail = $pdo->prepare("SELECT * FROM usuarios WHERE correo = :correo");
        $checkEmail->execute(['correo' => $_POST["correo"]]);
        if ($checkEmail->rowCount() > 0) {
            $error = "El correo ya está registrado.";
        }else{
            $correo = $_POST["correo"];
            $correokey = $_POST["contrasena"];
            $nombre = $_POST["nombre"];	
            $query = $pdo->prepare("INSERT INTO usuarios (correo, correokey, nombre, isAdmin) VALUES (:correo, :correokey, :nombre, :isAdmin)");
            $query->execute(['correo' => $correo, 'correokey' => $correokey, 'nombre' => $nombre, 'isAdmin' => false]);
            header('Location: index.php');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<h1>Registro</h1>
    <form method="POST" class="sesion">
        <?php if (isset($error)):?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <div class="grupo1">
            <input type="text" class="control" placeholder="Nombre de usuario" name="nombre" required>
        </div>
        <div class="grupo1">
            <input type="text" class="control" placeholder="Correo" name="correo" required>
        </div>
        <div class="grupo1">
            <input type="text" class="control" placeholder="Contraseña" required>
        </div>
        <div class="grupo1">
            <input type="password" class="control" placeholder="Contraseña" name="contrasena" required>
        </div>
        <div class="acciones">
            <button type="submit" name="registrar" class="btn btn-2">Registrar</button>
        </div>
    </form>
</body>
</html>