function irLogin() {
    window.location.href = "../../index.php";
}

const togglePassword = document.querySelector('#togglePassword');
const togglePassword2 = document.querySelector('#togglePassword2');
const password = document.querySelector('#password');
const confirmPassword = document.querySelector('#confirmPassword');

password.addEventListener('input', function () {
    if (password.value) {
        togglePassword.style.display = 'inline-block';
    } else {
        togglePassword.style.display = 'none';
    }
});

confirmPassword.addEventListener('input', function () {
    if (confirmPassword.value) {
        togglePassword2.style.display = 'inline-block';
    } else {
        togglePassword2.style.display = 'none';
    }
});

togglePassword.addEventListener('click', function (e) {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});

togglePassword2.addEventListener('click', function (e) {
    const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmPassword.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});