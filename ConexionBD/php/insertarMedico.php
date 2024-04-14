<?php
    header('Content-Type: text/html; charset=UTF-8');
    include('conexion.php');

    try {
        if(isset($_POST['nombre'],$_POST['primerApellido'],$_POST['segundoApellido'],$_POST['cedula'])){

            $nombre = $_POST['nombre'];
            $primerApellido = $_POST['primerApellido'];
            $segundoApellido = $_POST['segundoApellido'];
            $cedula = $_POST['cedula'];

            // Inserción SQL
            $sql = "INSERT INTO medico (nombre, primer_apellido, segundo_apellido, cedula) VALUES (:nombre, :primerApellido, :segundoApellido, :cedula)";

            // Preparar la consulta
            $stmt = $pdo->prepare($sql);
            // Asignar valores a los parámetros
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':primerApellido', $primerApellido, PDO::PARAM_STR);
            $stmt->bindParam(':segundoApellido', $segundoApellido, PDO::PARAM_STR);
            $stmt->bindParam(':cedula', $cedula, PDO::PARAM_INT);
            
            // Ejecutar la consulta
            $stmt->execute();

            // Obtener el ID del último registro insertado
            $ultimo_id = $pdo->lastInsertId();
            
            echo "Datos insertados correctamente. ID del nuevo registro: $ultimo_id";
        }else{
            echo "Faltaron Datos";
        }
        
    } catch (PDOException $e) {
        die("Error al ejecutar la consulta: " . $e->getMessage());
    }
?>