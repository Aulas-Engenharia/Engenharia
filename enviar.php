<?php
date_default_timezone_set('America/Sao_Paulo')
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nome = isset($_POST['nome']) ? $_POST['nome'] : 'Não informado';
$email = isset($_POST['email']) ? $_POST['email'] : 'Não informado';
$ind = isset($_POST['ind']) ? $_POST['ind'] : 'Não informado';
$disciplina = isset($_POST['disciplina']) ? $_POST['disciplina'] : 'Não informado';
$msg = isset($_POST['msg']) ? $_POST['msg'] : 'Não informado';
$data = date('d/m/Y H:i:s');

if($email && $msg){
    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mrjengcivil@gmail.com';
    $mail->Password = 'Jararac@2020';
    $mail->Port = 587;
    
    $mail->setFrom('mrjengcivil@gmail.com');
    $mail->addAddress('mrjengcivil@gmail.com');
    
    $mail->isHTML(true);
    $mail->Subject = 'Contato - Site Aula de Engenharia';
    $mail->Body =  "Nome: {$nome}<br>
                    Email: {$email}<br>
                    Mensaggem: {$msg}<br>
                    Data/hora: {$data}";
    
    if($mail->send()) {
        echo 'Email enviado com sucesso';
    } else {
        echo 'Email nao enviado';
    }
} else{
    echo 'Email não enviado: informar o email e a mensagem';
}


