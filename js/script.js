// Função assíncrona para carregar o header e o footer
async function loadHeaderFooter() {
    // Obtendo os elementos de header e footer da página
    const headerElement = document.querySelector("header");
    const footerElement = document.querySelector("footer");

    // Fazendo uma requisição assíncrona para o arquivo "header.php"
    const headerResponse = await fetch("header.php");
    const headerData = await headerResponse.text();
    // Preenchendo o conteúdo do elemento de header com o conteúdo do arquivo
    headerElement.innerHTML = headerData;

    // Fazendo uma requisição assíncrona para o arquivo "footer.php"
    const footerResponse = await fetch("footer.php");
    const footerData = await footerResponse.text();
    // Preenchendo o conteúdo do elemento de footer com o conteúdo do arquivo
    footerElement.innerHTML = footerData;
}

// Configurando interações de menu
function setupMenuInteractions() {
    const nav = document.querySelector('.nav__pagina__mobile');
    const menu = document.querySelector('.menu__mobile');
    const cabecalho = document.querySelector('.cabecalho');

    // Adicionando um ouvinte de evento para o clique no elemento de menu
    menu.addEventListener('click', () => {
        // Alternando a classe "active" no elemento de navegação e no elemento de menu
        nav.classList.toggle("active");
        menu.classList.toggle("active");
        cabecalho.classList.toggle("active");
    });
}

// Configurando interações de botão "Sobre"
function setupBotaoSobre() {
    const sobre = document.getElementById('sobre_btn_mobile');
    const sobreLinks = document.getElementById('sobre__links_mobile');
    const setaSobre = document.getElementById('seta_sobre');

    // Adicionando um ouvinte de evento para o clique no botão "Sobre"
    sobre.addEventListener('click', () => {
        sobreLinks.classList.toggle("active");
        sobre.classList.toggle("active");
        setaSobre.classList.toggle("active");
    });
}

function btnToTop() {
    var novaDiv = document.createElement('div');
    novaDiv.id = 'btn_to_top';
    
    novaDiv.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
    
    document.body.appendChild(novaDiv);
    
    function toggleBtnVisibility() {
        if (window.scrollY > 100) {
            novaDiv.style.opacity = 1;
        } else {
            novaDiv.style.opacity = 0;
        }
    }
    
    window.addEventListener("scroll", toggleBtnVisibility);
    
    novaDiv.style.opacity = 0;
    novaDiv.style.transition = "opacity 300ms fade-in";
}


// Aguardando o carregamento completo do DOM
document.addEventListener("DOMContentLoaded", async function () {
    // Primeiro, carrega o header e o footer assincronamente
    await loadHeaderFooter();
    // Em seguida, configura as interações do menu e do botão "Sobre"
    setupMenuInteractions();
    setupBotaoSobre();
    btnToTop();
});
