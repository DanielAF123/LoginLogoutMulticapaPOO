<?php
include_once '../model/Usuario.php';
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
$usuario=unserialize($_SESSION[USUARIOA]);
    echo "Descripción usuario ".$usuario->getCodUsuario()."<br>";
    echo "Descripción usuario ".$usuario->getDescUsuario()."<br>";
    echo "Fecha ultima conexión ".$usuario->getUltimaConexion()."<br>";
    if($usuario->getContadorAccesos()==1){
        echo "Primera conexion"."<br>";
    }else{
        echo "Numero de conexiones ".$usuario->getContadorAccesos()."<br>";
    }
    echo '';


