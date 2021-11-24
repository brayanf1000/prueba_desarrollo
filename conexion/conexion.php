<?php    
    $nombreServidor = "localhost";
    $nombreUsuario = "root";
    $passwordBaseDeDatos = "";
    $nombreBaseDeDatos = "prueba_desarrollo";
    
    // Crear conexión con la base de datos.
    $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
    
    // Validar la conexión de base de datos.
    if ($conn ->connect_error) 
    {
        die("Connection failed: " . $conn ->connect_error);
    }
?>