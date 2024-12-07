<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Verificar si se recibieron todos los campos del formulario
if (!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["asunto"]) || !isset($_POST["mensaje"])) {
    die("Es necesario completar todos los datos del formulario.");
}

$name = $_POST["name"];
$email = $_POST["email"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];

// Dirección de envío y configuración del correo
$from = "info@neigygroup.org";
$to = "neigygroup@gmail.com"; // Tu correo en Hostinger

// Construir el mensaje en formato HTML
$message = "
<html>
<head>
    <title>$asunto</title>
</head>
<body>
    <p><strong>Nombre:</strong> $name</p>
    <p><strong>Correo Electrónico:</strong> $email</p>
    <p><strong>Mensaje:</strong><br>" . nl2br(htmlspecialchars($mensaje)) . "</p>
</body>
</html>
";

// Encabezados para el correo
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From:" . $from . "\r\n";

// Enviar el correo y verificar el estado del envío
if (mail($to, $asunto, $message, $headers)) {
    // echo "El mensaje fue enviado correctamente.";
    echo "<script type='text/javascript'>
        alert('El correo fue enviado correctamente.');
        window.location.href='index.html'; // Redirige de vuelta a tu página principal
    </script>";
} else {
    echo "Error: El mensaje no pudo ser enviado.";
}
?>