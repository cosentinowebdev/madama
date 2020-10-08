<?php 
	/**
	 * 
	 */
	class correo
	{
		
		function __construct()
		{
			/*
			echo "The email message was sent.";
			    ini_set( 'display_errors', 1 );
			    error_reporting( E_ALL );
			    echo "The email message was sent.";
			    $from = "
ventas@madama-alambrados.com.ar";
			    $to = $mail;
			    $subject = "numero de orden :".$nOrdenDeCompra;
			    $message = "numero de orden :".$nOrdenDeCompra;
			    $headers = "From:" . $from;
			    mail($to,$subject,$message, $headers);
			    echo "The email message was sent.";
			    */
		}
		public function enviarPeticion($mail,$nOrdenDeCompra){

            require("class.phpmailer.php");
			require("class.smtp.php");


			$email = $mail;

			$nOrdenDeCompra = $nOrdenDeCompra;

			$estado = "En Proceso";


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
			$mail->FromName = "Madama Alambrados Ventas";
			$mail->AddAddress($destinatario); // Esta es la dirección a donde enviamos los datos del formulario

			$mail->Subject = "Pedido de Orden de Compra "; // Este es el titulo del email.
			$mensajeHtml = nl2br($mensaje);
			$mail->Body = "
			<html> 

			<body> 

			<h1>Estado Orden de Compra</h1>

			<p>El pedido de orden de compra fue realizado con exito. Puede comunicarce con nosotros por Whatsapp para consultar la aceptacion, esperar el mail de confirmacion o acercarce a una de nuestras sucursales para confirmar junto con el numero de orden y terminar la operacion.</p>

			<p>Estado: {$estado}</p>

			<p><b>Numero Orden De Compra: {$nOrdenDeCompra}</b></p>
			
			<a target='_blank' href='https://api.whatsapp.com/send?phone=541136622633&text=Realice%20la%20orden%20de%20compra%20n%C2%B0%20{$nOrdenDeCompra}%20y%20quisiera%20saber%20el%20estado'>Confirmar Pedido de Compra por Whatsapp</a>

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

		}
		public function enviarEstado($mail,$nOrdenDeCompra,$estado){

            require("class.phpmailer.php");
			require("class.smtp.php");


			$email = $mail;

			$nOrdenDeCompra = $nOrdenDeCompra;

			$estado = $estado;


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

			$mail->Subject = "Pedido de Orden de Compra "; // Este es el titulo del email.
			$mensajeHtml = nl2br($mensaje);
			$mail->Body = "
			<html> 

			<body> 

			<h1>Actualizacion en el Estado Orden de Compra</h1>

			<p>Se ha realizado un cambio en el estado de su compra.</p>

			<p>Estado: {$estado}</p>

			<p><b>Numero Orden De Compra: {$nOrdenDeCompra}</b></p>
			
			<a target='_blank' href='https://api.whatsapp.com/send?phone=541136622633&text=Realice%20la%20orden%20de%20compra%20n%C2%B0%20{$nOrdenDeCompra}%20y%20quisiera%20saber%20el%20estado'>Confirmar Pedido de Compra por Whatsapp</a>

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
			    echo "<p class='alert alert-success'>El correo fue enviado correctamente.</p>";
			} else {
			    echo "<p class='alert alert-danger'>Ocurrió un error inesperado, puede ser que este mal el correo.</p>";
			}

		}
		public function enviarConfirmacion($mail,$nOrdenDeCompra){
			echo "The email message was sent.";
			    ini_set( 'display_errors', 1 );
			    error_reporting( E_ALL );
			    echo "The email message was sent.";
			    $from = "
ventas@madama-alambrados.com.ar";
			    $to = $mail;
			    $subject = "numero de orden :".$nOrdenDeCompra;
			    $message = "numero de orden :".$nOrdenDeCompra;
			    $headers = "From:" . $from;
			    mail($to,$subject,$message, $headers);
			    echo "The email message was sent.";

		}

	}
?>