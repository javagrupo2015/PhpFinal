<?php

function conectar(){
    $user = "root"; 
    $pass = ""; 
    $server="localhost"; 
    $db = "calculonomina"; 
    $con = mysqli_connect($server, $user, $pass, $db ) or die ("Error en la conexion"); 
    return $con; 
}

?>
