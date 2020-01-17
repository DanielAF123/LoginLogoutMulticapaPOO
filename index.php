<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once './config/ConfAplicación.php';
include_once './model/Usuario.php';
include_once './model/UsuarioPDO.php';
include_once './config/ConfDB.php';
if(isset($_SESSION[USUARIOA]) && $_SESSION["pagina"]==inicio){
    include_once './controller/cInicio.php';
}
if(!isset($_SESSION[USUARIOA])){
    include_once './controller/cLogin.php';
}

