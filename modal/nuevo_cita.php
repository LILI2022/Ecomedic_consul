<?php
//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../conf/confconexion.php");//Contiene funcion que conecta a la base de datos

$id=$_POST['id_p'];
if($id==0){
    $titulo="Nuevo Cita";
}
if($id>0){
    $titulo="Editar Cita";
    $sql="select * from tb_cita where id_cita=$id";
    $result= mysqli_query($objConexion, $sql);
    if($result!=null){
        if(mysqli_num_rows($result)>0){
            $usuarioA= mysqli_fetch_array($result);
            $idpaciente=$usuarioA['id_paciente'];
            $idmedico=$usuarioA['id_medico'];
            $observacion=$usuarioA['observacion'];
            $fechaw=$usuarioA['fecha_hora'];
//            $idCantonEditar=$usuarioA['idCanton'];
            $estadocita=$usuarioA['estado'];
            if($estadocita=='1'){
                $seleccionaA="selected";
                $seleccionaI="";
            }
            if($estadocita=='0'){
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
           url:'ajax/grabar_cita.php',
           data:$(this).serialize(),
           success: function (data){
               $("#resultados_usuario").html(data);
               listar('ajax/listar_cita.php');
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
                            <i class="fa fa-user-edit"></i>
                        </span>
                    </div>

                         <select class="custom-select" id="canton" name="Paciente_txt" required>
                             <option value="">Paciente </option>
                            <?php
                                $sql_canton="select * from tb_paciente;";
                                $result_canton= mysqli_query($objConexion, $sql_canton);
                                while($cantonA=mysqli_fetch_array($result_canton)){
                                    $NombreCanton=$cantonA['NombresPaciente'];
                                    $idCanton=$cantonA['id_paciente'];
                                    $seleccionaCanton='';
                                    if($idCanton==$idpaciente){
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
                            <i class="fa fa-users-cog"></i>
                        </span>
                    </div>
                         <select class="custom-select" id="canton" name="medico_txt" required>
                             <option value="">Médico</option>
                            <?php
                                $sql_canton="select * from tb_medico;";
                                $result_canton= mysqli_query($objConexion, $sql_canton);
                                while($cantonA=mysqli_fetch_array($result_canton)){
                                    $NombreCanton=$cantonA['NombresApellidos'];
                                    $idCanto=$cantonA['id_medico'];
                                    $seleccionaCanton='';
                                    if($idCanto==$idmedico){
                                        $seleccionaCanton='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $idCanto; ?>" <?php echo $seleccionaCanton; ?>><?php echo $NombreCanton; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
                    
                 
                    </div>
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-user-check"></i>
                        </span>
                    </div>
                        <textarea placeholder="Observación"  id="observacion_txt" name="observacion_txt" class="form-control"  required maxlength="255"><?php echo $observacion; ?></textarea>

                    </div>
                     <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </div>
                         <input type="datetime-local" id="fecha" class="form-control" name="fecha" value="<?php echo $fechaw ?>" required="">
                            
                     
                    </div>
                        <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-check-double"></i>
                        </span>
                    </div>
                         <select class="form-control" id="estado" name="estado_txt" required>
                             <option value="">Estado</option>
                             <option value="1" <?php echo $seleccionaA; ?>>Recervada</option>
                             <option value="0" <?php echo $seleccionaI; ?>>Pendiente</option>
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