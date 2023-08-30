// Script para formatar telefone digitado
window.addEventListener('DOMContentLoaded', () => {
    const telefoneInput = document.getElementById("telefone");

    telefoneInput.addEventListener("input", function() {
        const value = telefoneInput.value.replace(/\D/g, ""); // Remover todos os caracteres não numéricos
        const formattedValue = formatPhoneNumber(value);
        telefoneInput.value = formattedValue;
    });

    function formatPhoneNumber(value) {
        if (value.length <= 2) {
            return value;
        } else if (value.length <= 5) {
            return `(${value.slice(0, 2)}) ${value.slice(2)}`;
        } else if (value.length <= 9) {
            return `(${value.slice(0, 2)}) ${value.slice(2, 3)} ${value.slice(3, 7)}-${value.slice(7)}`;
        } else {
            return `(${value.slice(0, 2)}) ${value.slice(2, 3)} ${value.slice(3, 7)}-${value.slice(7, 11)}`;
        }
    }
});

// Script para validar senha
// Selecionar todos os elementos com a classe '.senha'
const senhaInputs = document.querySelectorAll('.senha');

// Iterar sobre cada elemento e adicionar o evento de input
senhaInputs.forEach((senhaInput) => {
    senhaInput.addEventListener('input', function () {
        var senha = senhaInput.value;

        var uppercaseRegex = /[A-Z]/;
        var lowercaseRegex = /[a-z]/;
        var specialCharRegex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        var minLength = 8;

        if (!uppercaseRegex.test(senha) || !lowercaseRegex.test(senha) || !specialCharRegex.test(senha) || senha.length < minLength) {
            senhaInput.style.backgroundColor = '#ff000020';
        } else {
            senhaInput.style.backgroundColor = '#49873620';
        }
    });
});

// Script para alterar cores dos campos com tamanho não válido
var inputs = document.getElementsByClassName('form__input');

for (var i = 0; i < inputs.length - 1; i++) {
    inputs[i].addEventListener('input', function (event) {
        var input = event.target;
        var minLength = 4;

        if (input.value.length < minLength) {
            input.style.backgroundColor = '#ff000020';
        } else {
            input.style.backgroundColor = '#49873620';
        }
    });
}

//Script para mostrar senha
const toggleMostrarSenha = document.querySelector(".checkbox");
const senhaInputAll = document.querySelectorAll(".senha");

toggleMostrarSenha.addEventListener("change", function () {
    const tipo = toggleMostrarSenha.checked ? "text" : "password";
    senhaInputAll.forEach(input => {
        input.type = tipo;
    });
});