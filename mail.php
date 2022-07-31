<?php

if(isset( $_POST['email']))
$email = $_POST['email'];

if(isset( $_POST['telefone']))
$phone = $_POST['telefone'];


if(isset( $_POST['mensagem']))
$message = $_POST['mensagem'];


if(isset( $_FILES['arquivo']))
$arquivo = $_FILES['arquivo'];

/*

$subject = "Contato site";

$content="From: $name \nEmail: $email \nMessage: $message";
$recipient = ""; // email da empresa ()
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");

*/

$mensagem = "Número para contato: ".$phone."\nMensagem: ".$message;

require_once('./PHPMailer-master/src/PHPMailer.php/class.phpmailer.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = new PHPMailer();
$email->SetFrom($email);
$email->Subject   = 'Contato Site';
$email->Body      = $mensagem;
$email->AddAddress( 'destinationaddress@example.com' ); // deve ser o email da empresa

$file_to_attach = $_FILES['arquivo']; //'PATH_OF_YOUR_FILE_HERE';

$email->AddAttachment( $arquivo , $_FILES['arquivo']['name']); //$email->AddAttachment( $file_to_attach , 'NameOfFile.pdf' );

if( $email->Send() ){
    header('index.php?page=colabore&status=sucesso');
}else{
    header('index.php?page=colabore&status=erro');
}

?>