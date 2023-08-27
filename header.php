 <?php 
      
      session_start();
          $idUsuario=$_SESSION['idusuario_S'];
           $idrolUsuario=$_SESSION['idRolUsuario_S'];
           if($idUsuario==''){
               //echo "Usted no ha iniciado sesión correctamente";
              header('Location: index.php');
              exit();  
            
          }
            
            
       ?>	  
<header id="id-header">
    <nav class="navbar navbar-landing navbar-expand-lg navbar-dark bg-success p-2">
        <div class="container-fluid">
            <a class="navbar-brand mr-auto" href="inicio.php">
                <!-- <i class="fa fa-hospital"></i>
                <b>ECOMEDICA </b> -->
                <img src="img/logo2.png" class="img-fluid" style="width: 160px; height: 60px;" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar1">
               
                <ul class="navbar-nav ml-5">
                     <?php if($idrolUsuario==1){
                    
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-users"></i>
                            Usuarios </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-size: 14px">
                            <a class="dropdown-item " href="usuario.php">
                                    <i class="fa fa-user"></i> Gestión Usuarios </a>
                           
                        </div>
                    </li>
                    <?php }?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-users-cog"></i>
                            Médicos </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-size: 14px">
                            <a class="dropdown-item " href="medico.php">
                                     <i class="fa fa-users"></i> Gestion Médicos </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="medicinas.php">
                                    <i class="fa fa-pills"></i>  Gestión Medicinas </a>
                        
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-check"></i>
                            Paciente </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-size: 14px">
                            <a class="dropdown-item disabled" href="paciente.php">
                              <i class="fa fa-user-edit"></i>   Gestión Pacientes </a>
                            <!--<div class="dropdown-divider"></div>-->
<!--                            <a class="dropdown-item" href="../comisiones/comisiones_vendedor.php?m=0000020023">
                                Comision Vendedor </a>
                            <a class="dropdown-item"
                               href="../comisiones/comisiones_verificar_cartilla_pagada.php?m=0000020024">
                                Cartilla Pagada Verificar </a>
                            <a class="dropdown-item"
                               href="../comisiones/comisiones_imprimir_rol_vendedor.php?m=0000020025">
                                Imprimir Rol Vendedor </a>
                            <a class="dropdown-item"
                               href="../comisiones/verificar_cartilla_recaudacion.php?m=0000020026">
                                VERIFICAR CARTILLA </a>
                            <a class="dropdown-item" href="../comisiones/verificar_cartilla_estados.php?m=0000020027">
                                CAMBIAR ESTADO CARTILLA </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item disabled" href="#">
                                RECAUDADOR </a>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-divider"></div>-->
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle"></i>
                           Recetas y Citas  </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-size: 14px">
                            <a class="dropdown-item disabled" href="receta.php">
                              <i class="fa fa-user-clock"></i>  Receta </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="cita.php">
                                <i class="fa fa-user-circle"></i> Citas </a>
                            
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-lock"></i>
                           </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-size: 14px">
                            <a class="dropdown-item disabled" href="#" onclick="cambiarclave(<?php echo $idUsuario ?>);">
                                  <i class="fa fa-lock"></i> Cambiar contraseña </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="salir.php">
                                <i class="fa fa-sign-out-alt"></i>  Cerrar session </a>
                            
                        </div>
                    </li>

                    <li class="nav-item">
                        <!--<a class="nav-link page-scroll text-white"  title="Cambiar Contraseña">-->
                        
                        </a>
                    </li>
                    <li class="nav-item">
                        <!--<a class="nav-link page-scroll text-white" href="salir.php">-->
                           
                        </a>
                    </li>
                </ul>
            </div>
        </div> <!-- container //  -->
    </nav>
    <div id="show"></div>
</header>

<script >
    
function cambiarclave(id){
   
   modal(id,'modal/cambiar_clave.php');
}
function modal(id,url){
    $.ajax({
        type:'post',
        url:url,
        data:{
            id_p:id
        },
        success:function(data){
            $('#show').html(data);
            $('#MyModal').modal();
        }
    });
}
</script>