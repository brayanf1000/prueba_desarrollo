<?php
include("conexion/conexion.php");
$codigo = $_POST['codigo'];
$nombre_producto = $_POST['nombre_producto'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$id_categoria = $_POST['id_categoria'];

$result = mysqli_query($conn, "INSERT INTO productos (`id_producto`,`id_categoria`,`codigo`,`nombre_producto`,`precio`,`cantidad`) VALUES (NULL, '$id_categoria', '$codigo', '$nombre_producto', '$precio', '$cantidad')");
$filas = mysqli_fetch_array($result);
echo 1;

?>