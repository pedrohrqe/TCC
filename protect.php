<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['email'])) {
    echo "<script>alert('Você precisa estar logado para acessar esta página!');
            window.location.href = 'login.php';
            </script>";
    die();
}

?>