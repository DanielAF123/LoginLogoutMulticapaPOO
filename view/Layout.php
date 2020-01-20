<?php
session_start();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <?php
        include_once '../config/ConfAplicación.php';
        include_once '../model/Usuario.php';
        if(isset($_SESSION[USUARIOA])){
            if($_SESSION["pagina"]=="inicio"){
                include_once './vInicio.php';
            }
        }else{
            if(isset($_REQUEST["pagina"]) && $_REQUEST["pagina"]=="registro"){
                include_once './vRegistro.php';
            }else{
        include_once './vlogin.php';
            }
        }
    ?>
    </body>
</html>

