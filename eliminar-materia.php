<?php 
session_start();
include("conexion.php");


if (isset($_POST['id'])) 
{
	$id = $_POST['id'];
}

$sql = "DELETE FROM materia WHERE id_materia=:id";
$stmt = $con->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_STR); 
$stmt->execute();



?>