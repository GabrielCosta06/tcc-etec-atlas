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

//jquery

$('[lang]').hide();
$('[lang="pt"]').show();
$('#lang-switch').change(function () { 
    var lang = $(this).val();
    switch (lang) {
        case 'en':
            $('[lang]').hide();
            $('[lang="en"]').show();
        break;
        case 'pt':
            $('[lang]').hide();
            $('[lang="pt"]').show();
        break;
        default:
            $('[lang]').hide();
            $('[lang="pt"]').show();
        }
});
