<?php
	require("../includes/mailer/class.smtp.php");
	require("../includes/mailer/class.phpmailer.php");
									$mail = new PHPMailer();
									$table='
											<p>hola</p>
									';
									//Luego tenemos que iniciar la validación por SMTP:
									$mail->IsSMTP();
									$mail->SMTPAuth = true;
									$mail->Host = "mail.xangos.com.mx"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
									$mail->Username = "web@xangos.com.mx"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
									$mail->Password = "Xangos123"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
									$mail->Port = 26; // Puerto de conexión al servidor de envio. 
									$mail->From = "web@xangos.com.mx"; // A RELLENARDesde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
									$mail->FromName = ""; //A RELLENAR Nombre a mostrar del remitente. 
									$mail->AddAddress("info@sectornetcancun.com"); // Esta es la dirección a donde enviamos 
									$mail->IsHTML(true); // El correo se envía como HTML 
									$mail->Subject = "Tu Voucher de Reserva en Xangos Tours esta listo"; // Este es el titulo del email. 
									
									$mail->Body = $table; 
									$exito = $mail->Send(); 
									if($exito){ echo "El correo fue enviado correctamente."; }else{ echo  "Mailer Error: " . $mail->ErrorInfo; } 
					
?>