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
include_once './core/validacionFormularios.php';
if(isset($_SESSION[USUARIOA])){
    if(isset($_REQUEST["pagina"])){
    if($_REQUEST['pagina']=="cerrar"){
        include_once './controller/cCerrarSesion.php';
    }
if($_REQUEST["pagina"]=='inicio'){
    include_once './controller/cInicio.php';
}
if($_REQUEST["pagina"]=="editar"){
    include_once './controller/cMiCuenta.php?pagina=editar';
}
if($_REQUEST["pagina"]=="contra"){
    include_once './controller/cMiCuenta.php?pagina=contra';
}
    }
}else{
    if(isset($_REQUEST["pagina"]) && $_REQUEST["pagina"]=="registro"){
        include_once './controller/cRegistro.php';
    }else{
    include_once './controller/cLogin.php';
    }
    
}

