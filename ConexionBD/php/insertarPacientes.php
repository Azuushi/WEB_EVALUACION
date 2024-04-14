<?php
    header('Content-Type: text/html; charset=UTF-8');
    include('conexion.php');

    try {
        if(isset($_POST['nombre'],$_POST['primerApellido'],$_POST['segundoApellido'],$_POST['peso'],$_POST['altura'],$_POST['fechaNacimiento'],$_POST['genero'],$_POST['direccion'],$_POST['numTelefono'],$_POST['correo'],$_POST['tipoSangre'],$_POST['sexo'])){

            $nombre = $_POST['nombre'];
            $primerApellido = $_POST['primerApellido'];
            $segundoApellido = $_POST['segundoApellido'];
            $peso = $_POST['peso'];
            $altura = $_POST['altura'];
            $fechaNacimiento = $_POST['fechaNacimiento'];
            $genero = $_POST['genero'];
            $direccion = $_POST['direccion'];
            $numTelefono = $_POST['numTelefono'];
            $correo = $_POST['correo'];
            $tipoSangre = $_POST['tipoSangre'];
            $sexo = $_POST['sexo'];

            // Inserción SQL
            $sql = "INSERT INTO paciente (nombre, primer_apellido, segundo_apellido, peso, altura, fecha_nacimiento, genero, direccion, num_telefono, correo, tipo_sangre, sexo) VALUES (:nombre, :primerApellido, :segundoApellido, :peso, :altura, :fechaNacimiento, :genero, :direccion, :numTelefono, :correo, :tipoSangre, :sexo)";

            // Preparar la consulta
            $stmt = $pdo->prepare($sql);
            // Asignar valores a los parámetros
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':primerApellido', $primerApellido, PDO::PARAM_STR);
            $stmt->bindParam(':segundoApellido', $segundoApellido, PDO::PARAM_STR);
            $stmt->bindParam(':peso', $peso, PDO::PARAM_INT);
            $stmt->bindParam(':altura', $altura, PDO::PARAM_INT);
            $stmt->bindParam(':fechaNacimiento', $fechaNacimiento, PDO::PARAM_STR);
            $stmt->bindParam(':genero', $genero, PDO::PARAM_STR);
            $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
            $stmt->bindParam(':numTelefono', $numTelefono, PDO::PARAM_STR);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->bindParam(':tipoSangre', $tipoSangre, PDO::PARAM_STR);
            $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
            
            // Ejecutar la consulta
            $stmt->execute();

            // Obtener el ID del último registro insertado
            $ultimo_id = $pdo->lastInsertId();
            
            echo "Datos insertados correctamente. ID del nuevo registro: $ultimo_id";
        } else {
            echo "Faltaron Datos";
        }
        
    } catch (PDOException $e) {
        die("Error al ejecutar la consulta: " . $e->getMessage());
    }
?>
