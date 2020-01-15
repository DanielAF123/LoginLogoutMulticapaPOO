<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'config/ConfDB.php';
class DBPDO{
    public static function ejecutaConsulta($sql,$parametros){
        try{
    $miDB= new PDO(URL, USUARIO, CONTRASEÑA);
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (Exception $exp){
            echo $exp->getMessage();
            echo "ERROR";
        }
    try{
        $consulta=$miDB->prepare($sql);
        foreach ($parametros as $key => $value) {
        $consulta->bindValue($key+1, $value);
        }
        $consulta->execute();
    } catch (PDOException $exp) {
        echo $exp->getMessage();
        echo $exp->getCode();
    }
     return $consulta;
}
}
