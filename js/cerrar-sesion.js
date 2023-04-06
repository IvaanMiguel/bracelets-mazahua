export function cerrarSesion () {
  fetch('php/includes/cerrar_sesion.inc.php')
    .then((respuesta) => respuesta.json())
    .then((datos) => (location.href = datos.contenido));
}
