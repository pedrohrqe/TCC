<?php

$server = "localhost";
$user = "root";
$senha = "";
$db = "aplae";

$conexao = mysqli_connect($server, $user, $senha, $db);

if ($conexao->connect_error) {
    echo "Falha ao conectar ao banco de dados: " . $conexao->connect_error;
    echo "<script>
        alert('Erro ao conectar!');
        setTimeout(function() {
            window.location.href = 'teste.html';
        }, 500); // 500 milissegundos (0.5 segundos)
    </script>";
}
?>