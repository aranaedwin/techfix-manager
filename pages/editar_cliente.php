<?php
// Conectamos a la base de datos
require_once '../backend/config/conexion.php';

//Verificamos que venga un id en la URL, si alguien entra sin id lo bloqueamos
if(!isset($_GET['id'])){
    die("Error crítico: No se seleccionó ningún cliente para editar.");
}

$id_cliente = $_GET['id'];

try{
    //Buscamos los datos actuales de ese cliente específico
    $sql = "SELECT * FROM clientes WHERE id_cliente = :id AND estado = 1";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([':id' => $id_cliente]);

    //fetch() saca solo un registro ( fetchAll() saca todos los registros)
    $cliente = $stmt->fetch();

    //Si el cliente no existe o fue elimindo
    if(!$cliente){
        die("Error: El cliente no existe o ha sido eliminado.");
    }
}catch(PDOExcepion $e){
    die("Error en la base de datos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente - Michell Repair</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>
    <div class="tarjeta-formulario">
        <h2>Editar Datos</h2>

        <form action="../backend/controllers/actualizar_cliente.php" method="POST">
            <input type="hidden" name="id_cliente" value="<?php echo htmlspecialchars($cliente['id_cliente']); ?>">

            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($cliente['nombre']); ?>" required>

            <label>Apellido:</label>
            <input type="text" name="apellido" value="<?php echo htmlspecialchars($cliente['apellido']); ?>" required>

            <label>Teléfono:</label>
            <input type="text" name="telefono" value="<?php echo htmlspecialchars($cliente['telefono']); ?>" required>

            <label>Correo:</label>
            <input type="email" name="correo" value="<?php echo htmlspecialchars($cliente['correo']); ?>">

            <label>Dirección:</label>
            <input type="text" name="direccion" value="<?php echo htmlspecialchars($cliente['direccion']); ?>">

            <button type="submit">Actualizar Cliente</button>
            <a href="lista_clientes.php" style="display:block; text-align:center; margin-top:15px; color:#666; text-decoration:none;">Cancelar</a>

        </form>
    </div>
</body>
</html>