<?php 
session_start();

include("conexion.php");
$usuario = "";

if (isset($_SESSION["usuario"])) 
{
  $usuario = $_SESSION["usuario"];
}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php


#if ($rol == "Administrador") {  VALIDACIÓN SI EL USUARIO ES ADMINISTRADOR
  if(isset($_POST['page'])){
    // Include pagination library file
    include("Pagination.class.php");
    
    // Include database configuration file
    include("dbConfig.php");
  
  // Set some useful configuration
  $baseURL = 'getUsuarios.php';
  $offset = !empty($_POST['page'])?$_POST['page']:0;
  $limit = 5;
  
    
  // Set conditions for search
  
    $whereSQL = 'WHERE TRUE';
    if(!empty($_POST['keywords']))
    {
        $whereSQL = $whereSQL." AND (nombre LIKE '%".$_POST['keywords']."%' || apellidos LIKE '%".$_POST['keywords']."%' || correo LIKE '%".$_POST['keywords']."%' || movil LIKE '%".$_POST['keywords']."%')  ";
    }

    if(!empty($_POST['rol']))
    {
        $whereSQL = $whereSQL." AND id_tipo LIKE '%".$_POST['rol']."%' ";
    }

    $query   = $db->query("SELECT COUNT(*) as rowNum FROM users ".$whereSQL);
    $result  = $query->fetch_assoc();
    $rowCount= $result['rowNum'];
  
  // Initialize pagination class
    $pagConfig = array(
        'baseURL' => $baseURL,
        'totalRows' => $rowCount,
        'perPage' => $limit,
    'currentPage' => $offset,
    'contentDiv' => 'dataContainer',
    'link_func' => 'searchFilter'
    );
    $pagination =  new Pagination($pagConfig);

    // Fetch records based on the offset and limit
    $query = $db->query("SELECT a.*,b.* FROM users a LEFT JOIN roles b ON a.id_tipo = b.id_rol  $whereSQL ORDER BY id_usuario DESC LIMIT $offset,$limit");
?>
    <!-- Data list container -->
    
    
        <?php
        if($query->num_rows > 0){?>

          <table class="table table-hover table-bordered">
    <thead>
<tr>
<th>Nombre</th>
<th>Correo</th>
<th>Móvil</th>
<th>Tipo</th>
<th>Editar</th>
<th>Eliminar</th>
</tr>
</thead>
<tbody>
      <?php
            while($row = $query->fetch_assoc()){
                $offset++
        ?>
<tr>
<td><?= $row["nombre"]; ?> <?= $row["apellidos"]; ?></td>
<td><?= $row["correo"]; ?></td>
<td><?= $row["movil"]; ?></td>
<td><?= $row["rol"]; ?></td>
<td><button type="button" class="btn btn-info actualizar" data-id="<?= $row['id_usuario'];?>" data-nombre="<?= $row['nombre'];?>" data-apellidos="<?= $row['apellidos'];?>" data-dir="<?= $row['direccion'];?>" data-correo="<?= $row['correo'];?>" data-tel="<?= $row['telefono'];?>" data-movil="<?= $row['movil'];?>" data-usuario="<?= $row['usuario'];?>" data-pass="<?= $row['pass'];?>" data-rol="<?= $row['id_tipo'];?>" data-estado="<?= $row['id_estado_usuario'];?>" data-img="<?= $row['img'];?>">Editar</button></td>
<td><button type="button" class="btn btn-danger delete"  data-id="<?= $row['id_usuario'];?>">Eliminar</button></td>
</tr>
            <?php
                    }
        
        }
        else
        {
            echo '<tr><td colspan="6"><h2>No hay registros</h2></td></tr>';
        }
        ?>
    </tbody>
    </table>

    


  <script>
// Load content from external file
$(document).ready(function() {
$(".actualizar").on("click",function()
 {

  var id = $(this).attr("data-id");
  var codigo = $(this).attr("data-codigo");
  var nombre = $(this).attr("data-nombre");
  var apellidos = $(this).attr("data-apellidos");
  var dir = $(this).attr("data-dir");
  var correo = $(this).attr("data-correo");
  var tel = $(this).attr("data-tel");
  var movil = $(this).attr("data-movil");
  var usuario = $(this).attr("data-usuario");
  var pass = $(this).attr("data-pass");
  var rol = $(this).attr("data-rol");
   var estado = $(this).attr("data-id_estado_usuario");
   var img = $(this).attr("data-img");
  //numeros_contacto = numeros_contacto.split(',');
  
  
  $("#id_usuario").val(id);
  $("#nombre").val(nombre);
  $("#apellidos").val(apellidos);
  
  $('#myModal').modal('toggle');
    $('body').removeClass('modal-open');
    $('.modal-backdrop').remove();
  $("#myModalActualizar").modal({show:true});
  
});



});
</script>
<script>
// Load content from external file
$(document).ready(function() {
$(".delete").on("click",function(){

  var id = $(this).attr("data-id");
  
Swal.fire({
    title: 'Desea eliminar este usuario ?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#bb414d', 
    cancelButtonColor:  '#337AFF',
    cancelButtonText: 'Cerrar',
    confirmButtonText: 'Eliminar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({

           type: "POST",
           url:"eliminar-user.php",
           data: {"id":id}, // Adjuntar los campos del formulario enviado.
           
           success: function(response) {  
             Swal.fire({
  icon: 'success',
  //title: 'Eliminar Propiedad',
  text: 'Usuario eliminado correctamente'
  
})
             setTimeout("location.reload()", 3000);
             

            }


         });
    }
  })



  
});



});
</script>

<script>
// Load content from external file
$(document).ready(function() {
$(".agregar").on("click",function(){

  var id = $(this).attr("data-id");
  
Swal.fire({
    title: 'Desea agregar este usuario a destacados ?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#337AFF', 
    cancelButtonColor:  '#bb414d',
    cancelButtonText: 'Cerrar',
    confirmButtonText: 'Agregar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({

           type: "POST",
           url:"agregar-usuario-destacado.php",
           data: {"id":id}, // Adjuntar los campos del formulario enviado.
           
           success: function(response) {  
             Swal.fire({
  icon: 'success',
  //title: 'Eliminar Propiedad',
  text: 'Usuario agregado correctamente'
  
})
             setTimeout("location.reload()", 3000);
             

            }


         });
    }
  })



  
});



});
</script>
<script>
// Load content from external file
$(document).ready(function() {
$(".quitar").on("click",function(){

  var id = $(this).attr("data-id");
  
Swal.fire({
    title: 'Desea eliminar este usuario de la sección destacados ?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#337AFF', 
    cancelButtonColor:  '#bb414d',
    cancelButtonText: 'Cerrar',
    confirmButtonText: 'Cambiar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({

           type: "POST",
           url:"eliminar-usuario-destacado.php",
           data: {"id":id}, // Adjuntar los campos del formulario enviado.
           
           success: function(response) {  
             Swal.fire({
  icon: 'success',
  //title: 'Eliminar Propiedad',
  text: 'Usuario actualizado correctamente'
  
})
             setTimeout("location.reload()", 3000);
             

            }


         });
    }
  })



  
});



});
</script>    
    <!-- Display pagination links -->
    <?= $pagination->createLinks(); ?>
<?php
}

#}  VALIDACIÓN SI EL USUARIO ES ADMINISTRADOR


?>


</body>
</html>
