<?php

include_once ('protect.php');
include_once ('sessaoativa.php');

if (isset($_POST['btn_nome'])) {
    include('conexao.php'); // Verifica se o botão de envio foi clicado

    // Verificar se os campos nome e sobrenome foram preenchidos
    if (empty($_POST['nome']) || empty($_POST['sobrenome'])) {
        echo "<script>alert('Por favor, preencha todos os campos!');
            window.location.href = 'teste.php';
            </script>";
        exit; // Encerrar o script após exibir a mensagem
    }

    $novoNome = $mysqli->real_escape_string($_POST['nome']); // Evitar SQL Injection
    $novoSobrenome = $mysqli->real_escape_string($_POST['sobrenome']); // Evitar SQL Injection

    // Executar a query para atualizar o nome e sobrenome do usuário
    $query = "UPDATE users SET nome = '$novoNome', sobrenome = '$novoSobrenome' WHERE id = " . $_SESSION['id']; // Ajuste a tabela e as colunas de acordo com sua estrutura

    // Executar a query e verificar o resultado
    if ($mysqli->query($query)) {
        echo "<script>alert('Nome alterado com sucesso!');
            window.location.href = 'teste.php';
            </script>";
        $_SESSION['nome'] = $novoNome;
        $_SESSION['sobrenome'] = $novoSobrenome;
    } else {
        echo "<script>alert('Erro ao alterar nome!');
            window.location.href = 'teste.php';
            </script>";
    }

    $mysqli->close();
}


if (isset($_POST['btn_contato'])) {
    include('conexao.php'); // Verifica se o botão de envio foi clicado

    // Verificar se o campo telefone foi preenchido
    if (empty($_POST['telefone'])) {
        echo "<script>alert('Por favor, preencha o campo de telefone!');
            window.location.href = 'teste.php';
            </script>";
        exit; // Encerrar o script após exibir a mensagem
    }

    $novoTelefone = $mysqli->real_escape_string($_POST['telefone']); // Evitar SQL Injection

    // Executar a query para atualizar o telefone do usuário
    $query = "UPDATE users SET telefone = '$novoTelefone' WHERE id = " . $_SESSION['id']; // Ajuste a tabela e as colunas de acordo com sua estrutura

    // Executar a query e verificar o resultado
    if ($mysqli->query($query)) {
        echo "<script>alert('Telefone alterado com sucesso!');
            window.location.href = 'teste.php';
            </script>";
        $_SESSION['telefone'] = $novoTelefone;
    } else {
        echo "<script>alert('Erro ao alterar telefone!');
            window.location.href = 'teste.php';
            </script>";
    }

    $mysqli->close();
}

if (isset($_POST['btn_organizacao'])) {
    include('conexao.php'); // Verifica se o botão de envio foi clicado

    // Verificar se o campo organização foi preenchido
    if (empty($_POST['organizacao'])) {
        echo "<script>alert('Por favor, preencha o campo de organização!');
            window.location.href = 'teste.php';
            </script>";
        exit; // Encerrar o script após exibir a mensagem
    }

    $novaOrganizacao = $mysqli->real_escape_string($_POST['organizacao']); // Evitar SQL Injection

    // Executar a query para atualizar a organização do usuário
    $query = "UPDATE users SET organizacao = '$novaOrganizacao' WHERE id = " . $_SESSION['id']; // Ajuste a tabela e as colunas de acordo com sua estrutura

    // Executar a query e verificar o resultado
    if ($mysqli->query($query)) {
        echo "<script>alert('Organização alterada com sucesso!');
            window.location.href = 'teste.php';
            </script>";
        $_SESSION['organizacao'] = $novaOrganizacao;
    } else {
        echo "<script>alert('Erro ao alterar Organização!');
            window.location.href = 'teste.php';
            </script>";
    }

    $mysqli->close();
}

if (isset($_POST['btn_email'])) {
    include('conexao.php'); // Verifica se o botão de envio foi clicado

    // Verificar se o campo email foi preenchido e se é um email válido
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Por favor, insira um e-mail válido!');
            window.location.href = 'teste.php';
            </script>";
        exit; // Encerrar o script após exibir a mensagem
    }

    $novoEmail = $mysqli->real_escape_string($_POST['email']); // Evitar SQL Injection

    // Executar a query para atualizar o email do usuário
    $query = "UPDATE users SET email = '$novoEmail' WHERE id = " . $_SESSION['id']; // Ajuste a tabela e as colunas de acordo com sua estrutura

    // Executar a query e verificar o resultado
    if ($mysqli->query($query)) {
        echo "<script>alert('E-mail alterado com sucesso!');
            window.location.href = 'teste.php';
            </script>";
        $_SESSION['email'] = $novoEmail;
    } else {
        echo "<script>alert('Erro ao alterar e-mail!');
            window.location.href = 'teste.php';
            </script>";
    }

    $mysqli->close();
}

