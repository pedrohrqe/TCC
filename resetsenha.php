<?php

include('email.php');

if (isset($_POST['email'])) {
    include('conexao.php');

    $email = $mysqli->real_escape_string($_POST['email']);

    $sql_code = "SELECT id, nome, sobrenome, email FROM users WHERE email = '$email' LIMIT 1";
    $sql_query = mysqli_query($mysqli, $sql_code);

    if ($sql_query) {
        $usuario = mysqli_fetch_assoc($sql_query);
        $usuario_id = $usuario['id'];
        $usuario_email = $usuario['email'];
        $usuario_nome = $usuario['nome'];
        $usuario_sobrenome = $usuario['sobrenome'];

        $chave = password_hash($usuario_id, PASSWORD_DEFAULT);

        $link = "http://localhost/site/updatesenha.php?chave=$chave";

        $sql_code2 = "UPDATE users SET chave = '$chave' WHERE id = $usuario_id";
        $sql_query2 = mysqli_query($mysqli, $sql_code2);

        if ($sql_query2) {
            enviarEmail($usuario_email, $usuario_nome, $usuario_sobrenome, $link);
        } else {
            echo "<script>alert('Falha ao solicitar redefinição! Verifique o e-mail e tente novamente.');</script>";
        }
    } else {
        echo "<script>alert('Falha ao solicitar redefinição! Verifique o e-mail e tente novamente.');</script>";
    }

    mysqli_close($mysqli); // Fecha a conexão com o banco de dados
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar senha - Aplae</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_resetsenha.css">
</head>

<body>
    <header></header>
    <main>
        <div class="container-1">
            <h1>Recuperar senha</h1>
        </div>
        <div class="container-2">
            <form method="POST">
                <label for="email">Informe seu e-mail:</label>
                <input type="email" name="email" id="email">
                <button type="submit">Enviar e-mail de recuperação</button>
            </form>
        </div>
    </main>
    <footer></footer>
    <script src="js/script.js"></script>
</body>

</html>