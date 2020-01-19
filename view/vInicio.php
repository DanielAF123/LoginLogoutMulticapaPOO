<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    if(isset($_REQUEST["cerrar"])){
        session_destroy();
        header('Location: Layout.php');
    }
    if(!isset($_SESSION[USUARIOA])){
    header('Location: Layout.php');
    }
?>
<!--<a href="detalle.php"><button>Detalle</button></a>-->
<!--<a href="editarPerfil.php"><button>Editar perfil</button></a>-->
<a href="Layout.php?cerrar=cerrar"><button>Salir</button></a><br>
<?php
    echo "Descripción usuario ".$_SESSION['datos'][0]."<br>";
    echo "Descripción usuario ".$_SESSION['datos'][1]."<br>";
    echo "Fecha ultima conexión ".$_SESSION['datos'][2]."<br>";
        echo "Numero de conexiones ".$_SESSION['datos'][3]."<br>";
    


