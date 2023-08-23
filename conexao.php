<?php

$usuario = 'root';
$senha = '';
$database = 'aplae';
$host = 'localhost';

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