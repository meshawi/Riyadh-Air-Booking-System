document.getElementById("loginPage").onclick = function() {
    window.location.href = "../Login_Page/login.php";
};

document.getElementById("homePage").onclick = function() {
    window.location.href = "../index.php";
};



function validateNationalID(nID) {
    return /^\d{10}$/.test(nID);
}

function validateUsername(username) {
    return /^[a-zA-Z0-9]{4,20}$/.test(username);
}

function validatePassword(password) {
    return /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(password);
}

function validateEmail(email) {
    return email.includes('@') && email.includes('.');
}

function validatePhoneNumber(pNumber) {
    return /^5\d{8}$/.test(pNumber);
}

function validateName(name) {
    return /^[A-Za-z\s]+$/.test(name);
}

function calculateAge(dob) {
    const birthDate = new Date(dob);
    const today = new Date();
    let age = today.getFullYear() - birthDate.getFullYear();
    const m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

function validateAge(dob) {
    return calculateAge(dob) >= 18;
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
    const nIDField = document.getElementById('nID');
    const usernameField = document.getElementById('username');
    const passwordField = document.getElementById('psw');
    const emailField = document.getElementById('email');
    const phoneNumberField = document.getElementById('pNumber');
    const fNameField = document.getElementById('fName');
    const lNameField = document.getElementById('lName');
    const dobField = document.getElementById('DoP');

    nIDField.addEventListener('input', function() {
        validateField(nIDField, validateNationalID, "National ID must be 10 digits.");
    });

    usernameField.addEventListener('input', function() {
        validateField(usernameField, validateUsername, "Username must be 4 to 20 alphanumeric characters.");
    });

    passwordField.addEventListener('input', function() {
        validateField(passwordField, validatePassword, "Password must be at least 8 characters, including one letter and one number.");
    });

    emailField.addEventListener('input', function() {
        validateField(emailField, validateEmail, "Please enter a valid email address.");
    });

    phoneNumberField.addEventListener('input', function() {
        validateField(phoneNumberField, validatePhoneNumber, "Phone number must start with 5 and be 9 digits long.");
    });

    fNameField.addEventListener('input', function() {
        validateField(fNameField, validateName, "Name must contain only letters and spaces.");
    });

    lNameField.addEventListener('input', function() {
        validateField(lNameField, validateName, "Name must contain only letters and spaces.");
    });

    dobField.addEventListener('change', function() {
        validateField(dobField, validateAge, "You must be at least 18 years old.");
    });

    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        let isValid = true;

        isValid &= validateField(nIDField, validateNationalID, "National ID must be 10 digits.");
        isValid &= validateField(usernameField, validateUsername, "Username must be 4 to 20 alphanumeric characters.");
        isValid &= validateField(passwordField, validatePassword, "Password must be at least 8 characters, including one letter and one number.");
        isValid &= validateField(emailField, validateEmail, "Please enter a valid email address.");
        isValid &= validateField(phoneNumberField, validatePhoneNumber, "Phone number must start with 5 and be 9 digits long.");
        isValid &= validateField(fNameField, validateName, "Name must contain only letters and spaces.");
        isValid &= validateField(lNameField, validateName, "Name must contain only letters and spaces.");
        isValid &= validateField(dobField, validateAge, "You must be at least 18 years old.");

        if (!isValid) {
            event.preventDefault();
        }
    });
})


;
