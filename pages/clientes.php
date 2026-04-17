<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Cliente - Michell Repair</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>

    <div class="tarjeta-formulario">
        <h2>Michell Repair</h2>
        <p style="text-align:center; font-size: 12px; color: #666;">Registro de Clientes</p>
        
        <form action="../backend/controllers/guardar_cliente.php" method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Apellido:</label>
            <input type="text" name="apellido" required>

            <label>Teléfono:</label>
            <input type="text" name="telefono" required>

            <label>Correo:</label>
            <input type="email" name="correo">

            <label>Dirección:</label>
            <input type="text" name="direccion">

            <button type="submit">Guardar Cliente</button>
        </form>
    </div>

</body>
</html>