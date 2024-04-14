<?php
	$servidor = "localhost";
	$usuariobd = "root";
	$contraseña = "";
	$base_de_datos = "citasmedicas";

	// Conexión utilizando PDO
	try {
	    $pdo = new PDO("mysql:host=$servidor;dbname=$base_de_datos", $usuariobd, $contraseña);
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	    die("Error al conectar: " . $e->getMessage());
	}
?>