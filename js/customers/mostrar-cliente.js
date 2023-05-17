import { ordenarClienteUbicaciones } from './ordenar-clientes.js';
import clienteFormulario from './cliente-formulario.js';
import popupEliminarUbicacion from './popups/eliminar-ubicacion.js';
import popupEditarUbicacion from './popups/editar-ubicacion.js';

const ubicacionesCliente = document.getElementById('ubicaciones-cliente');

const subtab = document.getElementById('subtab');
const ventanaEditarCliente = document.getElementById('editar-cliente');
const nombreClienteEditar = ventanaEditarCliente.querySelector('.nombre-cliente');
const informacionCliente = document.getElementById('informacion-cliente');
const informacionUbicacion = document.getElementById('informacion-ubicacion');
const nombreClienteEliminarUbicacion = document.body.querySelector('#eliminar-ubicacion .nombre-cliente');

document.addEventListener('regresarclientes', () => {
  subtab.seleccionarTab(2);

  Array.from(ubicacionesCliente.children).forEach((opcion) => {
    if (opcion.value) opcion.remove();
  });

  clienteFormulario.defaultPlaceholder();
  informacionCliente.contenido = null;
  informacionUbicacion.contenido = null;
  nombreClienteEditar.innerText = 'Cargando...';
  popupEliminarUbicacion.reiniciar();
});

const mostrarCliente = new CustomEvent('mostrarcliente', { bubbles: true, composed: true });

document.body.querySelectorAll('lista-item').forEach((item) => {
  item.addEventListener('click', () => item.dispatchEvent(mostrarCliente));
});

const idClienteInput = document.getElementById('id-cliente');

document.addEventListener('mostrarcliente', (e) => {
  informacionCliente.contenido = {
    Nombre: 'Cargando...',
    'Apellido(s)': 'Cargando...',
    Edad: 'Cargando...',
    'Número de celular': 'Cargando...',
    'Dirección de email': 'Cargando...'
  };

  informacionUbicacion.contenido = {
    'Calle principal': 'Cargando...',
    'Calle(s) adyacente(s)': 'Cargando...',
    Colonia: 'Cargando...',
    'Número exterior': 'Cargando...',
    'Número interior': 'Cargando...',
    'Código postal': 'Cargando...'
  };

  subtab.seleccionarTab(1);

  const idCliente = e.target.querySelector('.id-cliente').value;
  idClienteInput.value = idCliente;

  const formData = new FormData();
  formData.append('id', idCliente);

  fetch('php/includes/customers/mostrar_cliente.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      const cliente = datos.contenido[0];

      informacionCliente.contenido = {
        Nombre: cliente.nombre,
        Apellidos: cliente.apellidos,
        Edad: `${cliente.edad} año${cliente.edad === 1 ? '' : 's'}`,
        'Número de celular': cliente.celular,
        'Dirección de email': cliente.email ? cliente.email : 'Sin email'
      };

      const nombre = `${cliente.apellidos} ${cliente.nombre}`;

      nombreClienteEditar.innerText = nombre;
      popupEliminarUbicacion.nombreCliente = nombre;
      // nombreClienteEliminarUbicacion.innerText = nombre;

      clienteFormulario.nombre = cliente.nombre;
      clienteFormulario.apellidos = cliente.apellidos;
      clienteFormulario.edad = cliente.edad;
      clienteFormulario.celular = cliente.celular;
      clienteFormulario.email = cliente.email ? cliente.email : 'Sin email';
    });

  obtenerUbicaciones(idCliente);
});

const obtenerUbicaciones = (id) => {
  const formData = new FormData();
  formData.append('idCliente', id);

  fetch('php/includes/locations/mostrar_ubicaciones.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      datos.contenido.forEach((ubicacion, i) => {
        const ubicacionOpcion = document.createElement('option');
        ubicacionOpcion.value = ubicacion.id;
        ubicacionOpcion.innerText = `
          ${ubicacion.colonia}, ${ubicacion.callePrincipal} ${ubicacion.numeroExterior ? `#${ubicacion.numeroExterior}` : 'S.N.'}, C.P. ${ubicacion.cp}
        `;
        ubicacionesCliente.appendChild(ubicacionOpcion);

        ubicacionOpcion.contenido = {
          'Calle principal': ubicacion.callePrincipal,
          'Calle(s) adyacente(s)': ubicacion.callesAdyacentes ? ubicacion.callesAdyacentes : 'No especificada(s)',
          Colonia: ubicacion.colonia,
          'Número exterior': ubicacion.numeroExterior ? ubicacion.numeroExterior : 'S.N.',
          'Número interior': ubicacion.numeroInterior ? ubicacion.numeroInterior : 'S.N.',
          'Código postal': ubicacion.cp
        };

        ordenarClienteUbicaciones();

        if (i === 0) {
          ubicacionesCliente.value = ubicacion.id;
          informacionUbicacion.contenido = ubicacionOpcion.contenido;
        }

        popupEliminarUbicacion.actualizarInfoUbicacion();
        popupEditarUbicacion.actualizarPlaceholders();
      });
    });
};

ubicacionesCliente.addEventListener('change', () => {
  const ubicacion = ubicacionesCliente.querySelector(`[value='${ubicacionesCliente.value}']`);
  informacionUbicacion.contenido = ubicacion.contenido;

  popupEliminarUbicacion.actualizarInfoUbicacion();
  popupEditarUbicacion.actualizarPlaceholders();
});
