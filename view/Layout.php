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
        if($_SESSION[USUARIOA] && $_SESSION["pagina"]=="inicio"){
            include_once './vInicio.php';
        }else{
        include_once './vlogin.php';
        }
    ?>
    </body>
</html>

