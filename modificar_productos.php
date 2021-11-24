<?php
include("conexion/conexion.php");
$id_producto = $_POST['id_producto'];
$codigo = $_POST['codigo'];
$nombre_producto = $_POST['nombre_producto'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$id_categoria = $_POST['id_categoria'];

$result = mysqli_query($conn, "UPDATE productos SET codigo = '$codigo',nombre_producto = '$nombre_producto',precio = '$precio',cantidad = '$cantidad',id_categoria = '$id_categoria' WHERE id_producto = '$id_producto'");
$filas = mysqli_fetch_array($result);
echo 1;

?>