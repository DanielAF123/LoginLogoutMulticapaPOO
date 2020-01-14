<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require '../model/Usuario.php';
    require '../config/ConfAplicación.php';
    echo $_REQUEST['codUsuario'];
    if(Usuario::validarUsuario($_REQUEST["codUsuario"], $_REQUEST["password"])){
        $_SESSION[USUARIOA]=new Usuario($codUsuario, $descUsuario, $password, $perfil, $ultimaConexion, $contadorAccesos);
        //header("Location: Layout.php");
    }else{
        header("Location: Layout.php");
    }


