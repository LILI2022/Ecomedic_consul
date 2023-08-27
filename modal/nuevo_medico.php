<?php
//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../conf/confconexion.php");//Contiene funcion que conecta a la base de datos

$id=$_POST['id_p'];
if($id==0){
    $titulo="Nuevo Medico";
}
if($id>0){
    $titulo="Editar Medico";
    $sql="select * from tb_medico where id_medico=$id";
    $result= mysqli_query($objConexion, $sql);
    if($result!=null){
        if(mysqli_num_rows($result)>0){
            $usuarioA= mysqli_fetch_array($result);
            $NombresMedico=$usuarioA['NombresApellidos'];
            $cedulaMedico=$usuarioA['Cedula'];
            $telefonoMedico=$usuarioA['Telefono'];
            $edadMedico=$usuarioA['Edad'];
            $sexoMedico=$usuarioA['Sexo'];
            $direccionMedico=$usuarioA['Direccion'];
            $TipEspecialidad=$usuarioA['TipoEspecialidad'];
            $idCantonEditar=$usuarioA['id_canton'];
            $estadoMedico=$usuarioA['estado'];
            if($estadoMedico=='1'){
                $seleccionaA="selected";
                $seleccionaI="";
            }
            if($estadoMedico=='0'){
                $seleccionaI="selected";
                $seleccionaA="";
            }
        }else{
            echo "No se encontró registro con el código: ".$id;
            exit();
        }
    }else{
        echo "Ocurrió un problema al momento de ejecutar la consulta".mysqli_error_list();
        exit();
    }
}
?>
<script>
$(document).ready(function(){
    // capturar el valor del id que se recibe
    $('#IdUsuario').val(<?php echo $id; ?>);
     $('#guardar_usuario').bind("submit", function (){
        //alert(123);
       $.ajax({
           type: $(this).attr("method"),
           url:'ajax/grabar_medico.php',
           data:$(this).serialize(),
           success: function (data){
               $("#resultados_usuario").html(data);
               listar('ajax/listar_medico.php');
           }
       }); 
       return false;
    });
});

</script>
<html>
<div class="modal fade" id="MyModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel"><i class='fa fa-edit'></i> <?php echo $titulo; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  
            </div>
           <div class="modal-body">
                <form class="form-horizontal" method="post" id="guardar_usuario" name="guardar_usuario">
                   
                         <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>
                             <input id="Nombres" type="text" placeholder="Nombres y Apellidos" name="Nombres_txt" class="form-control" value="<?php echo $NombresMedico; ?>" required/>
                        
                    </div>
                      <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-certificate"></i>
                        </span>
                    </div>
                          <input id="CedulaId" type="number" placeholder="Cédula" minlength="10" name="Cedula_txt" class="form-control" value="<?php echo $cedulaMedico; ?>" required/>
                        
                    </div>
                     <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-phone"></i>
                        </span>
                    </div>
                         <input id="CedulaId" placeholder="Celular " type="number" minlength="10" name="Telefono_txt" class="form-control" value="<?php echo $telefonoMedico; ?>" required/>
                        
                    </div>
                      <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-eject"></i>
                        </span>
                    </div>
                          <input id="EdadId" type="number" placeholder="Edad" name="Edad_txt" class="form-control" value="<?php echo $edadMedico; ?>" required/>
                        
                    </div>
                     <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-users-cog"></i>
                        </span>
                    </div>
                         <input id="UsuarioId" type="text" placeholder="Sexo "name="Sexo_txt" class="form-control" value="<?php echo $sexoMedico; ?>" required/>
                        
                    </div>
                      <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-home"></i>
                        </span>
                    </div>
                          <textarea id="ClaveId" type="text" placeholder="Dirección" name="Direccion_txt" class="form-control" value="" required ><?php echo $direccionMedico; ?></textarea>
                        
                    </div>
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-hospital"></i>
                        </span>
                    </div>
                        <input id="ClaveId" name="TipoEspecialidad_txt" type="text" placeholder="Especialidad" class="form-control" value="<?php echo $TipEspecialidad; ?>" required/>
                        
                    </div>
                      <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-calendar-plus"></i>
                        </span>
                    </div>
                         <select class="custom-select form-control" id="canton" name="Canton_txt" required>
                             <option value="">Cantón</option>
                             <?php
                                $sql_canton="select * from tb_canton;";
                                $result_canton= mysqli_query($objConexion, $sql_canton);
                                while($cantonA=mysqli_fetch_array($result_canton)){
                                    $NombreCanton=$cantonA['NombreCanton'];
                                    $idCanton=$cantonA['id_canton'];
                                    $seleccionaCanton='';
                                    if($idCanton==$idCantonEditar){
                                        $seleccionaCanton='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $idCanton; ?>" <?php echo $seleccionaCanton; ?>><?php echo $NombreCanton; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
                      
                    </div>
                     <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                         <select class="custom-select" id="estado" name="estado_txt" required>
                             <option value="1" <?php echo $seleccionaA; ?>>Activo</option>
                             <option value="0" <?php echo $seleccionaI; ?>>Inactivo</option>
                          </select>
                        
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" id="guardar_datos">Guardar Datos</button>
            </div>
                     <div id="resultados_usuario"></div>
                     <input id="IdUsuario" name="IdUsuario" type="hidden">
                </form>
            </div>
            
        </div>
    </div>
</div>
</html>