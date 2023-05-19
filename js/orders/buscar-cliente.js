import { ordenarClientes } from '../customers/ordenar-clientes.js';
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

const infoCliente = document.getElementById('info-cliente');
const idCliente = document.getElementById('id-cliente');

ventanaPrincipal.addEventListener('seleccionarcliente', () => {
  if (!infoClientePopup.infoCargada) return;

  infoCliente.contenido = infoClientePopup.info.contenido;
  idCliente.value = idClientePopup.value;

  crearNotificacion('Cliente seleccionado', 'Cliente seleccionado con éxito.', 'exito');

  ventanaPrincipal.cerrarVentana();
});
