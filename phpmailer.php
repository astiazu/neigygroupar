< ?php
   requiere 'vendor/autoload.php' ;
   utilice PHPMailer\PHPMailer\PHPMailer;
   $mail = nuevo PHPMailer;
   $mail- > isSMTP () ;
   $mail- > SMTPDebug = 2 ;
   $mail- > Host = 'smtp.hostinger.com' ;
   $mail- > Puerto = 587 ;
   $mail- > SMTPAuth = verdadero ;
   $mail- > Nombre de usuario = 'info@neigygroup.org' ;
   $mail- > Contraseña = 'Admin1234@' ;
   $mail- > setFrom ( 'info@neigygroup.org' , 'Su nombre' ) ;
   $mail- > addReplyTo ( 'info@neigygroup.org' , 'Su nombre' ) ;
   $mail- > addAddress ( 'info@neigygroup.org' , 'Nombre del destinatario' ) ;
   $mail- > Asunto = 'Comprobando si PHPMailer funciona' ;
   $mail- > msgHTML ( archivo_obtener_contenido ( 'mensaje.html' ) , __DIR__ ) ;
   $mail- > Body = 'Este es sólo el cuerpo de un mensaje de texto simple' ;
   //$correo->addAttachment('attachment.txt');
   si ( !$mail- > enviar ()) {  
       echo 'Error de correo: ' . $mail- > ErrorInfo;
   } demás {  
       echo 'El mensaje de correo electrónico fue enviado.' ;
   }
? >