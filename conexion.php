<?php
    $conexion = new mysqli("localhost","root","","proyecto");
    if(mysqli_connect_errno()){
        echo 'Conexion Fallida : ', mysqli_connect_error();
        exit();
    }
?>
