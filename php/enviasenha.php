<?php

include 'conexao.php';
 //inclue a conexao.php
 //inicia a sessão 

$nome = $_POST['nome'];
$email = $_POST['email'];


if (isset($_POST['email'])) {
    include 'header.php';    
}
 //verifica se esta ""vazio"", se estiver ele redireciona para logar.php
require_once 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once 'vendor/phpmailer/phpmailer/src/SMTP.php';
require_once 'vendor/phpmailer/phpmailer/src/Exception.php';
//adiciona e utiliza os arquivos do PHP Mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
//adiciona e utiliza os arquivos do PHP Mailer
$email = $_POST['email'];
//Pegar a variável no metodo post e armazena na variavel $email
if (empty($email)) {
    echo "<script>
    alert('Campo senha vazio!');
    setTimeout(function() {
        window.location.href = 'contato.html';
    }, 0.5); // Aguarda 2 segundos antes do redirecionamento
</script>";
    $pagina = 'home';    
    die(); 
}
//Verifica se a variavel email esta vazia
/*$sql = $conn->prepare("SELECT * FROM usuario WHERE email = ? LIMIT 1");
$sql->bind_param("s", $email);
//verifica o email e armazena na variavel
$sql->execute();

$resultado = $sql->get_result();
$linha = $resultado->fetch_assoc();

if (empty($linha)) {
    
    echo "<script>
    alert('E-mail não registrado!');
    setTimeout(function() {
        window.location.href = 'index.php?pagina=forgot';
    }, 0.5); // Aguarda 2 segundos antes do redirecionamento
</script>";
    $pagina =  'home';
    die(); 
} 
//se o que estiver na variavel não existir no banco de dados é mandado um erro
else {

        
    $novasenha = substr(md5(time()), 0,6);
    $ncripo = md5($novasenha);
//encripta nova senha em md5
    $sql = "UPDATE usuario SET senha = '$ncripo' WHERE email = '$email'";
    mysqli_query($conn,$sql) or die ("Erro ao cadastrar");
    mysqli_close($conn);
//atualiza o banco de dados com a nova senha criptografada no email que o usuário digitou 
    */
    $msn = "<html><h3>Olá</h3>";
    $msn .= "<div class='container'><p>Recebemos seu pedido de lembrete de senha.</p><br><br>";
    $msn .= "<p>Suas credenciais são:<p><br>";
    $msn .= "<p>E-mail: ".$linha['email'].";</p><br>";
    $msn .= "<p>Nova Senha: ".$novasenha.".</p></div></html>";

    $msn1 = "Olá \n\n";
    $msn1 .= "Recebemos seu pedido de lembrete de senha.\n\n";
    $msn1 .= "Suas credenciais são:\n";
    $msn1 .= "E-mail: ".$linha['email'].";\n";
    $msn1 .= "Senha: ".$novasenha.";\n";
//Texto que será exibido no email do usuario

    $username = 'marceloc.lima349@gmail.com';
    $password = 'qwloiiqbifjmoplr';
    $assunto = utf8_decode('REDEFINIÇÃO DE SENHA');
//cabeçalho do email enviado
    $mail = new PHPMailer(true);
    $mail->Charset = "UTF-8";
    $mail->Debugoutput = 'html';
    $mail->setLanguage('pt');              
    $mail->isSMTP();                               
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;             
    $mail->Username = $username;
    $mail->Password = $password;     
    $mail->SMTPSecure = 'ssl';               
    $mail->Port = 465;  
    $mail->setFrom($username);
    $mail->addAddress($email);  
    $mail->Subject = $assunto;
    $mail->msgHTML(utf8_decode($msn));
    $mail->AltBody = utf8_decode($msn1);
//configuração do servidor
    if(!$mail->send()) {
        echo "<script>
        alert('Erro servidor');
        setTimeout(function() {
            window.location.href = 'index.php?pagina=forgot';
        }, 0.5); // Aguarda 2 segundos antes do redirecionamento
    </script>";
    } 
    //se der erro no servidor exibe uma mensagem de erro
    else {
        echo "<script>
        alert('Senha redefinida com sucesso! Cheque a caixa de entrada do seu e-mail');
        setTimeout(function() {
            window.location.href = 'index.php?pagina=login';
        }, 0.5); // Aguarda 2 segundos antes do redirecionamento
    </script>";

    }
}
 //se jnão der erro no servidor, envia email com a nova senha com sucesso

 
exit();
 //Fecha as funções
?>