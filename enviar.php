<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $destinatario = "tu-correo@dominio.com";
    $asunto = "Nuevo mensaje de contacto de $nombre";

    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo: $email\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    $cabeceras = "From: $email\r\n";
    $cabeceras .= "Reply-To: $email\r\n";

    if (mail($destinatario, $asunto, $contenido, $cabeceras)) {
        echo "<script>alert('¡Mensaje enviado con éxito!'); window.location.href='contacto.html';</script>";
    } else {
        echo "<script>alert('Hubo un error al enviar el mensaje.'); window.history.back();</script>";
    }
}
?>