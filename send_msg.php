<?php
$full_name   = $_POST["name"];
$email       = $_POST["email"];
$subject     = $_POST["subject"];
$message     = $_POST["message"];
$dates       = date('Y-m-d H:i:s');
$from = $email;
//$to ="angel_0_6@live.com.mx";
$to = "ografix@gmail.com";
$subject = "Correo de Contacto";
$messageF = $subject . " <br> " . $message . " <br> " . $email;
$headers = "From: ".$to." <".$to.">"  . "\r\n". "Reply-To: ".$to."" . "\r\n" . "X-Mailer: PHP/" . phpversion() . "\r\n" .
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";

mail($to,$subject,$messageF, $headers);
?>