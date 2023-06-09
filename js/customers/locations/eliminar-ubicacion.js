import { obtenerRespuesta } from '../../vista-control.js';
import popupEliminarUbicacion from '../popups/eliminar-ubicacion.js';

const ventana = popupEliminarUbicacion.ventana;

document.addEventListener('eliminarubicacion', () => ventana.mostrarVentana());
ventana.addEventListener('cancelar', () => ventana.cerrarVentana());

const ubicacionesCliente = document.getElementById('ubicaciones-cliente');
const idClienteInput = document.getElementById('id-cliente');

ventana.addEventListener('confirmareliminarubicacion', () => {
  const formData = new FormData();
  formData.append('id', ubicacionesCliente.value);
  formData.append('idCliente', idClienteInput.value);

  fetch('php/includes/locations/eliminar_ubicacion.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerRespuesta(datos);

      if (datos.status === 0) return;

      ubicacionesCliente.querySelector(`[value='${ubicacionesCliente.value}']`).remove();
      ubicacionesCliente.value = ubicacionesCliente.children[0].value;
      ubicacionesCliente.dispatchEvent(new Event('change'));

      popupEliminarUbicacion.reiniciar();
      ventana.cerrarVentana();
    });
});
