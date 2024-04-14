<?php
	header('Content-Type: application/json');
	include('conexion.php');

	try {
		$sql = 'SELECT id_paciente as idPaciente, nombre, primer_apellido, segundo_apellido, peso, altura, fecha_nacimiento, genero, direccion, num_telefono, correo, tipo_sangre, sexo FROM paciente';

		$stmt = $pdo->prepare($sql);
		$respuesta = $stmt->execute();

		if ($respuesta) {
	        while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
	        	// Concatenar los apellidos si el segundo apellido no es nulo
	        	if ($resultado['segundo_apellido'] != null) {
	        		$resultado['apellidos'] = $resultado['primer_apellido'] . ' ' . $resultado['segundo_apellido'];
	        	} else {
	        		// Si el segundo apellido es nulo, solo mostrar el primer apellido
	        		$resultado['apellidos'] = $resultado['primer_apellido'];
	        	}
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
