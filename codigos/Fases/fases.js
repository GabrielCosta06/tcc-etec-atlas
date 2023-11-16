function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function deleteCookie(cname) {
    document.cookie = cname + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

var timerElement = document.getElementById('timer');
var storedTimeLeft = getCookie('timer');
var timeLeft = storedTimeLeft ? parseInt(storedTimeLeft) : 900;
var intervalId;

function updateCountdown() {
    var minutes = Math.floor(timeLeft / 60);
    var seconds = timeLeft % 60;

    seconds = seconds < 10 ? '0' + seconds : seconds;

    timerElement.innerHTML = 'Tempo: ' + minutes + ':' + seconds;

    if (timeLeft > 0) {
        setCookie('timer', timeLeft, 1);
        timeLeft--;
    } else {
        clearInterval(intervalId); 
        alert('Que pena, o tempo se esgotou!');
        deleteCookie('timer');
        window.location.href = '../Login/destroy_session.php';
    }
}


window.onload = function () {
    if (intervalId) {
        clearInterval(intervalId);
    }
    intervalId = setInterval(updateCountdown, 1000);
};
var items = document.querySelectorAll('.circle a');

for (var i = 0, l = items.length; i < l; i++) {
    items[i].style.left = (50 - 35 * Math.cos(-0.5 * Math.PI - 2 * (1 / l) * i * Math.PI)).toFixed(4) + "%";

    items[i].style.top = (50 + 35 * Math.sin(-0.5 * Math.PI - 2 * (1 / l) * i * Math.PI)).toFixed(4) + "%";
}

document.querySelector('.menu-button').onclick = function (e) {
    e.preventDefault();
    document.querySelector('.circle').classList.toggle('open');
}



function openPopup() {
    const windowFeatures = "left=800,top=350,width=320,height=320";
    window.open('sobre.html', 'popup', windowFeatures);
}


// Main Modal
const openModalBtn = document.getElementById("openModalBtn");
const mainModal = document.getElementById("mainModal");
const closeMainModalBtn = document.getElementById("closeMainModalBtn");

let isMainModalDraggable = false;
let offsetMainModalX, offsetMainModalY;

function makeMainModalDraggable() {
    mainModal.style.cursor = "grab";
    mainModal.style.userSelect = "none";

    mainModal.addEventListener("mousedown", startDraggingMainModal);
    mainModal.addEventListener("mouseup", stopDraggingMainModal);
}

function startDraggingMainModal(e) {
    isMainModalDraggable = true;
    offsetMainModalX = e.clientX - mainModal.getBoundingClientRect().left;
    offsetMainModalY = e.clientY - mainModal.getBoundingClientRect().top;
    mainModal.style.cursor = "grabbing";
}

function stopDraggingMainModal() {
    isMainModalDraggable = false;
    mainModal.style.cursor = "grab";
}

function dragMainModal(e) {
    if (isMainModalDraggable) {
        mainModal.style.left = e.clientX - offsetMainModalX + "px";
        mainModal.style.top = e.clientY - offsetMainModalY + "px";
    }
}

makeMainModalDraggable();
document.addEventListener("mousemove", dragMainModal);

openModalBtn.addEventListener("click", () => {
    mainModal.style.display = "block";
    mainModal.style.opacity = '100%';
});

closeMainModalBtn.addEventListener("click", () => {
    mainModal.style.display = "none";
});


// Email Modal
const openEmailModalBtn = document.getElementById("openEmailModalBtn");
const emailModal = document.getElementById("emailModal");
const closeEmailModalBtn = document.getElementById("closeEmailModalBtn");

let isEmailModalDraggable = false;
let offsetEmailModalX, offsetEmailModalY;

function makeEmailModalDraggable() {
    emailModal.style.cursor = "grab";
    emailModal.style.userSelect = "none";

    emailModal.addEventListener("mousedown", startDraggingEmailModal);
    emailModal.addEventListener("mouseup", stopDraggingEmailModal);
}

function startDraggingEmailModal(e) {
    isEmailModalDraggable = true;
    offsetEmailModalX = e.clientX - emailModal.getBoundingClientRect().left;
    offsetEmailModalY = e.clientY - emailModal.getBoundingClientRect().top;
    emailModal.style.cursor = "grabbing";
}

function stopDraggingEmailModal() {
    isEmailModalDraggable = false;
    emailModal.style.cursor = "grab";
}

function dragEmailModal(e) {
    if (isEmailModalDraggable) {
        emailModal.style.left = e.clientX - offsetEmailModalX + "px";
        emailModal.style.top = e.clientY - offsetEmailModalY + "px";
    }
}

makeEmailModalDraggable();
document.addEventListener("mousemove", dragEmailModal);

openEmailModalBtn.addEventListener("click", () => {
    emailModal.style.display = "block";
    emailModal.style.opacity = '100%';
});

closeEmailModalBtn.addEventListener("click", () => {
    emailModal.style.display = "none";
});