import { ordenarClientes } from '../customers/ordenar-clientes.js';
import { crearNotificacion } from '../vista-control.js';

ordenarClientes();

const listaClientes = document.getElementById('lista-clientes');

[...listaClientes.children].forEach((item) => {
  item.addEventListener('click', () => {
    item.dispatchEvent(new CustomEvent('mostrarcliente', { bubbles: true }));
  });
});

const infoClientePopup = document.getElementById('info-cliente-popup');

const ventanaPrincipal = document.getElementById('buscar-cliente');
const tabs = ventanaPrincipal.querySelector('wc-tabs');

document.addEventListener('ventanaoculta', () => {
  tabs.seleccionarTab(1);

  infoClientePopup.contenido = {
    Nombre: 'Cargando...',
    Apellidos: 'Cargando...',
    Edad: 'Cargando...',
    'Número de celular': 'Cargando...',
    'Dirección de email': 'Cargando...'
  };
});

document.addEventListener('buscarcliente', () => ventanaPrincipal.mostrarVentana());
ventanaPrincipal.addEventListener('cerrar', () => ventanaPrincipal.cerrarVentana());

ventanaPrincipal.addEventListener('regresar', () => tabs.seleccionarTab(1));

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

      infoClientePopup.contenido = {
        Nombre: cliente.nombre,
        Apellidos: cliente.apellidos,
        Edad: `${cliente.edad} año${cliente.edad === 1 ? '' : 's'}`,
        'Número de celular': cliente.celular,
        'Dirección de email': cliente.email ? cliente.email : 'Sin email'
      };

      idClientePopup.value = cliente.id;
    });
});

const infoCliente = document.getElementById('info-cliente');
const idCliente = document.getElementById('id-cliente');

ventanaPrincipal.addEventListener('seleccionarcliente', () => {
  infoCliente.contenido = infoClientePopup.contenido;
  idCliente.value = idClientePopup.value;

  crearNotificacion('Cliente seleccionado', 'Cliente seleccionado con éxito.', 'exito');

  ventanaPrincipal.cerrarVentana();
});
