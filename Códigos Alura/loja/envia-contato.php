<?php
session_start();
$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

require_once("PHPMailerAutoload.php");

$mail = new PHPMailer();
$mail ->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "rigelforneris@gmail.com";
$mail->Password = "newshitnewshit";
$mail->setFrom("rigelforneris@gmail.com", "Rigel Forneris Dos Santos");
$mail->addAddress("frost.gurren@gmail.com");
$mail->Subject = "Teste desse trem aqui";
$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/> mensagem: {$mensagem} </html>");
$mail->AltBody = "de: {$nome}\n email:{$email}\n mensagem: {$mensagem}";
if($mail->send()){
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");
} else {
    $_SESSION["danger"] = "Erro ao enviar mensagem" . $mail->ErrorInfo;
    header("Location: contato.php");
}
die();



