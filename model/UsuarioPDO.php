<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../config/ConfAplicación.php';
include 'DBPDO.php';
class UsuarioPDO{
    
    public function validarUsuario($codUsuario, $password) {
        $resultado=DBPDO::ejecutaConsulta("Select * FROM Usuario WHERE Password=?",[$password]);
        if($resultado->rowCount()==1){
            $usuario=$resultado->fetchObject();
            session_start();
            $_SESSION[USUARIOA]=new Usuario($usuario->codUsuario, $usuario->descUsuario, $usuario->password, $usuario->perfil, $usuario->ultimaConexion, $usuario->contadorAccesos);
            $sql="UPDATE Usuario SET FechaHoraUltimaConexion=?,NumConexiones=? WHERE CodUsuario=?";
            $parametros=[$usuario->ultimaConexion,$usuario->contadorAccesos,$usuario->codUsuario];
            DBPDO::ejecutaConsulta($sql, $parametros);
            if(!isset($_COOKIE['idioma'])){
                setcookie('idioma', "español", time()+120);
            }
            return true;
        }else{
            return false;
        }
    }

}
