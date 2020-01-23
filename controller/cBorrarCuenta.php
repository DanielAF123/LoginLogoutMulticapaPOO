<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_SESSION[USUARIOA])){
   header('Location: ./view/Layout.php');
}
if(isset($_REQUEST["Borrar"])){
    if(UsuarioPDO::borrarUsuario($_SESSION[USUARIOA]->getCodUsuario())->rowCount()==1){
        echo "correcto";
    }else{
        echo 'fallo';
    }
    header("Location: ../index?pagina=cerrar");
}else{
    header("Location: ./view/Layout.php?pagina=editar");
}
