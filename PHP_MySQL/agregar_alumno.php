<?php

include('conexion.php');
$pdo = connect();
// agregar alumnos
try {
	$sql = "INSERT INTO alumnos (nombres, apellidos, email, telefono) VALUES (:nombres,:apellidos, :email,:telefono)";
	$query = $pdo->prepare($sql);
	$query->bindParam(':nombres', $_POST['nombres'], PDO::PARAM_STR);
	$query->bindParam(':apellidos', $_POST['apellidos'], PDO::PARAM_STR);
	$query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
	$query->bindParam(':telefono', $_POST['telefono'], PDO::PARAM_STR);
	$query->execute();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

// Lista de alumnos a ver
include('lista_alumnos.php');
?>