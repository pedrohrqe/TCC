<?php

function textoBtnEntrar() {
    $btnEntrar = "";

    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['id'])) {
        $btnEntrar = "Área do Usuário";
    } else {
        $btnEntrar = "Entrar";
    }

    return $btnEntrar;
}

?>