<?php

$chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);

if (isset($_POST['btn__senha'])) {
    $chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);

    if (empty($_POST['senha'])) {
        echo "<script>alert('Preencha a nova senha!');</script>";

    } else {
        include ('conexao.php');

        $senha = $_POST['senha'];
        $hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql_code = "UPDATE users SET senha = '$hash' WHERE chave = '$chave'";
        $sql_query = mysqli_query($mysqli, $sql_code);

        if ($sql_query && mysqli_affected_rows($mysqli) > 0) {
            echo "<script>alert('Senha atualizada com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao atualizar senha!');</script>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar senha - Aplae</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_updatesenha.css">
</head>

<body>
    <header></header>
    <main>
        <div class="container-1">
            <h1>Atualizar senha</h1>
        </div>
        <div class="container-2">
            <form method="POST">
                <label for="senha">Informe a nova senha:</label>
                <input type="password" name="senha" class="form__input senha" placeholder="Senha@2023" maxlength="30"
                    id="senha" required>
                    <div class="checkbox-1-cont">
                        <input type="checkbox" name="mostrarsenha" class="checkbox-1">
                        <div class="checkmark"></div>
                    </div>
                <button type="submit" name="btn__senha">Atualizar senha</button>
            </form>
        </div>
    </main>
    <footer></footer>
    <script src="js/script-cadastro.js"></script>
    <script src="js/script.js"></script>
</body>

</html>