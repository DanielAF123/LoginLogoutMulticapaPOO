<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(!isset($_SESSION[USUARIOA])){
    header('Location: ./view/Layout.php');
}
if($_REQUEST['Enviar']){
    $entrada=true;
    $aErrores=[];
    $aErrores['desc']= validacionFormularios::comprobarNoVacio($_REQUEST['desc']);
    $aErrores['desc']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['desc'], 15, 1, 1);
}else{
    $entrada=false;
}
if($_REQUEST["Cambiar Contraseña"]){
    $entrada=true;
    $aErrores=[];
    $aErrores['contra1']= validacionFormularios::comprobarNoVacio($_REQUEST['contra1']);
    $aErrores['contra2']= validacionFormularios::comprobarNoVacio($_REQUEST['contra2']);
    if(!$_REQUEST["contra1"]===$_REQUEST["contra2"]){
        $entrada=false;
    }
}else{
    $entrada=false;
}
if($_REQUEST["pagina"]="editar"){    
    if($entrada){
    echo UsuarioPDO::modificarDesc($_REQUEST["codUsuario2"],$_REQUEST["desc"]);
    
    //header("Location=Layout.php?pagina=editar");
}else{
    header("Location= Layout.php?pagina=editar");
}   
}
if($_REQUEST["pagina"]="contra"){    
if($entrada){
    echo UsuarioPDO::modificarContraseña($_REQUEST["codUsuario2"],$_REQUEST["contra1"]);
    //header("Location=Layout.php?pagina=editar");
}else{
    header("Location= Layout.php?pagina=editar");
}
    
}
