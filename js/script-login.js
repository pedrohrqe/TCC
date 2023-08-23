const mostrarSenhaCheckbox = document.querySelector(".checkbox");
const senhaInput = document.getElementById("senha");

mostrarSenhaCheckbox.addEventListener("change", function () {
    if (mostrarSenhaCheckbox.checked) {
        senhaInput.type = "text";
    } else {
        senhaInput.type = "password";
    }
});
