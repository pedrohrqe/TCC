<?php

include_once ('protect.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste já - Aplae</title>
    <link rel="shortcut icon" href="assets/img/logo_simple_verde_1.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_teste.css">
    <script src="js/script.js"></script>
</head>

<body>
    <header></header>
    <main>
        <div class="container-1">
            <h1>Teste já!</h1>
            <p>Preencha as informações para fazer download da ferramenta</p>
        </div>
        <div class="container-2">
            <div class="container-3">
                <h1>Selecione a opção para download:</h1>
                <div class="radio-group">
                    <input class="radio-input" name="radio-group" id="radio1" type="radio" checked>
                    <label class="radio-label" for="radio1">
                        <img src="assets/icon/software.png" alt="">
                        <p>Ferramenta</p>
                    </label>
                    <input class="radio-input" name="radio-group" id="radio2" type="radio">
                    <label class="radio-label" for="radio2">
                        <img src="assets/icon/database.png" alt="">
                        <p>Dados</p>
                    </label>
                    <input class="radio-input" name="radio-group" id="radio3" type="radio">
                    <label class="radio-label" for="radio3">
                        <img src="assets/icon/sw+dtb.png" alt="">
                        <p>Ferramenta + Dados</p>
                    </label>
                </div>
                <a href="download/FerramentaGrafica.xlsm" id="btn__baixar">Baixar</a>
            </div>
            <div class="container-4">
                <h1>Informações de usuário</h1>
                <div class="container-5">
                    <p id="nome">Nome: <?php echo $_SESSION['nome'] ?></p>
                    <p id="sobrenome">Sobrenome: <?php echo $_SESSION['sobrenome'] ?></p>
                    <p id="contato">Telefone: <?php echo $_SESSION['telefone'] ?></p>
                    <p id="Organização">Organização: <?php echo $_SESSION['organizacao'] ?></p>
                    <p id="email">Email: <?php echo $_SESSION['email'] ?></p>
                    <p> Senha: *************</p>
                </div>
                <hr style="margin: 0px;">
                <a href="alterar.php">Alterar dados</a>
                <a href="sair.php">Sair</a>
            </div>
        </div>
    </main>
    <footer></footer>
    <script src="js/script-opcoes-de-download.js"></script>
</body>

</html>