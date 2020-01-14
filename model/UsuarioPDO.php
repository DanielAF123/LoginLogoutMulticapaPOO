<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UsuarioPDO implements UsuarioDB{
    
    public function validarUsuario($codUsuario, $password) {
        $usuario=new Usuario($codUsuario, $descUsuario, $password, $perfil, $ultimaConexion, $contadorAccesos);
        
        
    }

}
