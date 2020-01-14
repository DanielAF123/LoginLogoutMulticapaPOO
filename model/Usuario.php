<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'UsuarioPDO.php';
class Usuario{
    private $codUsuario;
    private $descUsuario;
    private $password;
    private $perfil;
    private $ultimaConexion;
    private $contadorAccesos;
    
    public function __construct($codUsuario,$descUsuario,$password,$perfil,$ultimaConexion,$contadorAccesos) {
        $this->codUsuario=$codUsuario;
        $this->descUsuario=$descUsuario;
        $this->password=$password;
        $this->perfil=$perfil;
        $this->ultimaConexion=$ultimaConexion;
        $this->contadorAccesos=$contadorAccesos;
    }
    public static function validarUsuario($codUsuario,$password){
        if(UsuarioPDO::validarUsuario($codUsuario,$password)){
            return true;
        }else{
            return false;
        }
    }
}
