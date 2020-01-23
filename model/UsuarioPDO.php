<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'DBPDO.php';
class UsuarioPDO{
    
    public function validarUsuario($codUsuario, $password) {
        $contraseña= hash("sha256",$codUsuario.$password);
        $resultado=DBPDO::ejecutaConsulta("Select * FROM T01_Usuario WHERE T01_Password=?",[$contraseña]);
        if($resultado->rowCount()==1){
            $usuario=$resultado->fetchObject();
            $usuarioS=new Usuario($usuario->T01_CodUsuario, $usuario->T01_DescUsuario, $usuario->T01_Password, $usuario->T01_Perfil, $usuario->T01_FechaHoraUltimaConexion, $usuario->T01_NumAccesos);
            return $usuarioS;
        }else{
            return false;
        }
    }
    public function registrarUltimaConexion($usuario,$contador){
        $fechaActual=new DateTime();
        $valor=$fechaActual->format('Y-m-d H:i:s');
        DBPDO::ejecutaConsulta("UPDATE T01_Usuario SET T01_FechaHoraUltimaConexion=?,T01_NumAccesos=? WHERE T01_CodUsuario=?", [$valor,$contador+1,$usuario]);
    }
    public function altaUsuario($codUsuario,$desc,$password){
        $contraseña= hash("sha256",$codUsuario.$password);
       return DBPDO::ejecutaConsulta("INSERT INTO T01_Usuario (T01_CodUsuario, T01_DescUsuario, T01_Password) Values(?,?,?)",[$codUsuario,$desc,$contraseña]);
    }
    public function modificarContraseña($codUsuario,$password){
        $contraseña= hash("sha256",$codUsuario.$password);
        $sql="UPDATE T01_Usuario SET T01_Password=? WHERE T01_CodUsuario=?";
        return DBPDO::ejecutaConsulta($sql,[$contraseña,$codUsuario]);
    }
    public function modificarDesc($codUsuario,$desc){
        $sql="UPDATE T01_Usuario SET T01_DescUsuario=? WHERE T01_CodUsuario=?";
        return DBPDO::ejecutaConsulta($sql,[$desc,$codUsuario]);
    }
    public function borrarUsuario($codUsuario){
        $sql="DELETE FROM T01_Usuario WHERE T01_CodUsuario=?";
        return DBPDO::ejecutaConsulta($sql,[$codUsuario]);
    }
}
