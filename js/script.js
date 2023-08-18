const nav = document.querySelector('.nav__pagina');
const menu = document.querySelector('.menu__mobile');

menu.addEventListener('click', () => {
    nav.classList.toggle("active");
    menu.classList.toggle("active");
});
