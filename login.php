<?php
include('conexao.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "Preencha o email";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha a senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM users WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: teste.php");

        } else {
            echo "<script>alert('E-mail ou senha incorretos!');</script>";
        }
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
                <video src="assets/video/video__home.mp4" autoplay muted loop></video>
            </div>
            <div class="container-3">
                <h1 class="titulo">Login</h1>
                <form action="" method="post">
                    <label for="usuario">E-mail</label>
                    <input type="text" name="email" class="form__input" placeholder="seu_user@2023" maxlength="70"
                        required>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form__input" placeholder="Senha@2023" maxlength="30"
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
                    <a href="cadastro.php">Criar Conta</a>
                </div>
            </div>
        </div>
    </main>
    <footer></footer>
    <script src="js/script-login.js"></script>
</body>

</html>