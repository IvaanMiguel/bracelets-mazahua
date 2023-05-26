import datosDestinatarioPopup from './controllers/popups/datos-destinatario.js';
import vistaPedidoFormulario from './controllers/vista-pedido-formulario.js';
import { obtenerRespuesta } from '../vista-control.js';

datosDestinatarioPopup.incializar();
const ventana = datosDestinatarioPopup.ventana;

document.addEventListener('editardatosdestinatario', () => ventana.mostrarVentana());

const ventanaConfirmacion = document.getElementById('descartar-editar-datos-destinatario');

ventana.addEventListener('verificarcierre', () => {
  if (datosDestinatarioPopup.tieneCamposEditados()) {
    ventanaConfirmacion.mostrarVentana();
    return;
  }

  datosDestinatarioPopup.reiniciar();
  ventana.cerrarVentana();
});

ventanaConfirmacion.addEventListener('cancelarcierre', () => ventanaConfirmacion.cerrarVentana());
ventanaConfirmacion.addEventListener('cerrarventanas', () => {
  datosDestinatarioPopup.reiniciar();
  ventana.cerrarVentana();
  ventanaConfirmacion.cerrarVentana();
});

ventana.addEventListener('actualizardatosdestinatario', () => {
  const formData = new FormData(ventana.querySelector('form'));
  formData.append('id', vistaPedidoFormulario.idPedido);

  fetch('php/includes/orders/editar_datos_destinatario.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerRespuesta(datos, () => {
        crearNotificacion(datos.contenido[0].titulo, datos.contenido[0].mensaje, 'error');
      }, ventana);

      if (!datos.status) return;

      if (datosDestinatarioPopup.nombreDestinatario) {
        vistaPedidoFormulario.pedidoNombreDestinatario = datosDestinatarioPopup.nombreDestinatario;
      }
      if (datosDestinatarioPopup.celularDestinatario) {
        vistaPedidoFormulario.pedidoCelularDestinatario = datosDestinatarioPopup.celularDestinatario;
      }

      datosDestinatarioPopup.reiniciar();
      ventana.cerrarVentana();
    });
});
