<?php

include ('sessaoativa.php');

$btnEntrar = textoBtnEntrar();

?>


<footer class="rodape">
    <div class="sobre__rodape">
        <a href="index.php"><img src="assets/img/logo_regular_branco.png" alt="" class="img__rodape" /></a>
        <p>
            UNIP - Chácara Sto. Antônio
            <br>
            Universidade de São Paulo, Estado de São Paulo
            <br>
            <br>
            R. da Paz, 797 - Chácara Santo Antônio
            <br>São Paulo - SP, 04713-000
        </p>
        <hr style="background-color: #ffffff15; margin-left: 0px; opacity: 1;"><p>Ferramenta análise de emergia</p>
        <p>Unip - 2023 ©</p>
    </div>
    <div class="separator"></div>
    <div class="externals">
        <p style="text-align: center;">Entre em contato conosco:</p>
        <div class="flex-row">
            <a href="https://www.unip.br/"><img src="assets/icon/telefone.png" alt=""></a>
            <a href="https://www.unip.br/"><img src="assets/icon/email.png" alt=""></a>
            <a href="https://www.unip.br/"><img src="assets/icon/whatsapp.png" alt=""></a>
            <a href="https://www.unip.br/"><img src="assets/icon/youtube.png" alt=""></a>
            <a href="https://www.unip.br/"><img src="assets/icon/github.png" alt=""></a>
        </div>
    </div>
    <div class="separator"></div>
    <div class="links__rodape flex-center">
        <a href="produto.php" class="link__3">Produto</a>
        <a href="pesquisa.php" class="link__3">Pesquisa</a>
        <a href="aaplae.php" class="link__3">A Aplae</a>
        <a href="staff.php" class="link__3">Staff</a>
        <a href="doacao.php" class="link__3">Doação</a>
    </div>
    <div class="separator"></div>
    <div class="flex-column flex-center">
        <a href="login.php" class="link__3"><?= $btnEntrar ?></a>
        <a href="contatenos.php" class="link__3">Contate-nos</a>
    </div>
</footer>