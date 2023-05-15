import { obtenerRespuesta } from '../vista-control.js';
import { ordenarClientes } from './ordenar-clientes.js';
import clienteFormulario from './cliente-formulario.js';

const ventanaEditar = document.getElementById('editar-cliente');

document.addEventListener('editardatospersonales', () => {
  ventanaEditar.mostrarVentana();
});

const nombreInput = ventanaEditar.querySelector('[name="nombre"]');
const apellidosInput = ventanaEditar.querySelector('[name="apellidos"]');
const edadInput = ventanaEditar.querySelector('[name="edad"]');
const celularInput = ventanaEditar.querySelector('[name="celular"]');
const emailInput = ventanaEditar.querySelector('[name="email"]');

const reiniciarVentanaEditarCliente = () => {
  nombreInput.value = '';
  apellidosInput.value = '';
  edadInput.value = '';
  celularInput.value = '';
  emailInput.value = '';

  ventanaEditar.querySelectorAll('item-error').forEach((itemError) => itemError.remove());
  ventanaEditar.cerrarVentana();
};

const ventanaConfirmacion = document.getElementById('confirmar-descarte');

ventanaEditar.addEventListener('verificarcierre', () => {
  if (nombreInput.value || apellidosInput.value || edadInput.value ||
      celularInput.value || emailInput.value) {
    ventanaConfirmacion.mostrarVentana();
    return;
  }

  reiniciarVentanaEditarCliente();
});

ventanaConfirmacion.addEventListener('cancelarcierre', () => ventanaConfirmacion.cerrarVentana());
ventanaConfirmacion.addEventListener('cerrarventanas', () => {
  reiniciarVentanaEditarCliente();
  ventanaConfirmacion.cerrarVentana();
});

const idClienteInput = document.getElementById('id-cliente');
const informacionCliente = document.getElementById('informacion-cliente');
const ventanaNombreCliente = ventanaEditar.querySelector('.nombre-cliente');

ventanaEditar.addEventListener('actualizarcliente', () => {
  const formData = new FormData(ventanaEditar.querySelector('form'));
  formData.append('id', idClienteInput.value);

  fetch('php/includes/customers/editar_cliente.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerRespuesta(datos, (itemError) => {
        ventanaEditar.querySelector('form contenedor-flex').appendChild(itemError);
      }, ventanaEditar);

      if (datos.status === 0) return;

      console.log(informacionCliente);

      informacionCliente.contenido = {
        Nombre: nombreInput.value ? nombreInput.value : informacionCliente.contenido.Nombre,
        Apellidos: apellidosInput.value ? apellidosInput.value : informacionCliente.contenido.Apellidos,
        Edad: edadInput.value ? edadInput.value : informacionCliente.contenido.Edad,
        'Número de celular': celularInput.value ? celularInput.value : informacionCliente.contenido['Número de celular'],
        'Dirección de email': emailInput.value ? emailInput.value : informacionCliente.contenido['Dirección de email']
      };

      if (apellidosInput.value || nombreInput.value) {
        const itemCliente = document.body.querySelector(`.id-cliente[value='${idClienteInput.value}']`)
          .closest('item-divisor');

        const nombre = `${informacionCliente.contenido.Apellidos} ${informacionCliente.contenido.Nombre}`;
        itemCliente.querySelector('wc-texto').innerText = nombre;
        ordenarClientes();

        ventanaNombreCliente.innerText = nombre;
      }

      clienteFormulario.nombre = informacionCliente.contenido.Nombre;
      clienteFormulario.apellidos = informacionCliente.contenido.Apellidos;
      clienteFormulario.edad = informacionCliente.contenido.Edad;
      clienteFormulario.celular = informacionCliente.contenido['Número de celular'];
      clienteFormulario.email = informacionCliente.contenido['Dirección de email'];

      reiniciarVentanaEditarCliente();
    });
});
