import { obtenerRespuesta } from '../vista-control.js';
import clienteFormulario from './cliente-formulario.js';

const ventanaEliminar = document.getElementById('eliminar-cliente');
const informacionCliente = document.getElementById('informacion-cliente');

document.addEventListener('eliminarcliente', () => {
  const cliente = informacionCliente.contenido;

  ventanaEliminar.querySelectorAll('.nombre-cliente').forEach((item) => {
    item.innerText = `${cliente.Apellidos} ${cliente.Nombre}`;
  });

  ventanaEliminar.mostrarVentana();
});

ventanaEliminar.addEventListener('cancelar', () => ventanaEliminar.cerrarVentana());

const idClienteInput = document.getElementById('id-cliente');
const listaClientes = document.getElementById('lista-clientes');
const totalClientes = document.getElementById('total-clientes');
const clientesTitulo = document.getElementById('clientes-titulo');
const informacionUbicacion = document.getElementById('informacion-ubicacion');
const ubicacionesCliente = document.getElementById('ubicaciones-cliente');
const subtab = document.getElementById('subtab');

ventanaEliminar.addEventListener('confirmareliminarcliente', () => {
  const formData = new FormData();
  formData.append('id', idClienteInput.value);

  fetch('php/includes/customers/eliminar_cliente.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerRespuesta(datos);

      if (datos.status === 0) return;

      listaClientes.querySelector(`.id-cliente[value='${idClienteInput.value}']`)
        .parentElement.remove();

      totalClientes.innerText = +totalClientes.innerText - 1;
      clientesTitulo.innerHTML = `${totalClientes.outerHTML} cliente${+totalClientes.innerText === 1 ? '' : 's'}`;

      idClienteInput.value = '';
      informacionCliente.contenido = null;
      informacionUbicacion.contenido = null;

      Array.from(ubicacionesCliente.children).forEach((opcion) => {
        if (opcion.value) opcion.remove();
      });

      subtab.seleccionarTab(2);

      ventanaEliminar.cerrarVentana();
      clienteFormulario.defaultPlaceholder();
    });
});
