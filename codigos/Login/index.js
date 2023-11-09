function irRegistrar() {
    window.location.href = "./pages/register/register.php";
}

const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

password.addEventListener('input', function () {
    if (password.value) {
        togglePassword.style.display = 'inline-block';
    } else {
        togglePassword.style.display = 'none';
    }
});

togglePassword.addEventListener('click', function (e) {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});