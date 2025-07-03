<?php 
session_start();
include("conexion.php");


if (isset($_POST['id'])) 
{
	$id = $_POST['id'];
}

$sql = "DELETE FROM niveles_educativos WHERE id_nivel=:id";
$stmt = $con->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_STR); 
$stmt->execute();



?>