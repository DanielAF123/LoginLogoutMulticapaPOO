<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Comprueba que existe el usuario
if(isset($_SESSION[USUARIOA])){
   header('Location: ./view/Layout.php');
}
//Si hemos presionado borrar
if(isset($_REQUEST["Borrar"])){
    //Realiza un query para borrar el usuario
    UsuarioPDO::borrarUsuario($_SESSION[USUARIOA]->getCodUsuario());
    header("Location: ./index.php?pagina=cerrar");
}else{
    header("Location: ./view/Layout.php?pagina=editar");
}
