<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require '../config/ConfAplicación.php';
    require '../core/validacionFormularios.php';
    if(isset($_SESSION[USUARIOA])){
        Header("Location: ../index.php");
    }
     setlocale(LC_TIME, 'es_ES.UTF-8');
     date_default_timezone_set('Europe/Madrid'); 
    $entradaOK=true;
    $aErrores=[];
    if(isset($_REQUEST['idioma'])){
        setcookie('idioma', $_REQUEST['idioma'], time()+120);
        header("Location: vlogin.php");
    }
    if(isset($_REQUEST['Aceptar'])){
        $aErrores['codUsuario']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['codUsuario'], 64, 4, 1);
        $aErrores['password']= validacionFormularios::comprobarNoVacio($_REQUEST['password']);
    }else{
        $entradaOK=false;
    }
    if($entradaOK){
        $contraseña=hash("sha256",$_REQUEST["codUsuario"].$_REQUEST["password"]);
        header("Location: ../index.php?codUsuario=".$_REQUEST["codUsuario"]."&password=".$contraseña);
}else{
    ?>
    <form name="formulario" action=<?php echo $_SERVER['PHP_SELF'];?> method="POST" enctype="multipart/form-data">
        <label for="usuario">Usuario</label>
        <input type="text" name="codUsuario" id="usuario"><br>
        <label for="contrasena">Contrasena</label>
        <input type="password" name="password" id="contrasena">
        <input type="submit" value="Aceptar" name="Aceptar">
    </form>
<a href="registro.php"><button>Registrate</button></a>
<a href="../../index.html"><button>Salir</button></a><br>
<input type="button" value="Español" onclick="location='login.php?idioma=español'">
    <input type="button" value="Ingles" onclick="location='login.php?idioma=ingles'">
<?php
            foreach ($aErrores as $key => $value) {
                echo "Error en ".$key." ".$value;
            }
}


