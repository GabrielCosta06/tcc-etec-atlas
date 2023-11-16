const modal = document.getElementById('modal');
const openModalBtn = document.getElementById('openModalBtn');
const closeModalBtn = document.getElementById('closeModalBtn');

// Abrir modal
openModalBtn.addEventListener('click', () => {
    modal.style.display = 'block';
    modal.style.opacity = '100%';
});

// Fechar modal ao clicar no botão "X"
closeModalBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});

// Tornar a janela modal arrastável
let isDragging = false;
let offset = { x: 0, y: 0 };

modal.addEventListener('mousedown', (e) => {
    isDragging = true;
    offset.x = modal.offsetLeft - e.clientX;
    offset.y = modal.offsetTop - e.clientY;
});

document.addEventListener('mousemove', (e) => {
    if (isDragging) {
        modal.style.left = e.clientX + offset.x + 'px';
        modal.style.top = e.clientY + offset.y + 'px';
    }
});

document.addEventListener('mouseup', () => {
    isDragging = false;
});