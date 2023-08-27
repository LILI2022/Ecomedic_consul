
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


//$sql="SELECT tb_paciente.NombresPaciente ,tb_paciente.correo ,tb_medico.NombresApellidos,tb_cita.observacion,
//tb_cita.fecha_hora FROM tb_paciente ,tb_cita,tb_medico WHERE tb_cita.id_paciente = tb_paciente.id_paciente
//AND tb_cita.id_medico = tb_medico.id_medico AND tb_cita.estado=1 AND tb_cita.id_cita=$id;";
//$resultado= mysqli_query($objConexion,$sql);
//$cita= mysqli_fetch_array($resultado);
//$nombrepaciente=$cita['NombresPaciente'];
//$nombremedico=$cita['NombresApellidos'];
//$correo= $cita['correo'];
//$recita=$cita['observacion'];
//$fecha=$cita['fecha_hora'];
//$sql2="select * from tb_paciente where id_paciente=4";
//$resulatdopaciente= mysqli_query($objConexion, $sql2);
//$repaciente= mysqli_fetch_array($resulatdopaciente);
//$obpaciente=$repaciente['NombresPaciente'];
//$correo=$repaciente['correo'];
//
//$sql3="select * from tb_medico where id_medico=3";
//$resulmedico= mysqli_query($objConexion, $sql3);
//$repamedico= mysqli_fetch_array($resulmedico);
//$obmedico=$repamedico['NombresApellidos'];

     
if($estado=='1'){
    

$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 0;  // Sacar esta línea para no mostrar salida debug
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Host de conexión SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'cedenolopezjonathan27@gmail.com';                 // Usuario SMTP
    $mail->Password = 'ivjgwpbanmrdlsgl';                           // Password SMTP
    $mail->SMTPSecure = 'tls';                            // Activar seguridad TLS
    $mail->Port = 587;                                    // Puerto SMTP

    #$mail->SMTPOptions = ['ssl'=> ['allow_self_signed' => true]];  // Descomentar si el servidor SMTP tiene un certificado autofirmado
    #$mail->SMTPSecure = false;				// Descomentar si se requiere desactivar cifrado (se suele usar en conjunto con la siguiente línea)
    #$mail->SMTPAutoTLS = false;			// Descomentar si se requiere desactivar completamente TLS (sin cifrado)
 
    $mail->setFrom('cedenolopezjonathan27@gmail.com');		// Mail del remitente
    $mail->addAddress($correo);     // Mail del destinatario
//    $fecha=date('y-m-d');
    $mail->isHTML(true);
    $mail->Subject = 'NOTIFICACION CITA ECOMEDIC';  // Asunto del mensaje
    $mail->Body    = "
    <html>
    <head>
      <title></title>
      
    </head>
    <body>
    <form  style='text-align: center;
    padding: 15px 40px;
    border-radius: 10px 10px 0 0;' >
    <h4 style='color: blue; font-size:20px;
   
    font-weight:bold;
    font-style:arial;
    line-height:30px;
    letter-spacing:5px;
   
    text-transform:capitalize;
    text-align:center;
    text-indent:30px;'>USTED TIENE RESEVADA UNA CITA  </h4>
    <h4 style='font-weight:bold;
    font-style:arial;
    line-height:30px;
    letter-spacing:5px;'>  </h4>
    <table border='1'  HEIGHT=25% WIDTH='30%' align='center' >
        <thead >
        <tr style='font-weight:bold;
        font-style:arial;
        line-height:30px;
        letter-spacing:5px;'>
                  <th colspan='2' style='text-align: center;'>Detalles</th>
              </tr>
      <tr >
        <th style='font-weight:bold;
        font-style:arial;
        line-height:30px;
        letter-spacing:5px;'>Nombre del paciente </th>
        <td>$obpaciente </td>
        </tr>
        <tr>
        <th style='font-weight:bold;
        font-style:arial;
        line-height:30px;
        letter-spacing:5px;'>Nombre del medico de la cita </th>
        <td>$obmedico</td>
        </tr>
        <tr>
        <th style='font-weight:bold;
        font-style:arial;
        line-height:30px;
        letter-spacing:5px;'>Recomentacion</th>
        <td>$observacion</td>
        </tr>
        <tr>
        <th style='font-weight:bold;
        font-style:arial;
        line-height:30px;
        letter-spacing:5px;'>Fecha y Hora </th>
        <td>$fecha</td>
        </tr>
     
      </thead>
      
    </table>
    </form>
    </body>
    </html>";    // Contenido del mensaje (acepta HTML)
    $mail->AltBody = 'Este es el contenido del mensaje en texto plano';    // Contenido del mensaje alternativo (texto plano)
 
    $mail->send();
//   echo 'El mensaje ha sido enviado';
    ?>
<script>
    console.log("se envio el mensaje");
</script>
<?php
} catch (Exception $e) {
//     echo 'El mensaje no se ha podido enviar, error: ', $mail->ErrorInfo; 
?>
<script>
    console.log("El mensaje no se ha podido enviar");
</script>
 <?php 
}
} 
?>
