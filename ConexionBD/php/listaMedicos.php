<?php
	header('Content-Type: application/json');
	include('conexion.php');

	try{
		$sql = 'SELECT id_medico as idMedico, nombre as nombreMedico,concat(concat(primer_apellido," "), segundo_apellido) as apellidoMedico, cedula as cedulaMedico from medico';

		$stmt = $pdo->prepare($sql);
		$respuesta = $stmt->execute();

		if ($respuesta) {
	        while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
	            $datos["data"][] = $resultado;
	        }
        	echo json_encode($datos);
	    } else {
	        echo "No hay datos";
	    }
	} catch (PDOException $e) {
    	echo "Error: " . $e->getMessage();
	}
?>