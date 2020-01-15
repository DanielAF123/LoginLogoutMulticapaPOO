<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    include './model/Usuario.php';
    include './config/ConfAplicación.php';
    if(Usuario::validarUsuario($_REQUEST["codUsuario"], $_REQUEST["password"])){
        //header("Location: Layout.php");
    }else{
        //header("Location: Layout.php");
    }


