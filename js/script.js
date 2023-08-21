async function loadHeaderFooter() {
    // Obtendo os elementos de header e footer da página
    const headerElement = document.getElementsByTagName("header")[0];
    const footerElement = document.getElementsByTagName("footer")[0];

    // Fazendo uma requisição assíncrona para o arquivo "header.html"
    const headerResponse = await fetch("header.html");
    const headerData = await headerResponse.text();
    // Preenchendo o conteúdo do elemento de header com o conteúdo do arquivo
    headerElement.innerHTML = headerData;

    // Fazendo uma requisição assíncrona para o arquivo "footer.html"
    const footerResponse = await fetch("footer.html");
    const footerData = await footerResponse.text();
    // Preenchendo o conteúdo do elemento de footer com o conteúdo do arquivo
    footerElement.innerHTML = footerData;
}

// Configurando interações de menu
function setupMenuInteractions() {
    const nav = document.querySelector('.nav__pagina');
    const menu = document.querySelector('.menu__mobile');

    // Adicionando um ouvinte de evento para o clique no elemento de menu
    menu.addEventListener('click', () => {
        // Alternando a classe "active" no elemento de navegação e no elemento de menu
        nav.classList.toggle("active");
        menu.classList.toggle("active");
    });
}

// Aguardando o carregamento completo do DOM
document.addEventListener("DOMContentLoaded", async function () {
    // Primeiro, carrega o header e o footer assincronamente
    await loadHeaderFooter(); 
    // Em seguida, configura as interações do menu
    setupMenuInteractions();
});