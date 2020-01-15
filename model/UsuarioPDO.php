<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'DBPDO.php';
class UsuarioPDO{
    
    public function validarUsuario($codUsuario, $password) {
        $resultado=DBPDO::ejecutaConsulta("Select * FROM T01_Usuario WHERE T01_Password=?",[$password]);
        if($resultado->rowCount()==1){
            $usuario=$resultado->fetchObject();
            $usuarioS=new Usuario($usuario->T01_CodUsuario, $usuario->T01_DescUsuario, $usuario->T01_Password, $usuario->T01_Perfil, $usuario->T01_FechaHoraUltimaConexion, $usuario->T01_NumAccesos);
            return $usuarioS;
        }else{
            return false;
        }
    }

}
