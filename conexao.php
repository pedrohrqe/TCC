<?php

$usuario = 'if0_34892235';
$senha = 'f4yqhqkJJHsjn';
$database = 'if0_34892235_aplae';
$host = 'sql203.infinityfree.com';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli->connect_error) {
    echo "Falha ao conectar ao banco de dados: " . $mysqli->connect_error;
    echo "<script>
        alert('Erro ao conectar!');
        setTimeout(function() {
            window.location.href = 'teste.html';
        }, 500); // 500 milissegundos (0.5 segundos)
    </script>";
}
?>