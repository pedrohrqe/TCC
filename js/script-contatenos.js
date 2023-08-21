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
