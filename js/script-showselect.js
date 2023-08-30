// Função para mostrar/ocultar elementos com base no valor do select
function handleSelectChange() {
    const selectElement = document.getElementById("select");
    
    const selectedValue = selectElement.value;
    
    const selectedElement = document.getElementById(selectedValue);

    if (selectedElement) {
        const ativoElements = document.getElementsByClassName('active');
        for (let i = 0; i < ativoElements.length; i++) {
            ativoElements[i].classList.remove('active');
        }
        
        selectedElement.classList.add('active');
    }
}

// Adicionar o ouvinte de evento para carregamento da página
document.addEventListener("DOMContentLoaded", function() {
    handleSelectChange(); // Chamar a função quando a página carrega
});

// Adicionar o ouvinte de evento para alteração do select
const selectElement = document.getElementById("select");
selectElement.addEventListener("change", handleSelectChange);