export function cerrarSesion () {
  fetch('php/includes/cerrarsesion.inc.php')
    .then((respuesta) => respuesta.json())
    .then((datos) => (location.href = datos.contenido));
}