<?php

include('sessaoativa.php');
$btnEntrar = textoBtnEntrar();

?>


<header class="cabecalho">
    <a href="index.php"><img src="assets/img/logo_regular_verde.png" alt="" class="img__cabecalho"></a>
    <nav class="links__cabecalho links__cabecalho__1">
        <a href="produto.php" class="link__cabecalho link__1">Produto</a>
        <a href="pesquisa.php" class="link__cabecalho link__1">Pesquisa</a>
        <a class="link__cabecalho link__1 sobre_btn">Sobre<img src="assets/icon/seta.png" alt="" srcset="" style="height: 12px; margin-left: 8px;" class="sobre__img"></a>
        <ul class="sobre__links">
            <a href="aaplae.php">A Aplae</a>
            <a href="staff.php">Staff</a>
            <a href="doacao.php">Doação</a>
        </ul>
    </nav>
    <nav class="links__cabecalho links__cabecalho__2">
        <a href="login.php" class="link__cabecalho link__2" id="btn__entrar"><?= $btnEntrar ?></a>
        <a href="contatenos.php" class="link__cabecalho link__2" id="btn__contate__nos">Contate-nos</a>
    </nav>
    <nav class="nav__pagina__mobile">
        <a href="index.php" class="btn__mobile"><img src="assets/icon/home.png" alt="" class="btn__mobile__img">Home</a>
        <a href="produto.php" class="btn__mobile"><img src="assets/icon/product.png" alt="" class="btn__mobile__img">Produto</a>
        <a href="pesquisa.php" class="btn__mobile"><img src="assets/icon/search.png" alt="" class="btn__mobile__img">Pesquisa</a>



        <div class="btn__mobile" id="sobre_btn_mobile">
            <img src="assets/icon/about.png" class="btn__mobile__img">
            Sobre
            <img src="/assets/icon/seta.png" id="seta_sobre">
        </div>


        <div id="sobre__links_mobile">
            <a href="aaplae.php" class="btn__mobile">
                <img src="/assets/icon/peoples.png" class="btn__mobile__img">
                A Aplae</a>
            <a href="staff.php" class="btn__mobile">
                <img src="/assets/icon/staff.png" class="btn__mobile__img">
                Staff</a>
            <a href="doacao.php" class="btn__mobile">
                <img src="/assets/icon/donate.png" class="btn__mobile__img">
                Doação</a>
        </div>

        </a> <a href="login.php" id="btn__entrar" class="btn__mobile"><img src="assets/icon/test.png" alt="" class="btn__mobile__img"><?= $btnEntrar ?></a>
        <a href="contatenos.php" id="btn__contate__nos" class="btn__mobile"><img src="assets/icon/contatenos.png" alt="" class="btn__mobile__img">Contate-nos</a>
    </nav>
    <div class="menu__mobile">
        <div class="barra"></div>
        <div class="barra"></div>
        <div class="barra"></div>
    </div>
</header>