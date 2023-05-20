import { obtenerRespuesta } from '../../vista-control.js';
import popupAgregarUbicacion from '../popups/agregar-ubicacion.js';
import { ordenarClienteUbicaciones } from '../ordenar-clientes.js';

const ventanaPrincipal = popupAgregarUbicacion.ventana;

document.addEventListener('agregarnuevaubicacion', () => ventanaPrincipal.mostrarVentana());

const ventanaDescartar = document.getElementById('descartar-agregar-ubicacion');

ventanaPrincipal.addEventListener('verificarcierre', () => {
  if (popupAgregarUbicacion.tieneCamposEditados()) {
    ventanaDescartar.mostrarVentana();
    return;
  }

  popupAgregarUbicacion.reiniciar();
  ventanaPrincipal.cerrarVentana();
});

ventanaDescartar.addEventListener('cancelardescarte', () => ventanaDescartar.cerrarVentana());
ventanaDescartar.addEventListener('confirmardescarte', () => {
  popupAgregarUbicacion.reiniciar();
  ventanaPrincipal.cerrarVentana();
  ventanaDescartar.cerrarVentana();
});

const ubicacionFormulario = ventanaPrincipal.querySelector('form');
const idClienteInput = document.getElementById('id-cliente');
const ubicacionesCliente = document.getElementById('ubicaciones-cliente');

ventanaPrincipal.addEventListener('guardarubicacion', () => {
  const formData = new FormData(ubicacionFormulario);
  formData.append('idCliente', idClienteInput.value);

  fetch('php/includes/locations/agregar_ubicacion.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerRespuesta(datos, (itemError) => {
        ventanaPrincipal.querySelector('form contenedor-flex').appendChild(itemError);
      }, ventanaPrincipal);

      if (datos.status === 0) return;

      const ubicacionOpcion = document.createElement('option');
      ubicacionOpcion.value = datos.contenido[0];

      const numeroExterior = popupAgregarUbicacion.numeroExterior
        ? `#${popupAgregarUbicacion.numeroExterior}`
        : 'S.N.';

      ubicacionOpcion.innerText = `${popupAgregarUbicacion.colonia}, ${popupAgregarUbicacion.callePrincipal}, ${numeroExterior}, C.P. ${popupAgregarUbicacion.codigoPostal}`;
      ubicacionOpcion.contenido = {
        'Calle principal': popupAgregarUbicacion.callePrincipal,

        'Calle(s) adyacente(s)': popupAgregarUbicacion.callesAdyacentes
          ? popupAgregarUbicacion.callesAdyacentes
          : 'No especificada(s)',

        Colonia: popupAgregarUbicacion.colonia,

        'Número exterior': popupAgregarUbicacion.numeroExterior
          ? popupAgregarUbicacion.numeroExterior
          : 'S.N.',

        'Número interior': popupAgregarUbicacion.numeroInterior
          ? popupAgregarUbicacion.numeroInterior
          : 'S.N.',

        'Código postal': popupAgregarUbicacion.codigoPostal
      };

      ubicacionesCliente.appendChild(ubicacionOpcion);
      ordenarClienteUbicaciones();

      ubicacionesCliente.value = datos.contenido[0];
      ubicacionesCliente.dispatchEvent(new Event('change'));

      // popupEliminarUbicacion.actualizarInfoUbicacion();

      popupAgregarUbicacion.reiniciar();
      ventanaPrincipal.cerrarVentana();
    });
});
