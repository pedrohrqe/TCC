document.getElementById('senha').addEventListener('input', function () {
    var senhaInput = document.getElementById('senha');
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

var inputs = document.getElementsByClassName('form__input');

for (var i = 0; i < inputs.length-1; i++) {
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

