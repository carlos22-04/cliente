<?php
/**
*@esta funcion es la que realiza el programa para conectarse con la base de datos
*@si llega a ocurrir un error manda un mensaje de conexion fallida
*/
    $conexion = new mysqli("localhost","root","","calidad");
    if(mysqli_connect_errno()){
        echo 'Conexion Fallida : ', mysqli_connect_error();
        exit();
    }
?>
