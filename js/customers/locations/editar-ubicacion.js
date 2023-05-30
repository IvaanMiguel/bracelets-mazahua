import popupEditarUbicacion from '../popups/editar-ubicacion.js';
import { obtenerRespuesta } from '../../vista-control.js';
import { ordenarClienteUbicaciones } from '../ordenar-clientes.js';

const ventanaPrincipal = popupEditarUbicacion.ventana;

document.addEventListener('editarubicacion', () => ventanaPrincipal.mostrarVentana());

const ventanaDescartar = document.getElementById('descartar-editar-ubicacion');

ventanaPrincipal.addEventListener('verificarcierre', () => {
  if (popupEditarUbicacion.tieneCamposEditados()) {
    ventanaDescartar.mostrarVentana();
    return;
  }

  popupEditarUbicacion.reiniciarCampos();
  ventanaPrincipal.cerrarVentana();
});

ventanaDescartar.addEventListener('cancelardescarte', () => ventanaDescartar.cerrarVentana());
ventanaDescartar.addEventListener('confirmardescarte', () => {
  popupEditarUbicacion.reiniciarCampos();
  ventanaPrincipal.cerrarVentana();
  ventanaDescartar.cerrarVentana();
});

const ubicacionesCliente = document.getElementById('ubicaciones-cliente');
const informacionUbicacion = document.getElementById('informacion-ubicacion');

ventanaPrincipal.addEventListener('actualizarubicacion', () => {
  const formData = new FormData(ventanaPrincipal.querySelector('form'));
  formData.append('id', ubicacionesCliente.value);

  fetch('php/includes/locations/editar_ubicacion.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerRespuesta(datos, (itemError) => {
        ventanaPrincipal.querySelector('form contenedor-flex').appendChild(itemError);
      }, ventanaPrincipal);

      if (datos.status === 0) return;

      const ubicacionOpcion = ubicacionesCliente.querySelector(`[value='${ubicacionesCliente.value}']`);
      const ubicacionObsoleta = ubicacionOpcion.contenido;

      const callePrincipal = popupEditarUbicacion.callePrincipal || ubicacionObsoleta['Calle principal'];
      const callesAdyacentes = popupEditarUbicacion.callesAdyacentes || ubicacionObsoleta['Calle(s) adyacente(s)'];
      const colonia = popupEditarUbicacion.colonia || ubicacionObsoleta.Colonia;
      const numeroExterior = popupEditarUbicacion.numeroExterior || ubicacionObsoleta['Número exterior'];
      const numeroInterior = popupEditarUbicacion.numeroInterior || ubicacionObsoleta['Número interior'];
      const codigoPostal = popupEditarUbicacion.codigoPostal || ubicacionObsoleta['Código postal'];

      ubicacionOpcion.innerText = `
        ${colonia}, ${callePrincipal} ${numeroExterior === 'S.N.' ? '' : '#'}${numeroExterior}, C.P. ${codigoPostal}
      `;

      const ubicacionActualizada = {
        'Calle principal': callePrincipal,
        'Calle(s) adyacente(s)': callesAdyacentes,
        Colonia: colonia,
        'Número exterior': numeroExterior,
        'Número interior': numeroInterior,
        'Código postal': codigoPostal
      };

      ubicacionOpcion.contenido = ubicacionActualizada;
      informacionUbicacion.contenido = ubicacionActualizada;

      ordenarClienteUbicaciones();

      ubicacionesCliente.dispatchEvent(new Event('change'));

      popupEditarUbicacion.reiniciarCampos();
      ventanaPrincipal.cerrarVentana();
    });
});
