<?php


require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ( !isset($_POST["email"]) || !isset($_POST["nOrdenDeCompra"]) || !isset($_POST["estado"])) {
    die ("Es necesario completar todos los datos del formulario");
}


$email = $_POST["email"];

$nOrdenDeCompra = $_POST["nOrdenDeCompra"];

$estado = $_POST["estado"];


$destinatario = $email;


// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "mail.madama-alambrados.com.ar";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "ventas@madama-alambrados.com.ar";  // Mi cuenta de correo
$smtpClave = "Argentina1986";  // Mi contraseña




$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 587; 
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";

// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;


$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($destinatario); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "Formulario desde el Sitio Web"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "
<html> 

<body> 

<h1>Estado Orden de Compra</h1>

<p>El pedido de orden de compra fue realizado con exito. Puede comunicarce con nosotros por Whatsapp para consultar la aceptacion, esperar el mail de confirmacion o acercarce a una de nuestras sucursales para confirmar junto con el numero de orden y terminar la operacion.</p>

<p>Estado: {$estado}</p>

<p>Numero Orden De Compra: {$nOrdenDeCompra}</p>

<a href='http://madama-alambrados.com.ar/''>Madama Alambrados</a>

</body> 

</html>

<br />"; // Texto del email en formato HTML
//$mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    echo "El correo fue enviado correctamente.";
} else {
    echo "Ocurrió un error inesperado.";
}


?>

