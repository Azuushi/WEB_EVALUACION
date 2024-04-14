<?php
    header('Content-Type: text/html; charset=UTF-8');
    include('conexion.php');

    try {
        if(isset($_POST['nombreMedicamento'],$_POST['principioActivo'],$_POST['formaFarmaceutica'],$_POST['precioUnitario'],$_POST['descripcion'],$_POST['contraindicaciones'],$_POST['stock'])){

            $nombreMedicamento = $_POST['nombreMedicamento'];
            $principioActivo = $_POST['principioActivo'];
            $formaFarmaceutica = $_POST['formaFarmaceutica'];
            $precioUnitario = $_POST['precioUnitario'];
            $descripcion = $_POST['descripcion'];
            $contraindicaciones = $_POST['contraindicaciones'];
            $stock = $_POST['stock'];


            // Inserción SQL
            $sql = "INSERT INTO medicamento (nombre_medicamento, principio_activo, forma_farmaceutica, precio_unitario, descripcion, contraindicaciones, stock) VALUES (:nombreMedicamento, :principioActivo, :formaFarmaceutica, :precioUnitario, :descripcion, :contraindicaciones, :stock)";

            // Preparar la consulta
            $stmt = $pdo->prepare($sql);
            // Asignar valores a los parámetros
            $stmt->bindParam(':nombreMedicamento', $nombreMedicamento, PDO::PARAM_STR);
            $stmt->bindParam(':principioActivo', $principioActivo, PDO::PARAM_STR);
            $stmt->bindParam(':formaFarmaceutica', $formaFarmaceutica, PDO::PARAM_STR);
            $stmt->bindParam(':precioUnitario', $precioUnitario, PDO::PARAM_INT);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':contraindicaciones', $contraindicaciones, PDO::PARAM_STR);
            $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);

            
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