if (isset($_POST['btn_senha'])) {
    include('conexao.php');

    $senhaAnterior = $_POST['senha-anterior'];
    $senha1 = $_POST['senha-atual-1'];
    $senha2 = $_POST['senha-atual-2'];

    // Verificar se as senhas não estão vazias e se senha1 é igual a senha2
    if (empty($senhaAnterior) || empty($senha1) || empty($senha2) || $senha1 !== $senha2) {
        echo "<script>alert('Por favor, preencha as senhas corretamente!');
            window.location.href = 'teste.php';
            </script>";
        exit; // Encerrar o script após exibir a mensagem
    }

    $sql_code = "SELECT * FROM users WHERE id = " . $_SESSION['id'];
    $sql_query = mysqli_query($mysqli, $sql_code);

    $usuario = mysqli_fetch_assoc($sql_query);

    // Verificar se a senha anterior está correta usando password_verify
    if (password_verify($senhaAnterior, $usuario['senha'])) {
        $senhaHash = password_hash($senha1, PASSWORD_DEFAULT);

        $passwordQuery = "UPDATE users SET senha = '$senhaHash' WHERE id = " . $_SESSION['id'];

        if ($mysqli->query($passwordQuery)) {
            echo "<script>alert('Senha alterada com sucesso!');
                window.location.href = 'teste.php';
                </script>";
        } else {
            echo "<script>alert('Erro ao alterar senha!');
                window.location.href = 'teste.php';
                </script>";
        }
    } else {
        echo "<script>alert('Senha anterior incorreta!');
            window.location.href = 'teste.php';
            </script>";
    }

    $mysqli->close();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar dados - Aplae</title>
    <link rel="shortcut icon" href="assets/img/logo_simple_verde_1.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_alterar.css">
    <script src="js/script.js"></script>
</head>

<body>
    <header></header>
    <main>
        <div class="container-1">
            <h1>Alterar dados cadastrais</h1>
        </div>
        <div class="container-2">
            <h1>Realizar alteração de:</h1>
            <select name="" id="select">
                <option value="form__nome">Nome</option>
                <option value="form__contato">Telefone</option>
                <option value="form__organizacao">Organização</option>
                <option value="form__senha" selected>Senha</option>
                <option value="form__email">E-mail</option>
            </select>
        </div>
        <div class="container-3">
            <form action="" method="POST" id="form__nome">
                <h1>Alterar nome</h1>
                <label for="nome">Nome:</label>
                <input required type="text" name="nome" placeholder="Gabriel" minlength="4" maxlength="16">
                <label for="sobrenome">Sobrenome:</label>
                <input required type="text" name="sobrenome" placeholder="Silva" minlength="4" maxlength="16">
                <button type="submit" name="btn_nome">Alterar nome</button>
            </form>
            <form action="" method="POST" id="form__contato">
                <h1>Alterar Telefone</h1>
                <label for="telefone">Informe seu novo telefone celular:</label>
                <input required type="tel" id="telefone" name="telefone" class="form__input" required placeholder="(XX) X XXXX XXXX" maxlength="16" minlength="4">
                <button type="submit" name="btn_contato">Alterar Telefone</button>
            </form>
            <form action="" method="POST" id="form__organizacao">
                <h1>Alterar organização</h1>
                <label for="organizacao">Informe sua nova organização:</label>
                <input required type="text" name="organizacao" minlength="4" maxlength="50" placeholder="Unip">
                <button type="submit" name="btn_organizacao">Alterar Organização</button>
            </form>
            <form action="" method="POST" id="form__email">
                <h1>alterar e-mail</h1>
                <label for="email">Informe seu novo e-mail:</label>
                <input required type="text" name="email" class="form__input" required placeholder="seu_user@2023" maxlength="70" minlength="4">
                <button type="submit" name="btn_email">Alterar E-mail</button>
            </form>
            <form action="" method="POST" id="form__senha">
                <h1>Alterar senha:</h1>
                <label for="senha-anterior">Informe a senha anterior:</label>
                <input required type="password" name="senha-anterior" placeholder="Unip@2022" class="senha">
                <label for="senha-atual-1">Informe a senha atual:</label>
                <input required type="password" name="senha-atual-1" class="senha" placeholder="Unip@2023" minlength="8" maxlength="30">
                <label for="senha-atual-2">Informe novamente a senha atual:</label>
                <input required type="password" name="senha-atual-2" class="senha" placeholder="Unip@2023" minlength="8" maxlength="30">
                <div class="checkbox-div">
                    <label for="mostrarsenha">Mostrar senha</label>
                    <div class="checkbox-cont">
                        <input type="checkbox" name="mostrarsenha" class="checkbox">
                        <div class="checkmark"></div>
                    </div>
                </div>
                <hr>
                <ul>
                    <li>Sua senha deve conter um caractere maiúsculo, um minúsculo e um caractere especial</li>
                    <li>A senha deve ter no mínimo 8 caracteres</li>
                </ul>
                <button type="submit" name="btn_senha">Alterar senha</button>
            </form>
            <a href="teste.php">Voltar</a>
        </div>
    </main>
    <footer></footer>
    <script></script>
    <script src="js/script-formulario.js"></script>
    <script src="js/script-showselect.js"></script>
</body>

</html>