function mostrarPopup(imagenSrc) {
    const popup = document.getElementById('popup');
    const imagenPopup = document.getElementById('imagen-popup');

    imagenPopup.src = imagenSrc;
    popup.style.display = 'block';
}

function cerrarPopup() {
    const popup = document.getElementById('popup');
    popup.style.display = 'none';
}

// Función para abrir el formulario en una nueva pestaña
function abrirFormulario() {
    window.open('https://docs.google.com/forms/d/e/1FAIpQLSeTsVgjvUFrjSZyJhI9QMKZg9yDWszcAg_f5v_qpGNLlKhejg/viewform', '_blank');
}