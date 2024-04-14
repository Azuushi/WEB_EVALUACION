<?php
    header('Content-Type: text/html; charset=UTF-8');
    include('conexion.php');

    // Función para encriptar la contraseña con AES
    function encriptarContraseña($contraseña) {
        $privateKey = 'privateKey'; // Llave privada para encriptar la contraseña
        return "AES_ENCRYPT('$contraseña', UNHEX(SHA2('$privateKey', 512)))";
    }

    try {
        if(isset($_POST['usuario'],$_POST['contrasena'],$_POST['nivel'])){

            $usuario = $_POST['usuario'];
            $contrasena = encriptarContraseña($_POST['contrasena']); // Encriptar la contraseña
            $nivel = $_POST['nivel'];

            // Inserción SQL
            $sql = "INSERT INTO usuario (usuario, contrasena, nivel) VALUES (:usuario, $contrasena, :nivel)";

            // Preparar la consulta
            $stmt = $pdo->prepare($sql);
            // Asignar valores a los parámetros
            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->bindParam(':nivel', $nivel, PDO::PARAM_INT);
            
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
