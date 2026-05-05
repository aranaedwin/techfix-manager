<?php
// Conectamos a la base de datos
require_once '../backend/config/conexion.php';

try {
    //Preparamos la consulta (Solo clientes activos, ordenados del más reciente al más antiguo)
    $sql = "SELECT id_cliente, nombre, apellido, telefono, correo FROM clientes WHERE estado = 1 ORDER BY id_cliente DESC";
    
    // Usamos query() porque no estamos enviando variables externas (es una consulta estática)
    $stmt = $conexion->query($sql);
    
    //fetchAll() saca TODOS los registros y los guarda en un arreglo llamado $clientes
    $clientes = $stmt->fetchAll();

} catch (PDOException $e) {
    die("Error al consultar la base de datos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes - Michell Repair</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>

    <div class="contenedor-tabla">
        <h2>Directorio de Clientes</h2>
        
        <div style="margin-bottom: 15px;">
            <a href="clientes.php" style="text-decoration: none; background-color: #ffcc00; color: #001b3a; padding: 10px 15px; border-radius: 6px; font-weight: bold;">+ Nuevo Cliente</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // 4. Bucle foreach: Por cada cliente en nuestra base de datos, creamos una fila (tr)
                foreach ($clientes as $cliente) { 
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cliente['id_cliente']); ?></td>
                        <td><?php echo htmlspecialchars($cliente['nombre'] . ' ' . $cliente['apellido']); ?></td>
                        <td><?php echo htmlspecialchars($cliente['telefono']); ?></td>
                        <td><?php echo htmlspecialchars($cliente['correo'] ? $cliente['correo'] : 'N/A'); ?></td>
                        <td>
                            <a href="#" style="color: #001b3a; font-weight: bold;">Editar</a> | 
                            <a href="#" style="color: red; font-weight: bold;">Eliminar</a>
                        </td>
                    </tr>
                <?php 
                } 
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>