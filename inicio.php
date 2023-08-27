
<?php
//validación de que la sesión esté activa
$alert = '';
   session_start();
   $NombresUsuario=$_SESSION['nombreUsuario_S'];
if(!empty($_SESSION['activa'])){
        header('location: header.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel | Ecomedica</title>
   <link rel="icon" href="img/medico.png">
    <link rel="stylesheet" href="static/vendor/fontawesome-free/css/all.min.css">
    <!--referencia libreria Bootstrap-->
    <link rel="stylesheet" href="static/css/bootstrap-custom.css">
      <link rel="stylesheet" href="css/estilo.css">

</head>
<body>
       <div class="contenedor_loader">
      <div class="loader"></div>
    </div>
<!-- Cabecera de la Pagina -->
<?php include 'header.php';?>
<!-- Contenedor de la Pagina -->
<main id="id-main">
    <article class="container-fluid">
        <br>
        <div class="container">
            <div class="card ">
                <div class="card-header">
                    
                     
                       
                                <div class="">
                                   <h5 class='alert alert-info' role='alert'> <strong>Bienvend@ <?php echo $NombresUsuario ?></strong> </h5>
                                </div>
                              
                           
                  
                </div>

                <div class="card-body  table-responsive ">
                 <center>

	
                                                         
                                        <center><a href="paciente.php"><button style="background:#42cde336" class="btn btn panel-info"><font size="3" face="Arial Black" color="black">PACIENTES</font><BR><BR><img src="./img/pacien.png" width="200"></button>
                                                <a href="medico.php"><button style="background:#42cde336" class="btn btn panel-info"><font size="3" face="Arial Black" color="black">DOCTORES</font><BR><BR><img src="./img/doc.png" width="200"></button>
                                                    <a href="cita.php"><button style="background:#42cde336" class="btn btn panel-info"><font size="3" face="Arial Black" color="black">CITAS</font><BR><BR><img src="./img/agend.png" width="200"></button>
                                                    
                                                        <a href="receta.php"><button style="background:#42cde336" class="btn btn panel-info"><font size="3" face="Arial Black" color="black">PRESCRIPCIONES</font><BR><BR><img src="./img/recet.png" width="200"></button></center>
                

</center>	

                  
                </div>
              
            </div>
            
        </div>
    </article>
    </article>
</main>

<!-- Pie de la Pagina -->

<!-- Referencia a las Librerias JavaScript (JQUERY) -->
    <script src="js/scripts.js"></script>
<script src="static/vendor/jquery/jquery.min.js"></script>
<script src="static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Codigo JavaScript -->
<?php include 'footer.php';?>


</body>
</html>
