<?php

include 'conexao.php';

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$empresa = mysqli_real_escape_string($conexao, $_POST['empresa']);
$telefone = mysqli_real_escape_string($conexao, $_POST['tel']);
$cargo = mysqli_real_escape_string($conexao, $_POST['cargo']);


$procurar = "SELECT * FROM `usuario` WHERE email = '$email'";
//Dentro da variavel é colocado o que deseja realizar no banco, no caso um select
$vereficar = mysqli_query($conexao, $procurar);
// Dentro da variavel coloca a função para criar um query e dentro dela coloca a conexao para o banco e a variavel anterior($procurar)

if (mysqli_num_rows($vereficar) > 0)
//Testa se encontrou algum usuario com esses dados
{
    echo "<script>
    alert('Email ja cadastrado!');
    setTimeout(function() {
        window.location.href = 'teste.html';
    }, 0.5); // Aguarda 2 segundos antes do redirecionamento
</script>";
    die();
    exit;
} else {
    //Se nao encontrou nenhum usuario ja cadastrado


    $sql = "INSERT INTO `usuario` (nome, email, numero, cargo, empresa) VALUES ('$nome','$email','$telefone','$cargo','$empresa');";
    //Dentro da variavel insere o que deseja realizar no banco, no caso um insert 
    mysqli_query($conexao, $sql) or die("Erro ao cadastrar");
    //Funçao que cria uma query, e os parametros sao a conexao e o que colocamos dentro da variavel $sql
    //mysqli_close($conexao);
    //encerra a conexao apos o cadastro

    $file = 'assets/img/logo_bold.png';

    // Verifique se o arquivo existe antes de iniciar o download
    if (file_exists($file)) {
        // Configurações de cabeçalho para iniciar o download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Content-Length: ' . filesize($file));

        // Lê o arquivo e envia para a saída

        readfile($file);

        echo "<script>
        alert('Download concluído! Obrigado por baixar o arquivo.');
        window.location.href = 'teste.html';
    </script>";

        // Importante: Pare a execução do script após o download
        exit;
    } else {
        echo "<script>
        alert('Arquivo não existe!');
        setTimeout(function() {
            window.location.href = 'contato.html';
        }, 2000); // Aguarda 2 segundos antes do redirecionamento
    </script>";
    }
}

/*   $query = "SELECT COUNT(*) AS TOTAL FROM usuario WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1){
        echo "ja existe";
    }else{
        $sql_query = "INSERT INTO USUARIO (nome, email, senha) VALUES ('$nome','$email','$senha')";
        if($conn->query($sql_query) === TRUE){
            header("location: index.php?pagina=login");
        }
        }
       
    


    /*$query = "SELECT COUNT(*) AS TOTAL FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $qtd = $row['TOTAL'];

    if ($qtd == 1) {
        echo "<script>
        alert('E-mail já está em uso');
        setTimeout(function() {
            window.location.href = 'index.php?pagina=login';
        }, 0.5); // Aguarda 2 segundos antes do redirecionamento
    </script>". $stmt->error;
    } else {
        $insertQuery = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sss", $nome, $email, $senha);
        if ($stmt->execute()) {
            echo "<script>
            alert('SUsuário inserido com Sucesso! Faça seu login');
            setTimeout(function() {
                window.location.href = 'index.php?pagina=login';
            }, 0.5); // Aguarda 2 segundos antes do redirecionamento
        </script>";
        } else {
            echo "<script>
            alert('Erro ao cadastrar! Revise os campos');
            setTimeout(function() {
                window.location.href = 'index.php?pagina=register';
            }, 0.5); // Aguarda 2 segundos antes do redirecionamento
        </script>" . $email;
        }
    }*/

$stmt->close();
$conexao->close();
