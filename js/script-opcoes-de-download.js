// Capturando todos os elementos de entrada de rádio
const radioInputs = document.querySelectorAll('.radio-input');
const btn = document.getElementById('btn__baixar');

const downloadUrls = {
    radio1: 'download/emergia.pdf',
    radio2: 'download/emergia.pdf',
    radio3: 'download/emergia.pdf',
};

// Adicionando um ouvinte de evento para cada elemento de entrada de rádio
radioInputs.forEach(input => {
    input.addEventListener('change', () => {
        // Verificando qual rádio foi selecionado
        if (input.checked) {
            const fileUrl = downloadUrls[input.id];
            btn.href = fileUrl;
        }
    });
});