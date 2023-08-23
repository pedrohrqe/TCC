<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['email'])) {
    echo "<script>alert('Você não pode entrar porque não está logado')</script>";
    header("location: login.php");
    die();
}