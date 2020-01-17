<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    if(!isset($_SESSION[USUARIOA])){
    header('Location: view/Layout.php');
    }
    if(!isset($_SESSION[USUARIOA])){
        $usuario=$_SESSION[USUARIOA];
         if($usuario->getContadorAccesos()==1){
        $contador="Primera conexion"."<br>";
        }else{
        $contador=$usuario->getContadorAccesos();
        }
        $_SESSION['datos']=[$usuario->getCodUsuario(),$usuario->getDescUsuario(),$usuario->getUltimaConexion(),$contador];
    header('Location: view/Layout.php');
    }
    
