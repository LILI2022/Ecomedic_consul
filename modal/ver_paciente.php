<?php

//Contiene las variables de configuracion para conectar a la base de datos

require_once ("../conf/confconexion.php");//Contiene funcion que conecta a la base de datos



$id=$_POST['id_p'];



if($id>0){

    $titulo="Informacion del paciente";

    $sql="select * from tb_paciente where id_paciente=$id";

    $result= mysqli_query($objConexion, $sql);

    if($result!=null){

        if(mysqli_num_rows($result)>0){

            $usuarioA= mysqli_fetch_array($result);

            $NombresPaciente=$usuarioA['NombresPaciente'];

            $cedulaPaciente=$usuarioA['Cedula'];

            $edadPaciente=$usuarioA['Edad'];

            $sexoPaciente=$usuarioA['Sexo'];

            $direccionPaciente=$usuarioA['Direccion'];

            $TipSangre=$usuarioA['TipoSangre'];
       $Correo=$usuarioA['correo'];
             $historia=$usuarioA['historiaclinica'];
                   $imagens=$usuarioA['imagen'];
             $idCantonEditar=$usuarioA['id_canton'];
          $peso=$usuarioA['peso'];
          $altura=$usuarioA['altura'];
          $fechanacamie=$usuarioA['fechanacimiento'];
          $nombrepad=$usuarioA['NombrePadre'];
          $nombremad=$usuarioA['NombreMadre'];
          $celumadre=$usuarioA['telefono2'];
          $celupadre=$usuarioA['telefono'];
          
            $estadoPaciente=$usuarioA['estado'];

            if($estadoPaciente=='1'){

                $seleccionaA="selected";

                $seleccionaI="";

            }

            if($estadoPaciente=='0'){

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



<html>

<div class="modal fade bd-example-modal-lg" id="MyModal" tabindex="" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header">

              

                <h4 class="modal-title" id="myModalLabel"><i class='fa fa-eye'></i> <?php echo $titulo; ?></h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

           <div class="modal-body">
               <form class="form-control">
               <div class="row">
  <?php 
                         if($imagens=='0'){
                             ?>
                     <div class="text-center col-lg-4" >
                         <img class="img-fluid" style="width: 250px; height: 200px;" src="./img/perfil.png" alt="">
                      <br>
                    <p> Foto de paciente</p>
                     </div>
                    <?php
                         } else {
                             
                         
                    if($id>0){
                        
                    
                    ?>
                    <div class="text-center col-lg-5">
                        
                        <img  style="width: 250px; height: 200px;" src="data:image/jpg;base64,<?php echo base64_encode($imagens)?>" alt="">
                      <br>
                    <p> Foto de paciente</p>
                    </div>
                    <?php }
                         }?>
                   <div class="col-lg-7">
                       
                       <?php
                       echo "<strong>Nombre Paciente :</strong> ";
                       echo $NombresPaciente;
                        echo "<br><strong>Cedula :</strong> ";
                        echo $cedulaPaciente;
                        echo "<br><strong>Edad :</strong> ";
                        echo $edadPaciente;
                        echo "<br><strong>Sexo :</strong>";
                        echo $sexoPaciente;
                        echo "<br><strong>Direccion :</strong> ";
                        echo $direccionPaciente;
                        echo "<br><strong>Tipo de Sangre :</strong> ";
                        echo $TipSangre;
                        echo "<br><strong>Peso :</strong> ";
                        echo $peso;
                        echo "<br><strong>Altura :</strong> ";
                        echo $altura;
                        echo "<br><strong>Fecha de nacimiento :</strong> ";
                        echo $fechanacamie;
                        echo "<br><strong>Historial Clinico</strong> ";
                        echo $historia;
                        
                              
                       
                       ?>
                   </div>
                    
</div>
                   <hr>
                   <h5 class="modal-title"> Informacion/padre/madre/familiar  </h5>
                   <hr>
                   <div class="row">
                       <div class="col-lg-6">
                       <?php 
                    echo "<strong>Nombre del Padre :</strong><br> ";
                    echo $nombrepad;
                     echo "<br><strong>N telefono del padre :</strong><br> ";
                    echo $celupadre;
                      echo "<br><strong>Correo madre o padre :</strong><br> ";
                    echo $Correo;
                    
                       ?>
                   </div>
                       
                       <div class="col-lg-6">
                           <?php 
                            echo "<strong>Nombre de la madre :</strong><br> ";
                    echo $nombremad;
                      echo "<br><strong>N telefono de la madre :</strong><br> ";
                    echo $celumadre;
                    $query="select * from tb_canton where id_canton=$idCantonEditar";
                    $resultado= mysqli_query($objConexion, $query);
                    $canton= mysqli_fetch_array($resultado);
                    $idcantond=$canton['NombreCanton'];
                   
                     echo "<br><strong>Canton :</strong><br> ";
                    echo $idcantond;
                           ?>
                       </div>
                   </div>
                   </form>
            </div>

            

        </div>

    </div>

</div>

</html>
