<?php

include ('conexao.php');

require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';
require_once 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviarEmail($destinatario, $nome, $sobrenome, $linkredefinicao) {
    // Lê o conteúdo do arquivo mensagem.html
    $mensagem = file_get_contents('email.html');

    // Substitui as variáveis no conteúdo do e-mail
    $mensagem = str_replace('{{NOME}}', $nome, $mensagem);
    $mensagem = str_replace('{{SOBRENOME}}', $sobrenome, $mensagem);
    $mensagem = str_replace('{{LINK_REDEFINICAO}}', $linkredefinicao, $mensagem);

    $mail = new PHPMailer(true);

    $username = 'aplae.br@gmail.com';
    $password = 'qljmuzmxuvzywzde';

    try {
        // Configuração do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Substitua pelo seu servidor SMTP
        $mail->SMTPAuth = true;

        $mail->Username = $username; // Substitua pelo seu e-mail
        $mail->Password = $password; // Substitua pela sua senha

        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Remetente e destinatário
        $mail->setFrom($username);
        $mail->addAddress($destinatario);

        // Conteúdo do e-mail
        $mail->Subject = 'Redefinir senha - Aplae';
        $mail->Body = $mensagem;
        $mail->isHTML(true); // Define que o conteúdo é HTML

        $mail->send();
        echo "<script>alert('Enviado e-mail de redefinição');
        window.location.href = 'login.php'</script>";
        
    } catch (Exception $e) {
        echo "<script>alert('Falha ao redefinir: " . $mail->ErrorInfo . "');</script>";
    }

    exit();
}
?>