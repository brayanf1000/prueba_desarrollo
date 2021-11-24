<?php

    include("conexion/conexion.php");

    $id_producto = $_POST["id_producto"];

    $result = mysqli_query($conn, "DELETE FROM `productos` WHERE `id_producto` = '$id_producto'");
    $filas = mysqli_fetch_array($result);

    echo 1;
 
    
?>
