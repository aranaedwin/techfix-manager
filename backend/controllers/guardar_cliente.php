<?php

// 1. Subimos un nivel para entrar a 'config'
require_once '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];

    try {
        $sql = "INSERT INTO clientes (nombre, apellido, telefono, correo, direccion) 
                VALUES (:nombre, :apellido, :telefono, :correo, :direccion)";
        
        $stmt = $conexion->prepare($sql);
        $stmt->execute([
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':telefono' => $telefono,
            ':correo' => $correo,
            ':direccion' => $direccion
        ]);

        // Mensaje con estilo Michell Repair
        echo "<div style='font-family:sans-serif; text-align:center; padding:50px; background:#001b3a; color:white; height:100vh;'>";
        echo "<h1>¡Cliente Registrado!</h1>";
        echo "<p>El cliente $nombre $apellido ha sido ingresado al sistema.</p>";
        echo "<br><a href='../../pages/lista_clientes.php' style='color:#ffcc00; text-decoration:none; font-weight:bold;'>Volver</a>";
        echo "</div>";

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>