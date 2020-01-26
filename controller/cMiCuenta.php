<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Comprueba que existe el usuario
if(!isset($_SESSION[USUARIOA])){
    header('Location: ./view/Layout.php');
}
//Comprueba que el usuario quiere editar su descripcion o cambiar la contraseña
if($_REQUEST["pagina"]=="editar"){
    //comprueba que hemos presionado enviar, realiza sus validaciones
if($_REQUEST['Enviar']){
    $entrada=true;
    $aErrores=[];
    $aErrores['desc']= validacionFormularios::comprobarNoVacio($_REQUEST['desc']);
    $aErrores['desc']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['desc'], 15, 1, 1);
}else{
    $entrada=false;
}
}else{
    //comprueba que hemos presionado enviar, realiza sus validaciones
if($_REQUEST["CambiarContraseña"]){
    $entrada=true;
    $aErrores=[];
    $aErrores['contraA']= validacionFormularios::comprobarNoVacio($_REQUEST['contraA']);
    $aErrores['contra1']= validacionFormularios::comprobarNoVacio($_REQUEST['contra1']);
    $aErrores['contra2']= validacionFormularios::comprobarNoVacio($_REQUEST['contra2']);
    if(hash("sha256", $_SESSION[USUARIOA]->getCodUsuario().$_REQUEST["contraA"])!==$_SESSION[USUARIOA]->getPassword()){
        $entrada=false;
        echo 'false A';
    }
    if($_REQUEST["contra1"]!==$_REQUEST["contra2"]){
        $entrada=false;
        echo 'false C';
    }
}else{
    $entrada=false;
}
}
//Ejecuta el query con los datos validados y cambia los datos en la session(Sobre la descripcion)
if($_REQUEST["pagina"]=="editar"){    
    if($entrada){
        if(UsuarioPDO::modificarDesc($_REQUEST["codUsuario2"],$_REQUEST["desc"])->rowCount()==1){
            $usuario=$_SESSION[USUARIOA];
            $usuario->setDescUsuario($_REQUEST["desc"]);
            $_SESSION['datos'][1]=$usuario->getDescUsuario();
            $_SESSION[USUARIOA]=$usuario;
        }
    header("Location: ./view/Layout.php?pagina=editar");
}else{
    header("Location: ./view/Layout.php?pagina=editar");
}   
}
if($_REQUEST["pagina"]=="contra"){    
    //Ejecuta el query con los datos validados y cambia los datos en la session(Sobre la contraseña)
if($entrada){
    if(UsuarioPDO::modificarContraseña($_REQUEST["codUsuario2"],$_REQUEST["contra1"])->rowCount()==1){
        $_SESSION[USUARIOA]->setPassword($_REQUEST["contra1"]);
        echo $_SESSION[USUARIOA]->getPassword();
    }
    header("Location: ./view/Layout.php?pagina=editar");
}else{
    header("Location: ./view/Layout.php?pagina=editar");
}
    
}
