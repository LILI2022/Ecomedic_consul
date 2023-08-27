
<?php
//validación de que la sesión esté activa
if(session_id()==''){
    session_start();
}
//limpiamos el array de la variable de ssesion. 
$_SESSION = array();
// permite destruir la sesión activa
session_destroy();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inciar Sección | Ecomedica</title>
    <link rel="icon" href="img/medico.png">
    <link rel="stylesheet" href="static/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="static/css/bootstrap-custom.css">
    <link rel="stylesheet" href="css/estilo.css">
   
</head>
<body class="fon">

<header id="id-cabecera">
  
</header>

<main id="id-principal ">
              <div class="contenedor_loader">
      <div class="loader"></div>
    </div>
      <br>
        <br>
    <div class="container">
  
        <div style="display: flex; align-items: center; justify-content: center;">
           

           
            <aside class=" col-lg-5" >
      
                <div class="card shadow">
                    <div class="card-body">
                       
                        <form id="login" class="form-signin p-4" method="post">

                            <div class="text-center">
                                <!--<i class="fa fa-graduation-cap fa-4x text-primary"></i>-->
                                <img src="img/logo.png" class="img-fluid">
                            </div>

                            
                           
                            <div style="min-height: 1rem">
                                <div id="id-alert" >
                                
                                </div>
                            </div>

                            <label for="inputEmail" class="sr-only">Usuario</label>
                            <input type="text" name="usuario" class="form-control mt-2" placeholder="Usuario" required=""
                                   autofocus="">

                            <label for="inputPassword" class="sr-only">Contraseña</label>
                            <input type="password" name="password" class="form-control mt-2" placeholder="Contraseña"
                                   required="">
                            <div class="checkbox mb-3 mt-1">
                                <label>
                                    <input type="checkbox" name="norobot" required=""> No eres un Robot
                                </label>
                            </div>
                            
                            <button type="submit"  id="login" class="btn btn-lg btn-success btn-block">
                                <i class="fa fa-sign-in-alt"></i> Iniciar Sesión
                            </button>
<!--                            <p class="mt-4 mb-3 text-muted">
                                <a href="solicitar_clave.php"> Olvidaste tu Contraseña.</a>
                            </p>-->
                        </form>
                    </div>
                </div>
     
            </aside>


        </div>
    </div>
   
</main>
    <script src="js/scripts.js"></script>
<script src="static/vendor/jquery/jquery.min.js"></script>
<script >
$(document).ready(function(){
    // capturar el valor del id que se recibe
    
     $('#login').bind("submit", function (){
        //alert(123);
       $.ajax({
           type: $(this).attr("method"),
           url:'ajax/verificarlogin.php',
           data:$(this).serialize(),
           success: function (data){
               if(data==1){
                   window.location='inicio.php';
               }else{
               $("#id-alert").html(data);
           }
           }
       }); 
       return false;
    });
});



</script>



    


</body>
</html>