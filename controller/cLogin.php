<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    include './model/Usuario.php';
    include './config/ConfAplicación.php';
    $contraseña= hash("sha256",$_REQUEST["codUsuario"].$_REQUEST["password"]);
    $usuario=Usuario::validarUsuario($_REQUEST["codUsuario"], $contraseña);
    if(is_object($usuario)){
        session_start();
        var_dump($usuario);
        $usuarioS=serialize($usuario);
        $_SESSION[USUARIOA]=$usuarioS;
        $_SESSION["pagina"]="inicio";
        header("Location: Layout.php");
    }else{
        header("Location: Layout.php");
    }


