<?php
//llamamos a nuestra conexión
require_once '../config/conexion.php';

//Verificamos que los datos vengan por el método POST.
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Atrapamos todos los datos incluyendo el id oculto
    $id_cliente = $_POST['id_cliente'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];

    try{
        //Preparamos la instruccion SQL UPDATE con el WHERE de seguridad
        $sql = "UPDATE clientes SET
                nombre = :nombre, 
                apellido = :apellido, 
                telefono = :telefono, 
                correo = :correo, 
                direccion = :direccion 
                WHERE id_cliente = :id_cliente";

        $stmt = $conexion->prepare($sql);        

        //Unimos los marcadores con los datos reales
        $stmt->execute([
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':telefono' => $telefono,
            ':correo' => $correo,
            ':direccion' => $direccion,
            ':id_cliente' => $id_cliente
        ]);

        header("Location: ../../pages/lista_clientes.php");
        exit(); //Siempre ponemos exit() después de header("Location:") para asegurarnos que no se ejecute código adicional.
        }catch(PDOException $e){
            //si algo falla mostramos el error
            die("Error al actualizar el cliente: " . $e->getMessage());
    }
}else{
    die("Acceso denegado");
}?>