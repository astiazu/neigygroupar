<?php
require 'class.phpmailer.php';
require 'class.smtp.php';

// Verificar si se recibieron todos los campos
if (!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["asunto"]) || !isset($_POST["mensaje"])) {
    die("Es necesario completar todos los datos del formulario.");
}

$name = $_POST["name"];
$email = $_POST["email"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];

// Configuración de PHPMailer
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = 'smtp.hostinger.com'; // Servidor SMTP de Hostinger
$mail->SMTPAuth = true;
$mail->Username = 'info@neigygroup.org'; // Tu correo en Hostinger
$mail->Password = 'Admin1234@'; // Tu contraseña de correo (asegúrate de proteger este archivo)
$mail->Port = 587; // Puerto SMTP para TLS
$mail->SMTPSecure = 'tls'; // o 'ssl' si se usa el puerto 465

$mail->From = $email;
$mail->FromName = $name;
$mail->AddAddress('info@neigygroup.org'); // Destinatario (tu correo)

$mail->IsHTML(true);
$mail->Subject = $asunto;
$mail->Body = nl2br($mensaje); // Convierte los saltos de línea en <br>
$mail->AltBody = $mensaje; // Texto plano

// Enviar el correo
if ($mail->Send()) {
    echo "<script type='text/javascript'>
        alert('El correo fue enviado correctamente.');
        window.location.href='index.html'; // Redirige de vuelta a tu página principal
    </script>";
} else {
    echo "Error al enviar el correo: " . $mail->ErrorInfo;
}
?>
