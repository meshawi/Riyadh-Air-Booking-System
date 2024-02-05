document.getElementById("signupPage").onclick = function() {
    window.location.href = "../Register_Page/register.php";
};

document.getElementById("homePage").onclick = function() {
    window.location.href = "../index.php";
};


function isNotEmpty(value) {
    return value.trim() !== '';
}

function showError(field, message) {
    const errorSpanId = field.id + "Error";
    const errorSpan = document.getElementById(errorSpanId);
    errorSpan.textContent = message;
    errorSpan.style.display = 'inline';
    field.style.borderColor = 'red';
}

function clearError(field) {
    const errorSpanId = field.id + "Error";
    const errorSpan = document.getElementById(errorSpanId);
    errorSpan.textContent = '';
    errorSpan.style.display = 'none';
    field.style.borderColor = '';
}

function validateField(field, validationFunction, errorMessage) {
    if (!validationFunction(field.value)) {
        showError(field, errorMessage);
        return false;
    } else {
        clearError(field);
        return true;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const usernameField = document.getElementById('username');
    const passwordField = document.getElementById('password');

    usernameField.addEventListener('input', function() {
        validateField(usernameField, isNotEmpty, "Username is required.");
    });

    passwordField.addEventListener('input', function() {
        validateField(passwordField, isNotEmpty, "Password is required.");
    });

    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        let isValid = true;

        isValid &= validateField(usernameField, isNotEmpty, "Username is required.");
        isValid &= validateField(passwordField, isNotEmpty, "Password is required.");

        if (!isValid) {
            event.preventDefault();
        }
    });
});
