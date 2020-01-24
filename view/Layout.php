<?php
session_start();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="../webroot/css/css.css">
    </head>
    <body>
        <?php
        include_once '../config/ConfAplicación.php';
        include_once '../model/Usuario.php';
        if(isset($_SESSION[USUARIOA])){
            if(isset($_REQUEST["pagina"])){
            if($_REQUEST["pagina"]=="inicio"){
                include_once './vInicio.php';
            }
            if($_REQUEST["pagina"]=="editar"){
                include_once './vMiCuenta.php';
            }
            if($_REQUEST["pagina"]=="borrarC"){
                include_once './vBorrarCuenta.php';
            }
            }
        }else{
            if(isset($_REQUEST["pagina"])){
            if($_REQUEST["pagina"]=="registro"){
                include_once './vRegistro.php';
            }
            }else{
            include_once './vlogin.php';
            }
        }
    ?>
        <footer> 
            <a href="../doc/Tema2.pdf" target="_black">Herramientas utilizadas</a>
            <a href="../../../../../">Daniel Alcala Fernandez</a><a target="_blank" href="https://github.com/DanielAF123/LoginLogoutMulticapaPOO">GitLab</a>
        </footer>
    </body>
</html>

