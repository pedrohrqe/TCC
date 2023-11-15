<?php
include_once ('conexao.php');

if (isset($_POST['email'], $_POST['senha'], $_POST['telefone'], $_POST['nome'], $_POST['sobrenome'], $_POST['organizacao'], $_POST['g-recaptcha-response'])) {
    $captcha_response = $_POST['g-recaptcha-response'];
    $captcha_secret_key = '6Ler38wnAAAAAMmJ6mR2w1xZ7Ndx1ghu6GaG_lJU'; // Substitua pela sua chave secreta do reCAPTCHA

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$captcha_secret_key&response=$captcha_response");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        echo "<script>alert('Por favor, marque o reCAPTCHA corretamente.');
            window.location.href = 'cadastro.php';
            </script>";
        exit();
    }

    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $_POST['senha'];
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    $telefone = $mysqli->real_escape_string($_POST['telefone']);
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $sobrenome = $mysqli->real_escape_string($_POST['sobrenome']);
    $organizacao = $mysqli->real_escape_string($_POST['organizacao']);

    $email_check_query = "SELECT COUNT(*) as count FROM users WHERE email = '$email'";
    $email_check_result = $mysqli->query($email_check_query);
    $row = $email_check_result->fetch_assoc();

    if ($row['count'] > 0) {
        echo "<script>alert('Já existe um usuário com esse e-mail cadastrado!'); 
            window.location.href = 'cadastro.php';
            </script>";
    } else {
        $sql_code = "INSERT INTO `users` (`nome`, `sobrenome`, `telefone`, `organizacao`, `email`, `senha`) VALUES ('$nome', '$sobrenome', '$telefone', '$organizacao', '$email', '$hash')";

        if ($mysqli->query($sql_code)) {
            echo "<script>alert('Cadastro executado com sucesso!');
                window.location.href = 'login.php';
                </script>"; 
        } else {
            echo "<script>alert('Erro ao cadastrar!');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Aplae</title>
    <link rel="shortcut icon" href="assets/img/logo_simple_verde_1.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_cadastro.css">
    <script src="js/script.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <header></header>
    <main>
        <div class="container-1">
            <div class="container-2">
                <h1 class="titulo">Cadastre-se</h1>
                <form method="POST">
                    <label for="nome">Informe seu nome</label>
                    <input required type="text" class="form__input" name="nome" placeholder="Pedro" minlength="4" autofocus>
                    <label for="sobrenome">Informe seu sobrenome</label>
                    <input required type="text" class="form__input" name="sobrenome" placeholder="Henrique" minlength="4">
                    <label for="telefone">Informe seu telefone celular</label>
                    <input required type="tel" id="telefone" name="telefone" class="form__input"
                        placeholder="(XX) X XXXX-XXXX" required maxlength="16" minlength="4">
                    <label for="organizacao">Informe qual sua organização</label>
                    <input required type="text" placeholder="Unip" class="form__input" name="organizacao" minlength="4" maxlength="50">
                    <label for="usuario">Informe seu e-mail (permitido somente e-mail da UNIP)</label>
                    <input required type="text" name="email" class="form__input" placeholder="seu_user@2023"
                        maxlength="70" minlength="4" id="email">
                    <label for="senha">Informe uma senha</label>
                    <input required type="password" name="senha" class="form__input senha" placeholder="Senha@2023"
                        maxlength="30" id="senha" required minlength="8">
                    <div>
                        <label for="mostrarsenha">Mostrar senha</label>
                        <div class="checkbox-cont">
                            <input type="checkbox" name="mostrarsenha" class="checkbox">
                            <div class="checkmark"></div>
                        </div>
                    </div>
                    <ul>
                        <li>Sua senha deve conter um caractere maiúsculo, um minúsculo e um caractere especial</li>
                        <li>A senha deve ter no mínimo 8 caracteres</li>
                    </ul>
                    <div class="g-recaptcha" data-sitekey="6Ler38wnAAAAALSbw0_1X3gAk98rcnqhkpV66UIQ" style="align-self: center;"></div>
                    <button type="submit" id="submit">Criar conta</button>
                </form>
            </div>
            <div class="container-3">
                <video src="https://i.imgur.com/ktRm9E9.mp4" autoplay muted loop></video>
            </div>
        </div>
    </main>
    <footer></footer>
    <script src="js/script-formulario.js"></script>
</body>

</html>