<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['id'])) {
    echo '<script>    window.onload = function() {
        const btnEntrar = document.getElementById("btn__entrar");
        if (btnEntrar) {btnEntrar.textContent = "ÁREA DO USUÁRIO";}};</script>';
}
