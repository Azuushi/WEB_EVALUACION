<?php
header('Content-Type: application/json; charset=UTF-8');
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["user"];
    $password = $_POST["pswd"];

    try {
        $sql = "call COMPRUEBA_USUARIO(:username)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $existUser = $resultado["existe"];
        }
        if ($existUser == 1) {
            $sql = "call COMPRUEBA_CONTRASENA(:username,:password);";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
            while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $valido = $resultado["estado"];
            }
            if ($valido == 1) {
                // Establecer una cookie de sesión
                setcookie("sesion", $username, time() + (86400 * 30), "/"); // Cookie válida por 30 días (puedes ajustar este valor)

                // Iniciar sesión en la base de datos (si es necesario)
                $sql = "call INICIA_SESION(:username,:password);";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->execute();
                
                // Obtener los datos de usuario si es necesario
                $userData = []; // Aquí puedes obtener los datos del usuario si los necesitas
                echo json_encode(['estatusSesion' => 1, 'userData' => $userData]); // Enviar cualquier dato adicional que necesites
            } else {
                echo json_encode(['estatusSesion' => 0,'txt' => "Contraseña incorrecta"]);
            }
        } else {
            echo json_encode(['estatusSesion' => 0,'txt' => "Usuario no existe o está inactivo"]);
        }
    } catch (PDOException $e) {
        echo json_encode(['estatusSesion' => -1,'txt' => "Error: " . $e->getMessage()]);
    }
}
?>
