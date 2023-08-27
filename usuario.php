<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios | Ecomedic</title>
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
<?php include 'header.php';
 session_start();
 $idRolll=$_SESSION['idRolUsuario_S'];
 if($idRolll==1){
     
 
?>
<!-- Contenedor de la Pagina -->
<main id="id-main">
    <article class="container-fluid">
        <div class="col-12">
            <div class="col-lg-12">
                <nav id="siteBreadcrumb" aria-label="breadcrumb" class="p-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a
                                href="usuario.php">Usuarios</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-12">
            <div class="card ">
                <div class="card-header " style="background: #00ffc02b;">
                    
                     
                       
                                <div class="input-group-prepend">
                     <button type='button' class="btn btn-success" data-toggle="modal" onclick="NuevoUsuario();" >
                                        <i class="fa fa-plus-circle"></i>
                                        Nuevo Usuario
                                    </button>
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
<?php 
} else {
    ?>
<script>
alert("no tiene permisos");
 window.location='inicio.php';

</script>
    <?php 
}
?>
<!-- Pie de la Pagina -->

<!-- Referencia a las Librerias JavaScript (JQUERY) -->
    <script src="js/scripts.js"></script>
<script src="static/vendor/jquery/jquery.min.js"></script>
<script src="static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Codigo JavaScript -->
<?php include 'footer.php';?>


</body>
</html>
<script>
$(document).ready(function(){
    listar('ajax/listar_usuario.php');
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
   location.href='exportarExcel.php';
}
function NuevoUsuario(){
    MostrarModal(0, 'modal/nuevo_usuario.php');
}
function eliminarUsuario(id){
  if(confirm("Está seguro de eliminar el registro?")){
        $.ajax({
            type:'POST',
            url:'ajax/grabar_usuario.php',
            data:{
                id_p:id,
                mensaje:'eliminar'
            },
            success: function(data){
                $('#resultados').html(data);
                listar('ajax/listar_usuario.php');
            }
        });
    }
}
function editarUsuario(id){
    //alert(id);
    MostrarModal(id, 'modal/nuevo_usuario.php');
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

function ImprimirUsuario(){
//    var idCanton=$('#canton').val();
    var parametro="Hola";
    VentanaCentrada('./pdf/documentos/reporteusuario.php?prueba_p='+parametro,'Reporte_Usuario','','1024','768','true');
}
</script>

