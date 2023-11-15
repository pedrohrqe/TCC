<?php

session_start();

if (isset($_SESSION['id'])) {
    header("Location: teste.php");
    exit();
}

include_once ('conexao.php');

if (!empty($_POST['email']) && !empty($_POST['senha'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $sql_query = mysqli_query($mysqli, $sql_code);

    if ($sql_query && $sql_query->num_rows === 1) {
        $usuario = mysqli_fetch_assoc($sql_query);
        if (password_verify($senha, $usuario['senha'])) {
            // Armazena as informações do usuário
            $_SESSION['id'] = $usuario['id']; 
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['sobrenome'] = $usuario['sobrenome'];
            $_SESSION['telefone'] = $usuario['telefone'];
            $_SESSION['organizacao'] = $usuario['organizacao'];
            $_SESSION['email'] = $usuario['email'];

            echo "<script>alert('Bem vindo!');
            window.location.href = 'teste.php';
            </script>";
            exit();
        } else {
            echo "<script>alert('E-mail ou senha incorretos!');</script>";
        }
    } else {
        echo "<script>alert('E-mail ou senha incorretos!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aplae</title>
    <link rel="shortcut icon" href="assets/img/logo_simple_verde_1.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_login.css">
    <script src="js/script.js"></script>
</head>

<body>
    <header></header>
    <main>
        <div class="container-1">
            <div class="container-2">
                <video src="https://i.imgur.com/ktRm9E9.mp4" autoplay muted loop></video>
            </div>
            <div class="container-3">
                <h1 class="titulo">ENTRAR</h1>
                <form action="" method="post">
                    <label for="usuario">E-mail</label>
                    <input type="text" name="email" class="form__input" placeholder="seu_user@2023" maxlength="70"
                        required autofocus>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form__input senha" placeholder="Senha@2023" maxlength="30"
                        id="senha" required>
                    <div>
                        <label for="mostrarsenha">Mostrar senha</label>
                        <div class="checkbox-cont">
                            <input type="checkbox" name="mostrarsenha" class="checkbox">
                            <div class="checkmark"></div>
                        </div>
                    </div>
                    <button type="submit" id="submit">Entrar</button>
                </form>
                <div class="separador"></div>
                <div class="botoes">
                    <a href="resetsenha.php">Esqueci minha senha</a>
                    <a href="cadastro.php">Cadastre-se</a>
                </div>
            </div>
        </div>
    </main>
    <footer></footer>
    <script src="js/script-formulario.js"></script>
</body>

</html>