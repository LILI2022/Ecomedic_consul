<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#33B8FF;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:#6DA8F2;
	padding: 8px 4px 12px;
	color:white;
	font-weight:bold;
	font-size:13px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	/*border-top: solid 1px #bdc3c7;*/
        padding: 8px 4px 12px;
        /*border: solid 1px #080808;*/
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}


#avatar2{
width: 10px;
height: 105px;
float: left;
margin-right: 0px;
padding: 1px;
border: 5px solid #CCCCCC;
 } 


-->
</style>
<!--
<link rel="stylesheet" href="../../../css/jquery.dataTables.min.css">
<link rel="stylesheet" href="../../../css/bootstrap-theme.min.css">-->
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
       
      <table cellspacing="0" style="width: 100%;">
        <tr>
            <td style="width: 30%; color: #444444;">
            <img style="width: 100%;" src="../../img/logo.png" > 
            </td>
        
             <td style="width: 42%; color: #34495e;font-size:12px; text-align: center">
               <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo "ECOMEDIC";?></span>
				<br> Direccion :<?php echo "PEDRO CARBO ENTRE PADRE AGUIRRE, Y, Daule 091902";?><br> 
				<!--Teléfono: <?php echo "5555-5555";?><br>-->
				
                
            </td>
             
			<td style="width: 25%;text-align:right">
			RECETA Nº <?php echo $idreceta;?>
			</td>
            
        </tr>
    </table>
    

    <?php 
    
//      $prueba=$_GET['prueba_p'];
   
    $sql="SELECT pac.id_paciente,pac.NombresPaciente,me.NombresApellidos,med.NombreMedicina,re.observacion,
re.FechaReceta FROM tb_receta AS re, tb_medico AS me, tb_medicina AS med,tb_paciente AS pac
WHERE re.id_medico=me.id_medico AND re.id_paciente=pac.id_paciente AND re.id_medicina=med.id_medicina AND re.id_receta=$idreceta;";
        $result= mysqli_query($objConexion, $sql);
        $sqlArray= mysqli_fetch_array($result);
            
            $Nombrepacien=$sqlArray['NombresPaciente'];
            $medicop=$sqlArray['NombresApellidos'];
            $medicianan=$sqlArray['NombreMedicina'];
            $observacionn=$sqlArray['observacion'];
            $fechaa=$sqlArray['FechaReceta'];
            $idpaciente=$sqlArray['id_paciente'];

       
        ?>
    <br>
    <table cellspacing="0"  style="width: 50%; text-align: left; font-size: 10pt;">
      
           <tr>
           		<td style="width:100%;" class='midnight-blue'>DATOS DEL PACIENTE</td>
           </tr>
          
           <br>
           <tr>
          
               <td style="width: 75%">
                   <?php
                   $sql="select * from tb_paciente,tb_canton where tb_paciente.id_canton = tb_canton.id_canton and id_paciente=$idpaciente";
                   $resulya= mysqli_query($objConexion, $sql);
                   $pacr= mysqli_fetch_array($resulya);
                   
                   echo " <strong><br>Nombre Paciente</strong> :";
                   echo $mobre=$pacr['NombresPaciente'];
                    echo " <strong><br>Edad :</strong> ";
                    echo $edas=$pacr['Edad'];
                     echo " <strong><br>Direccion :</strong> ";
                     echo $direcion=$pacr['Direccion'];
                      echo " <strong><br>Correo :</strong> ";
                      echo $correos=$pacr['correo'];
                        echo " <strong><br>Canton :</strong> ";
                          echo $cantosn=$pacr['NombreCanton'];
                       echo " <strong><br>Historial Clinico :</strong> ";
                       echo $historia=$pacr['historiaclinica'];
                   ?>
                   
               </td>
           </tr>
           
</table>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
           <tr>
           		<td style="width:100%;" class='midnight-blue'>RECETA DEL PACIENTE</td>
           </tr>
</table>
    <br>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 13pt;" >
        
    <tr>
               <td style="width: 20%;" class='silver'>Nombre Paciente</td>
               <td style="width: 20%;" class='silver'>Nombre Medico</td>
               <td style="width: 20%;" class='silver'>Nombre Medicina</td>
                <td style="width: 20%;" class='silver'>Prescripcion</td>
               <td style="width: 20%;" class='silver'>Fecha</td>
<!--                <td style="width: 10%;" class='silver'>Jornada</td>
                 <td style="width: 9%;" class='silver'>Carrera</td>-->
           </tr>    
</table>
    
    
     
    <!--<br>-->
<table cellspacing="0"style="width: 100%; text-align: left; font-size: 10pt;">
     
    <tr>
        <td style="width: 20%; " class='border-top'><?php echo $Nombrepacien; ?></td>
               <td style="width: 20%;"class='border-top'><?php echo $medicop; ?></td>
               <td style="width: 20%;" class='border-top'><?php echo $medicianan; ?></td>
                 <td style="width: 20%;" class='border-top'><?php echo $observacionn; ?></td>
               <td style="width: 20%;" class='border-top'><?php echo $fechaa; ?></td>
<!--               <td style="width: 11%;" class='<?php echo $clase;?>'><?php echo $jornadass; ?></td>
               <td style="width: 9%;" class='<?php echo $clase;?>'><?php echo $carrea; ?></td>-->
           </tr>
</table>
      <br>
      <br>
      <br>
    <div style="font-size:11pt;text-align:center;font-weight:bold">Gracias por visitar nuestra clinica !</div>
  
  
 </page>
<page_footer>
        <table cellspacing="0" class="page_footer" style="width: 100%;">          
           <tr>
                <td style="width: 10%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
           
                <td style="width: 90%; text-align: right">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                    <?php echo "<br> ";?>&copy;<?php echo " ECOMEDIC "; echo  $anio=date('Y'); ?>
                </td>
                
            </tr>
            
        </table>
 </page_footer>

