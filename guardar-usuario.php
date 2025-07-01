<?php
session_start();


include("conexion.php");
include("dbconfig2.php");

$fallo = "Huboun error inténtalo nuevamente";
  $fallo2 = "El tamaño de la foto debe ser máximo de 5MG";
  $fallo3 = "Solo se permiten imágenes JPG,JPEG,PNG,JFIF";
  
 $exito = "el usuario ha sido registrado exitosamente";
 
$response = "";
$response = array(
    'status' => 0,
    'message' => $fallo
);

$codigo = "";
$codigo = mt_rand(1000,1000000);


$nombre = "";
if(isset($_POST['nombre'])) 
{
    $nombre = $_POST["nombre"];
}

$apellidos = "";
if(isset($_POST['apellidos'])) 
{
    $apellidos = $_POST["apellidos"];
}


$dir = "";
if(isset($_POST['dir'])) 
{
    $dir = $_POST["dir"];
}

$correo = "";
if(isset($_POST['correo'])) 
{
    $correo = $_POST["correo"];
}

$tel = "";
if(isset($_POST['tel'])) 
{
    $tel = $_POST["tel"];
}

$movil = "";
if(isset($_POST['movil'])) 
{
    $movil = $_POST["movil"];
}

$user = "";
if(isset($_POST['user'])) 
{
    $user = $_POST['user'];
}

$pass = "";
if(isset($_POST['pass'])) 
{
    $pass = $_POST['pass'];
    $pass = md5($pass);
}


$rol = "";
if(isset($_POST['cmbrol'])) 
{
    $rol = $_POST['cmbrol'];
}

$estado = "";
if(isset($_POST['cmbestado'])) 
{
    $estado = $_POST['cmbestado'];
}

if (empty($_POST['cmbestado'])) 
{
 $estado = "1";
}


$sth = $con->prepare("SELECT * FROM users WHERE usuario=?");
$sth->bindParam(1, $user);

$sth->execute();

if ($sth->rowCount() > 0) {

    $response['status'] = 0;
    $response['message'] = "El usuario ya existe debes escoger otro";
    echo  json_encode($response);

}

else {

#if(isset($_POST['btnsave']))
 # {
    
    
    /*else if(empty($imgFile)){
      $errMSG = "Please Select Image File.";
    }*/
    #else
    #{
    $imgFile = $_FILES['archivo']['name'];
    $tmp_dir = $_FILES['archivo']['tmp_name'];
    $imgSize = $_FILES['archivo']['size'];
    $carpeta = 'dist/img/users/';
     if (!file_exists($carpeta)) 
     {
       mkdir($carpeta,0777);
     }
      $upload_dir = $carpeta; // upload directory
  
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    
      // valid image extensions
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif','jfif'); // valid extensions
    
      // rename uploading image
      $userpic = mt_rand(1000,1000000).".".$imgExt;
        
      // allow valid image file formats
      if(in_array($imgExt, $valid_extensions))
      {     
        // Check file size '5MB'
        if($imgSize < 5000000)
        {
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
        }
        else
        {
            $response['status'] = 0;
            $response['message'] = $fallo2;
            echo  json_encode($response);
        }
      }
      else
      {
        $errMSG = "Solo se permiten  archivos JPG,JPEG,PNG,GIF,JFIF";    
      }
    #}
    
    if (empty($imgFile)) 
    {
      $userpic = "user-default.png";
    }
    // if no error occured, continue ....
    if(!isset($errMSG))
    {
      $stmt = $DB_con->prepare('INSERT INTO users(codigo,nombre,apellidos,direccion,correo,telefono,movil,usuario,pass,id_tipo,id_estado_usuario,img) VALUES(:codigo,:nombre,:apellidos,:dir,:correo,:tel,:movil,:user,:pass,:rol,:estado,:userpic)');
      $stmt->bindParam(':codigo',$codigo);
      $stmt->bindParam(':nombre',$nombre);
      $stmt->bindParam(':apellidos',$apellidos);
      $stmt->bindParam(':dir',$dir);
      $stmt->bindParam(':correo',$correo);
      $stmt->bindParam(':tel',$tel);
      $stmt->bindParam(':movil',$movil);
      $stmt->bindParam(':user',$user);
      $stmt->bindParam(':pass',$pass);
      $stmt->bindParam(':rol',$rol);
      $stmt->bindParam(':estado',$estado);
      $stmt->bindParam(':userpic',$userpic);
      
      if($stmt->execute())
      {
        $response['status'] = 1;
    $response['message'] = $exito;
    echo  json_encode($response);
        #$successMSG = "new record succesfully inserted ...";
        #header("refresh:5;index.php"); // redirects image view page after 5 seconds.

       
     
    
      }
      else
      {
        $response['status'] = 0;
    $response['message'] = $fallo;
    echo  json_encode($response);
      }
    }
  #}

}






?>
