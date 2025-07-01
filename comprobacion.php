<?php 
session_start();



include("conexion.php");

$id = "";
if (isset($_POST["id"])) 
{
    $id = $_POST["id"];
}

$sth = $con->prepare("SELECT * FROM users WHERE usuario=?");
$sth->bindParam(1, $id);

$sth->execute();

if ($sth->rowCount() > 0) {

  echo '<h3>El usuario ya existe,debes escoger otro</h3>';
    
}



?>