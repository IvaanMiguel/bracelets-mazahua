import { obtenerFecha, obtenerRespuesta } from '../vista-control.js';
import datosEntregaPopup from './controllers/popups/datos-entrega.js';
import vistaPedidoFormulario from './controllers/vista-pedido-formulario.js';

datosEntregaPopup.inicializar();
const ventana = datosEntregaPopup.ventana;

document.addEventListener('editardatosentrega', () => ventana.mostrarVentana());
ventana.addEventListener('cerrar', () => ventana.cerrarVentana());

ventana.addEventListener('actualizardatosentrega', () => {
  const formData = new FormData();
  const tipoEntrega = datosEntregaPopup.tipoEntrega;

  formData.append('id', vistaPedidoFormulario.idPedido);
  formData.append('tipoEntrega', tipoEntrega);
  formData.append('fechaEntrega', datosEntregaPopup.fechaEntrega);
  formData.append('horaEntrega', datosEntregaPopup.horaEntrega);

  const tipoEntregaAppend = tipoEntregaFormData[tipoEntrega];
  if (tipoEntregaAppend) tipoEntregaAppend(formData);

  fetch('php/includes/orders/editar_datos_entrega.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerRespuesta(datos);

      actualizarDatosEntrega();
      vistaPedidoFormulario.ocultarDireccion(datosEntregaPopup.tipoEntrega === 'Pick up');
      actualizarUbicacion();

      console.log(datosEntregaPopup.fechaEntrega);
      console.log(datosEntregaPopup.horaEntrega);

      vistaPedidoFormulario.fechaEntrega = obtenerFecha(datosEntregaPopup.fechaEntrega);
      vistaPedidoFormulario.horaEntrega = `${datosEntregaPopup.horaEntrega} hrs.`;

      ventana.cerrarVentana();
    });
});

const actualizarDatosEntrega = () => {
  switch (datosEntregaPopup.tipoEntrega) {
    case 'Pick up':
      vistaPedidoFormulario.tipoEntrega = datosEntregaPopup.tipoEntrega;
      break;

    case 'Domicilio':
      vistaPedidoFormulario.tipoEntrega = 'A domicilio';
      break;

    case 'Aplicación':
      vistaPedidoFormulario.tipoEntrega = `A través de la aplicación de ${datosEntregaPopup.aplicacion}`;
      break;

    default:
  }
};

const actualizarUbicacion = () => {
  const infoUbicacion = datosEntregaPopup.ubicaciones
    .querySelector(`[value="${datosEntregaPopup.idUbicacion}"]`).contenido;

  vistaPedidoFormulario.entregaCallePrincipal = infoUbicacion['Calle principal'];

  vistaPedidoFormulario.entregaNumeroExterior = infoUbicacion['Número exterior'] !== 'S.N.'
    ? `#${infoUbicacion['Número exterior']}`
    : infoUbicacion['Número exterior'];

  vistaPedidoFormulario.entregaNumeroInterior = infoUbicacion['Número interior'] === 'S.N.'
    ? 'Sin número interior'
    : `int. ${infoUbicacion['Número interior']}`;

  vistaPedidoFormulario.entregaCallesAdyacentes = infoUbicacion['Calle(s) adyacente(s)'] === 'No especificada(s)'
    ? 'Sin calles adyacentes'
    : infoUbicacion['Calle(s) adyacente(s)'];

  vistaPedidoFormulario.entregaColonia = infoUbicacion.Colonia;
  vistaPedidoFormulario.codigoPostal = `C.P. ${infoUbicacion['Código postal']}`;
};

const tipoEntregaFormData = {
  'Domicilio': (formData) => {
    formData.append('idUbicacion', datosEntregaPopup.idUbicacion);
  },
  'Aplicación': (formData) => {
    formData.append('idUbicacion', datosEntregaPopup.idUbicacion);
    formData.append('aplicacion', datosEntregaPopup.aplicacion);
  }
};
