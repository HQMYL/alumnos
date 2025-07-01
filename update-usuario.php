<?php
session_start();

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

include("conexion.php");
include("dbconfig2.php");



$usuario = "";
if (isset($_SESSION["usuario"])) 
{
    $usuario = $_SESSION["usuario"];
}

$response = array(
  'status' => 0,
  'message' => "El envío ha Fallado, inténtalo nuevamente"
);

// If form is submitted
#$errMSG = '';
$valid = 1;

$nombre = "";
if(isset($_POST['nombre'])) 
{
    $nombre = $_POST["nombre"];
}

$descripcion = "";
if(isset($_POST['descripcion'])) 
{
    $descripcion = $_POST["descripcion"];
}


$tel = "";
if(isset($_POST['tel'])) 
{
    $tel = $_POST["tel"];
}

$user = "";
if(isset($_POST['user'])) 
{
    $user = $_POST['user'];
}


$estado = "";
if(isset($_POST['cmbestado'])) 
{
    $estado = $_POST['cmbestado'];
}

if (empty($_POST['cmbestado'])) 
{
  $estado = $_POST['estado'];
}


$pass = "";
if(isset($_POST['pass'])) 
{
    $pass = $_POST['pass'];
    $pass = md5($pass);
}

if (empty($_POST['pass'])) 
{
  $pass = $_POST['pass1'];
}

$pass2 = "";
if(isset($_POST['pass2'])) 
{
    $pass2 = $_POST['pass2'];
}

$id = "";
if (isset($_POST["id"])) 
{
   $id = $_POST["id"];
}

$imagen_actual = "";
if (isset($_POST["imagen_actual"])) 
{
   $imagen_actual = $_POST["imagen_actual"];
}


/*$stmt_edit = $DB_con->prepare('SELECT id,img FROM users WHERE id =:uid');
    $stmt_edit->execute(array(':uid'=>$id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);*/

# CODIGO PARA ACTUALIZAR

$imgFile = $_FILES['archivo']['name'];
    $tmp_dir = $_FILES['archivo']['tmp_name'];
    $imgSize = $_FILES['archivo']['size'];
          
    if($imgFile)
       #ACTUALIZACIÓN SI SE ENVÍA IMAGEN 
    {  
      $upload_dir = 'assets/images/users/'; // upload directory 
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif','jfif'); // valid extensions
      $userpic = mt_rand(1000,1000000).".".$imgExt;
      if(in_array($imgExt, $valid_extensions))
      {     
        if($imgSize < 5000000)
        {
          #unlink($upload_dir.$edit_row['img']);
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
        }
        else
        {
          $errMSG = "El archivo debe ser máximo de 5 MG";
        }
      }
      else
      {
        $errMSG = "Solo se permiten archivos JPG, JPEG, PNG & GIF";    
      }

if(!isset($errMSG))
    { #INICIO !ISSET ERRMSG
     
     $stmt = $DB_con->prepare('UPDATE users 
        
        SET nombre=:nombre,descripcion=:descripcion,telefono=:tel,usuario=:user,pass=:pass,status=:estado,img=:userpic WHERE id=:id');
          $stmt->bindParam(':nombre', $nombre);
          $stmt->bindParam(':descripcion',$descripcion);
          $stmt->bindParam(':tel', $tel);
          $stmt->bindParam(':user', $user);
          $stmt->bindParam(':pass', $pass);
          $stmt->bindParam(':estado', $estado);
          $stmt->bindParam(':userpic', $userpic);
          $stmt->bindParam(':id', $id);
        
      if($stmt->execute()){
        
                $response['status'] = 1;
$response['message'] = 'Usuario actualizado correctamente';


if ($imagen_actual != "") 
{
unlink("assets/images/users/".$imagen_actual); 
}


                
      }
      else{
        $response['status'] = 0;
    $response['message'] = "Hubo un error inténtalo nuevamente";
    
      }


  echo  json_encode($response);


    } #FINAL !ISSET ERRMSG



} # ACTUALIZACIÓN SI SE ENVÍA IMAGEN

else
    { // ACTUALIZACIÓN SI NO SE ENVÍA IMAGEN 

      $stmt = $DB_con->prepare('UPDATE users 
        
        SET nombre=:nombre,descripcion=:descripcion,telefono=:tel,usuario=:user,pass=:pass,status=:estado WHERE id=:id');
          $stmt->bindParam(':nombre', $nombre);
          $stmt->bindParam(':descripcion',$descripcion);
          $stmt->bindParam(':tel', $tel);
          $stmt->bindParam(':user', $user);
          $stmt->bindParam(':pass', $pass);
          $stmt->bindParam(':estado', $estado);
          $stmt->bindParam(':id', $id);
        
      if($stmt->execute())
      {    
        $response['status'] = 1;
        $response['message'] = 'Usuario actualizado correctamente';         
      }
      else
      {
        $response['status'] = 0;
        $response['message'] = "Hubo un error inténtalo nuevamente";
      }


        echo  json_encode($response);


      
    } // ACTUALIZACIÓN SI NO SE ENVÍA IMAGEN
    

?>