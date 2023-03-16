document.querySelector('[name="cerrarSesion"]').addEventListener('click', () => {
    fetch('php/includes/cerrarsesion.inc.php')
        .then((respuesta) => respuesta.json())
        .then((datos) => (location.href = datos.contenido));
});
