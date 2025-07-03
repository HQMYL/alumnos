<?php
session_start();


include("conexion.php");
include("dbconfig2.php");

$fallo = "Hubo un error inténtalo nuevamente";
$exito = "El nivel educativo ha sido registrado exitosamente";
 
$response = "";
$response = array(
    'status' => 0,
    'message' => $fallo
);

$nivel = "";
if(isset($_POST['nivel'])) 
{
    $nivel = $_POST["nivel"];
}

      $stmt = $DB_con->prepare('INSERT INTO niveles_educativos(nivel_educativo) VALUES(:nivel)');
      $stmt->bindParam(':nivel',$nivel);
      if($stmt->execute())
      {
        $response['status'] = 1;
    $response['message'] = $exito;
    echo  json_encode($response);
        
      }
      else
      {
        $response['status'] = 0;
    $response['message'] = $fallo;
    echo  json_encode($response);
      }








?>
