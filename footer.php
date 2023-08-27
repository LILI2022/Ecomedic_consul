
<?php 
require_once './conf/confconexion.php';
session_start();

$NombresUsuario=$_SESSION['nombreUsuario_S'];
$idsesion=session_id();
$idrol=$_SESSION['idRolUsuario_S'];
$sql="select * from tb_tipo_usuario where id_tipo_usuario=$idrol";
$result= mysqli_query($objConexion, $sql);
$arrayRol= mysqli_fetch_array($result);
$NombreRol=$arrayRol['descripcion'];
    

?>
<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
 background-color: #007bff;
 
  /*text-align: center;*/
}
</style>

<div class="footer bg-success p-2" >
        <div class="container-fluid">
            <div class="navbar-text">
                <strong> <span class="" style="color: white; text-align: center">
                   <i class="fa fa-user"></i> <?php echo "Bienveid@ ". $NombresUsuario."-".$NombreRol; ?></span></strong> 
            </div>
        </div>
    </div>
   