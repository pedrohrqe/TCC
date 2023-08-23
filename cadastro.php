<?php
include('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['telefone']) && isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['organizacao'])) {

    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    $telefone = $mysqli->real_escape_string($_POST['telefone']);
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $sobrenome = $mysqli->real_escape_string($_POST['sobrenome']);
    $organizacao = $mysqli->real_escape_string($_POST['organizacao']);

    // Verificar se o email já está cadastrado
    $email_check_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $email_check_result = $mysqli->query($email_check_query);

    if ($email_check_result && $email_check_result->num_rows > 0) {
        echo "<script>alert('Já existe um usuário com esse e-mail cadastrado!'); 
            window.location.href = 'cadastro.php';
            </script>";
    } else {
        $sql_code = "INSERT INTO `users` (`id`, `nome`, `sobrenome`, `telefone`, `organizacao`, `email`, `senha`) VALUES (NULL, '$nome', '$sobrenome', '$telefone', '$organizacao', '$email', '$senha')";

        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->connect_error);

        if ($sql_query) {
            echo "<script>alert('Cadastro executado com sucesso!');
                window.location.href = 'teste.php';
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
</head>

<body>
    <header></header>
    <main>
        <div class="container-1">
            <div class="container-2">
                <h1 class="titulo">Cadastre-se</h1>
                <form method="POST">
                    <label for="nome">Informe seu nome</label>
                    <input required type="text" class="form__input" name="nome" placeholder="Pedro" minlength="4">
                    <label for="sobrenome">Informe seu sobrenome</label>
                    <input required type="text" class="form__input" name="sobrenome" placeholder="Henrique" minlength="4">
                    <label for="telefone">Informe seu telefone celular</label>
                    <input required type="tel" id="telefone" name="telefone" class="form__input"
                        placeholder="(XX) X XXXX-XXXX" required maxlength="16" minlength="4">
                    <label for="organizacao">Informe qual sua organização</label>
                    <input required type="text" placeholder="Unip" class="form__input" name="organizacao" minlength="4">
                    <label for="usuario">Informe seu e-mail</label>
                    <input required type="text" name="email" class="form__input" placeholder="seu_user@2023"
                        maxlength="70" minlength="4">
                    <label for="senha">Informe uma senha</label>
                    <input required type="password" name="senha" class="form__input" placeholder="Senha@2023"
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
                    <button type="submit" id="submit">Criar conta</button>
                </form>
            </div>
            <div class="container-3">
                <video src="assets/video/video__home.mp4" autoplay muted loop></video>
            </div>
        </div>
    </main>
    <footer></footer>
    <script src="js/script-login.js"></script>
    <script src="js/script-contatenos.js"></script>
    <script src="js/script-cadastro.js"></script>
</body>

</html>