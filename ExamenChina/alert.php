<?php
    function agregarUser($user){
        return;
    }

    function seleccionarUser($user){
        include "conn.php";
        $query =  $pdo -> prepare("SELECT * FROM `usuarios` WHERE id = :id");
        $query -> execute(['id' => $user]);
        $usuario = $query->fetch();
        return $usuario;
    }

    function seleccionarAdmin($user){
        return;
    }
    
    function PasswordNoReply($correo){
        include "conn.php";
        $query =  $pdo -> prepare("SELECT * FROM `usuarios` WHERE correo = :correo");
        $query -> execute(['correo' => $correo]);
        $usuario = $query->fetch();
        if(!$usuario) return false;
        else return true;
    }
    
?>