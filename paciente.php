<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paciente | Ecomedica</title>
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
        <div class="col">
            <div class="col-lg-12">
                <nav id="siteBreadcrumb" aria-label="breadcrumb" class="p-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a
                                href="paciente.php">Paciente</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-12">
            <div class="card mb-5">
                <div class="card-header"  style="background: #00ffc02b;">
                    
                     
                       
                                <div class="input-group-prepend">
                     <button type='button' class="btn btn-success" data-toggle="modal" onclick="NuevoPaciente();" >
                                        <i class="fa fa-plus-circle"></i>
                                        Nuevo Paciente
                                    </button>
                                    <div class="col-3">
                                     <button type='button' class="btn btn-danger"  onclick="ImprimirPaciente();" >
                                        <i class="fa fa-file-pdf"></i>
                                        Reporte 
                                    </button>
                                        </div>
                                </div>
                              
                           
                  
                </div>

                <div class="card-body  table-responsive ">
                       <div id="resultados"></div> 
                        <div id='presentarTabla'></div>
                  
                </div>
                <div class="card-footer p-0 d-none d-sm-block">
                </div>
            </div>
             <div id="show"></div>
        </div>
    </article>
</main>

<!-- Pie de la Pagina -->

<!-- Referencia a las Librerias JavaScript (JQUERY) -->
  <script src="js/scripts.js"></script>
<script src="static/vendor/jquery/jquery.min.js"></script>
<script src="static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/VentanaCentrada.js"></script>
<!-- Codigo JavaScript -->
<?php include 'footer.php';?>


</body>
</html>
<script>
$(document).ready(function(){
    listar('ajax/listar_paciente.php');
    //prueba();
});
function listar(url){
    $.ajax({
      type: 'POST',
      url:url,
      success:function(data){
          $('#presentarTabla').html(data);
      },
   });
}
function ReporteExcel(){
   location.href='exportarpaciente.php';
}
function NuevoPaciente(){
    MostrarModal(0, 'modal/nuevo_paciente.php');
}
function VerPaciente(id){
     MostrarModal(id, 'modal/ver_paciente.php');
}
function eliminarUsuario(id){
  if(confirm("Está seguro de eliminar el registro?")){
        $.ajax({
            type:'POST',
            url:'ajax/grabar_paciente.php',
            data:{
                id_p:id,
                mensaje:'eliminar'
            },
            success: function(data){
                $('#resultados').html(data);
                listar('ajax/listar_paciente.php');
            }
        });
    }
}
function editarUsuario(id){
    //alert(id);
    MostrarModal(id, 'modal/nuevo_paciente.php');
}
function MostrarModal(id, url){
    $.ajax({
        type: 'POST',
        url: url,
        data:{
            id_p:id
        },
        success: function (data) {          
           $('#show').html(data);  
           $('#MyModal').modal();
        }
    });
}

function ImprimirPaciente(){
//    var idCanton=$('#canton').val();
    var parametro="Paciente";
    VentanaCentrada('./pdf/documentos/reportepaciente.php?prueba_p='+parametro,'Reporte_Paciente','','1024','768','true');
}
</script>