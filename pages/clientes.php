<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

    <div class="tarjeta-formulario">
        <h2>Nuevo Cliente</h2>
        
        <form action="guardar_cliente.php" method="POST">
            
            <div class="grupo-input">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="grupo-input">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>

            <div class="grupo-input">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required>
            </div>

            <div class="grupo-input">
                <label for="correo">Correo Electrónico (Opcional):</label>
                <input type="email" id="correo" name="correo">
            </div>

            <div class="grupo-input">
                <label for="direccion">Dirección (Opcional):</label>
                <input type="text" id="direccion" name="direccion">
            </div>

            <button type="submit">Guardar Cliente</button>
            
        </form>
    </div>

</body>
</html>