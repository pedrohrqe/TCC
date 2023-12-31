<?php
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contate-nos - Aplae</title>
    <link rel="shortcut icon" href="assets/img/logo_simple_verde_1.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_contatenos.css">
</head>

<body>
    <header></header>
    <main class="corpo">
        <div class="container-1">
            <h1>Contate-nos</h1>
            <p>Preencha as informações para que possamos entrar em contato com você</p>
        </div>
        <div class="container-2">
            <form method="POST" action="enviacontato.php" class="form_contato">
                <h1>Preencha as informações abaixo:</h1>
                <div class="names">
                    <div>
                        <label for="nome">Nome <strong>*</strong></label>
                        <input type="text" name="nome" maxlength="15" required placeholder="Ex: Pedro" autofocus/>
                    </div>
                    <div>
                        <label for="nome">Sobrenome <strong>*</strong></label>
                        <input type="text" name="nome" maxlength="15" required placeholder="Ex: Henrique" />
                    </div>
                </div>
                <label for="email">Email <strong>*</strong></label>
                <input type="email" name="email" autofocus="true" maxlength="60" placeholder="Ex: pedrohenrique2023@gmail.com" required />
                <label for="telefone">Telefone Celular:</label>
                <input type="tel" id="telefone" name="telefone" placeholder="(XX) X XXXX-XXXX" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" required maxlength="16">           
                <label for="job">Cargo <strong>*</strong></label>
                <input type="text" name="job" required placeholder="Ex: Analista de Dados" />
                <label for="empresa">Empresa <strong>*</strong></label>
                <input type="text" name="empresa" placeholder="Ex: Emergia SA" required>
                <label for="email">Mensagem <strong>*</strong></label>
                <textarea class="textarea" name="msg" placeholder="Ex: Gostaria de ajuda para..." maxlength="300" required></textarea>
                <p class="form-obs">Campos obrigatórios sinalizados <strong>*</strong></p>
                <button class="btn" type="submit">Enviar ></button></a>
            </form>
            <div class="cont-2-txt">
                <h1>Fale Conosco</h1>
                <p>Precisa de ajuda para utilizar nossa ferramenta? <br> Entre em contato com nossa equipe.</p>
                <hr>
                <h1>Como Podemos Ajudar?</h1>
                <ul>
                    <li>Dúvidas</li>
                    <li>Sugestões</li>
                    <li>Reclamações</li>
                </ul>
                <hr>
                <h1>Contato Direto</h1>
                <div class="email">
                    <img src="assets/icon/email.png" alt="Icone-email">
                    <p>aplae.br@gmail.com</p>
                </div>
                <hr>
                <h1>Visite nosso escritório</h1>
                <p>
                    <a href="https://www.google.com/maps/search/?api=1&query=-23.605093027009644,-46.648810040999" target="_blank" style="text-decoration: none; padding: 0;">UNIP - Indianópolis<br>
                        Universidade de São Paulo, Estado de São Paulo<br>
                        Endereço: R. Dr. Bacelar, 1212 - Vila Clementino, São Paulo - SP, 04026-002
                    </a>
                </p>
                <br>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.9773429655397!2d-46.649151599999996!3d-23.605145500000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5a3c3319029b%3A0x4037808ee8115b88!2sR.%20Dr.%20Bacelar%2C%201212%20-%20Vila%20da%20Sa%C3%BAde%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2004026-002!5e0!3m2!1spt-BR!2sbr!4v1692633056509!5m2!1spt-BR!2sbr" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </main>
    <footer></footer>
    <script src="js/script.js"></script>
    <script src="js/script-formulario.js"></script>
</body>

</html>