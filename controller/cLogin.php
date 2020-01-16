<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
if(isset($_SESSION[USUARIOA])){
    $_SESSION["pagina"]="inicio";
    header('Location: ./view/Layout.php');
}
if(isset($_REQUEST["codUsuario"]) && isset($_REQUEST["password"])){
    $contraseña= hash("sha256",$_REQUEST["codUsuario"].$_REQUEST["password"]);
    $usuario=Usuario::validarUsuario($_REQUEST["codUsuario"], $contraseña);
    if(is_object($usuario)){
        var_dump($usuario);
        $usuarioS=serialize($usuario);
        $_SESSION[USUARIOA]=$usuarioS;
        $_SESSION["pagina"]="inicio";
        header("Location: ./view/Layout.php");
    }else{
        header("Location: ./view/Layout.php");
}
}else{
    header("Location: ./view/Layout.php");
}


