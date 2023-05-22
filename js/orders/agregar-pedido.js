import obtenerFormData from './obtener-form-data.js';
import { crearNotificacion, obtenerRespuesta } from '../vista-control.js';

document.addEventListener('hacerpedido', () => {
  fetch('php/includes/orders/agregar_pedido.inc.php', {
    method: 'POST',
    body: obtenerFormData()
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerRespuesta(datos, () => {
        crearNotificacion(datos.contenido[0].titulo, datos.contenido[0].mensaje, 'error');
      });
    });
});
