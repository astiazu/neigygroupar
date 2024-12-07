<?php
require("class.phpmailer.php");
require("class.smtp.php");

// Imprimir las variables para verificar su contenido
echo "<pre>";
print_r($_POST);
print($estadoEnvio);
echo "</pre>";


// Verificar si el formulario se envió correctamente
if (!isset($_POST["email"]) || !isset($_POST["name"]) || !isset($_POST["asunto"]) || !isset($_POST["mensaje"])) {
    die("Es necesario completar todos los datos del formulario.");
}

$name = $_POST["name"];
$email = $_POST["email"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];

// Configuración SMTP
$smtpHost = "smtp.hostinger.com"; //"c2480282.ferozo.com";
$smtpUsuario = "info@neigygroup.org";
$smtpClave = "Admin1234@";
$emailDestino = "info@neigygroup.org";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 587; //465;
$mail->SMTPSecure = 'TLS';
$mail->IsHTML(true);
$mail->CharSet = "utf-8";

$mail->Host = $smtpHost;
$mail->Username = $smtpUsuario;
$mail->Password = $smtpClave;

$mail->From = $email;
$mail->FromName = $name;
$mail->AddAddress($emailDestino);

$mail->Subject = "Solicitud de Suscripción";
$mensajeHtml = nl2br($mensaje);
$mail->Body = "{$mensajeHtml}<br><br>Solicitud de suscripción a las novedades de su página y empresa.<br>Enviado desde la página web.";
$mail->AltBody = "{$mensaje}\n\nFormulario de ejemplo By DonWeb";

// Enviar el correo
echo "<pre>";
print($mail->Send());
echo "</pre>";


if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo; // Imprime el error específico de PHPMailer
} else {
    echo "<script type='text/javascript'>
        alert('El correo fue enviado correctamente a: $emailDestino');
        window.location.href='http://www.neigygroup.ar';
        </script>";
}

echo "<pre>";
print($estadoEnvio);
echo "</pre>";
die();

$estadoEnvio = $mail->Send();

if ($estadoEnvio) {
    echo "<script type='text/javascript'>
        alert('El correo fue enviado correctamente a: $emailDestino');
        window.location.href='http://www.neigygroup.ar';
        </script>";
} else {
    echo "<script type='text/javascript'>
        alert('(1) Ocurrió un error en el envío del correo. Envíe el mensaje desde su correo a $emailDestino');
        window.location.href='http://www.neigygroup.ar';
        </script>";
}

// Enviar segundo correo a otro destinatario
$emailDestino2 = "astiazu@gmail.com";
$mail->ClearAllRecipients();
$mail->AddAddress($emailDestino2);
$estadoEnvio2 = $mail->Send();

if ($estadoEnvio2) {
    echo "<script type='text/javascript'>
        alert('El correo fue enviado correctamente a: $emailDestino2');
        window.location.href='http://www.neigygroup.ar';
        </script>";
} else {
    echo "<script type='text/javascript'>
        alert('Ocurrió un error en el envío del correo a: $emailDestino2');
        window.location.href='http://www.neigygroup.ar';
        </script>";
}

?>
