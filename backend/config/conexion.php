<?php
//Definimos las credenciales de la base de datos
$host = 'Localhost';
$dbname = 'techfix_manager';
$usuario = 'root'; //Usuario por defecto en XAMPP
$password = ''; //En XAMPP, la contraseña por defecto esta vacía

try {
    //Construimos el DNS (Data Source Name) - La "direccion" a la base de datos
    $dns = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    //Configuramos las opciones para PDO (buenas practicas 2026)
    $opciones = [
        //Obligamos a PDO a mostrar los errores reales si algo falla (crucial para debuggear)
        PDO :: ATTR_ERRMODE => PDO :: ERRMODE_EXCEPTION,
        //Le decimos que nos devuelva los datos como un arreglo con los nombre de las columnas
        PDO :: ATTR_DEFAULT_FETCH_MODE => PDO :: FETCH_ASSOC,
    ];

    //Creamos la conexión real (Instaciamos el objeto PDO)
    $conexion = new PDO($dns, $usuario, $password, $opciones);

    //Solo para probar que funciona. En producción, borramos o comentaremos esta linea
    //echo "¡Conexión exitosa a la base de datos de Techfix!";

}catch(PDOException $e){
    // Si algo sale mal (ej. el servidor está apagado), atrapamos el error aqui y evitamos que el sistema colapse. En producción, podríamos loguear este error en un archivo o mostrar un mensaje amigable al usuario.
    die("Error crítico de conexión: " . $e->getMessage());
}
?>