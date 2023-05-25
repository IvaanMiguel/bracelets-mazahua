import {
  ordenarClientes,
  ordenarClienteUbicaciones
} from '../customers/ordenar-clientes.js';
import { crearNotificacion } from '../vista-control.js';
import infoClientePopup from './controllers/info-cliente-popup.js';

ordenarClientes();

const listaClientes = document.getElementById('lista-clientes');

[...listaClientes.children].forEach((item) => {
  item.addEventListener('click', () => {
    item.dispatchEvent(new CustomEvent('mostrarcliente', { bubbles: true }));
  });
});

const ventanaPrincipal = document.getElementById('buscar-cliente');
const tabs = ventanaPrincipal.querySelector('wc-tabs');

document.addEventListener('ventanaoculta', () => {
  tabs.seleccionarTab(1);
  infoClientePopup.reiniciar();
});

document.addEventListener('buscarcliente', () => ventanaPrincipal.mostrarVentana());
ventanaPrincipal.addEventListener('cerrar', () => ventanaPrincipal.cerrarVentana());

ventanaPrincipal.addEventListener('regresar', () => {
  tabs.seleccionarTab(1);
  infoClientePopup.reiniciar();
});

const idClientePopup = document.getElementById('id-cliente-popup');

ventanaPrincipal.addEventListener('mostrarcliente', (e) => {
  tabs.seleccionarTab(2);

  const formData = new FormData();
  formData.append('id', e.target.querySelector('.id-cliente').value);

  fetch('php/includes/customers/mostrar_cliente.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      const cliente = datos.contenido[0];

      infoClientePopup.setInfo(
        cliente.nombre,
        cliente.apellidos,
        cliente.edad,
        cliente.celular,
        cliente.email
      );

      idClientePopup.value = cliente.id;
    });
});

const ubicacionesCliente = document.body.querySelectorAll('.ubicaciones-cliente');
const infoUbicacion = document.body.querySelectorAll('.info-ubicacion');

const obtenerUbicaciones = (id) => {
  const formData = new FormData();
  formData.append('idCliente', id);

  fetch('php/includes/locations/mostrar_ubicaciones.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      const ubicaciones = [];

      datos.contenido.forEach((ubicacion) => {
        const ubicacionOpcion = document.createElement('option');
        ubicacionOpcion.value = ubicacion.id;
        ubicacionOpcion.innerText = `
          ${ubicacion.colonia}, ${ubicacion.callePrincipal} ${ubicacion.numeroExterior ? `#${ubicacion.numeroExterior}` : 'S.N.'}, C.P. ${ubicacion.cp}
        `;

        ubicacionOpcion.contenido = {
          'Calle principal': ubicacion.callePrincipal,
          'Calle(s) adyacente(s)': ubicacion.callesAdyacentes ? ubicacion.callesAdyacentes : 'No especificada(s)',
          Colonia: ubicacion.colonia,
          'Número exterior': ubicacion.numeroExterior ? ubicacion.numeroExterior : 'S.N.',
          'Número interior': ubicacion.numeroInterior ? ubicacion.numeroInterior : 'S.N.',
          'Código postal': ubicacion.cp
        };

        ubicaciones.push(ubicacionOpcion);
      });

      ubicacionesCliente.forEach((select) => {
        [...select.children].forEach((opcion) => {
          if (opcion.value) opcion.remove();
        });

        ubicaciones.forEach((ubicacion) => {
          const item = ubicacion.cloneNode(true);
          item.contenido = ubicacion.contenido;
          select.add(item);
        });

        ordenarClienteUbicaciones(select);

        select.value = select.children[0].value || select.children[1].value;
      });

      infoUbicacion.forEach((info) => {
        info.contenido = ubicacionesCliente[0].children[0].contenido || ubicacionesCliente[0].children[1].contenido;
      });
    });
};

const infoCliente = document.getElementById('info-cliente');
const idCliente = document.getElementById('id-cliente-agregar');

ventanaPrincipal.addEventListener('seleccionarcliente', () => {
  if (!infoClientePopup.infoCargada) return;

  obtenerUbicaciones(idClientePopup.value);

  infoCliente.contenido = infoClientePopup.info.contenido;
  idCliente.value = idClientePopup.value;

  document.body.querySelectorAll('[name="nombreDestinatario"]').forEach((input) => {
    input.placeholder = `${infoCliente.contenido['Apellido(s)']} ${infoCliente.contenido.Nombre}`;
  });

  document.body.querySelectorAll('[name="celularDestinatario"]').forEach((input) => {
    input.placeholder = `${infoCliente.contenido['Número de celular']}`;
  });

  crearNotificacion('Cliente seleccionado', 'Cliente seleccionado con éxito.', 'exito');

  ventanaPrincipal.cerrarVentana();
});
