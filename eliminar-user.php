<?php 
session_start();
include("conexion.php");


if (isset($_POST['id'])) 
{
	$id = $_POST['id'];
}

#$imagi = array();
#$imagen = "";
$sth = $con->prepare("SELECT * FROM users WHERE id_usuario =?");
$sth->bindParam(1, $id);
$sth->execute();

if ($sth->rowCount() > 0) {

foreach ($sth as $row ) 
{
  $imagen = $row["img"];
}
#$imagen = $imagi[0];
}

unlink("dist/img/users/".$imagen);



$sql = "DELETE FROM users WHERE id_usuario=:id";
$stmt = $con->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_STR); 
$stmt->execute();



?>