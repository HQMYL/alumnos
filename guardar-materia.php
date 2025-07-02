<?php
session_start();


include("conexion.php");
include("dbconfig2.php");

$fallo = "Hubo un error inténtalo nuevamente";
$exito = "El tipo de trabajo ha sido registrado exitosamente";
 
$response = "";
$response = array(
    'status' => 0,
    'message' => $fallo
);

$materia = "";
if(isset($_POST['materia'])) 
{
    $materia = $_POST["materia"];
}

      $stmt = $DB_con->prepare('INSERT INTO materias(materia) VALUES(:materia)');
      $stmt->bindParam(':materia',$materia);
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
