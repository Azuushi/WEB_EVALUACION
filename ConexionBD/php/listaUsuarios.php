<?php
    header('Content-Type: application/json');
    include('conexion.php');

    try {
        $sql = 'SELECT id_usuario as idUsuario, usuario, nivel, estado FROM usuario';

        $stmt = $pdo->prepare($sql);
        $respuesta = $stmt->execute();

        if ($respuesta) {
            $datos = array(); // Inicializamos un array para almacenar los datos
            while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $datos["data"][] = $resultado;
            }
            echo json_encode($datos); // Codificamos el array en JSON y lo mostramos
        } else {
            echo "No hay datos";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>
