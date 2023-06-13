import { crearItemError, removerErrores, crearNotificacion, obtenerRespuesta } from '../vista-control.js';
import ItemDivisor from '../../components/item-divisor.js';
import Mensajes from './constantes-ubicaciones.js';
import { ordenarClientes } from './ordenar-clientes.js';

const camposInvalidos = [];
const camposVacios = [];

document.addEventListener('campovalidacion', (e) => {
  const { esValido, campo } = e.detail;
  const campoIndice = camposInvalidos.indexOf(campo);

  if (!esValido) {
    if (campoIndice === -1) camposInvalidos.push(campo);
  } else {
    if (campoIndice === -1) return;
    camposInvalidos.splice(campoIndice, 1);
  }
});

document.addEventListener('campovacio', (e) => {
  const { estaVacio, campo } = e.detail;
  const campoIndice = camposVacios.indexOf(campo);

  if (estaVacio) {
    if (campoIndice === -1) camposVacios.push(campo);
  } else {
    camposVacios.splice(campoIndice, 1);
  }
});

const camposErroneos = () => {
  removerErrores(camposUbicaciones);
  if (camposVacios.length || !callePrincipalInput.value || !coloniaInput.value || !cpInput.value) {
    camposUbicaciones.appendChild(crearItemError(Mensajes.CAMPOS_VACIOS_OBLIGATORIOS));
    return true;
  }

  if (camposInvalidos.length) return true;

  return false;
};

const reiniciarCamposUbicacion = () => {
  callePrincipalInput.value = '';
  callesAdyacentesInput.value = '';
  coloniaInput.value = '';
  numeroExteriorInput.value = '';
  numeroInteriorInput.value = '';
  cpInput.value = '';
};

const callePrincipalInput = document.body.querySelector('[name="callePrincipal"]');
const callesAdyacentesInput = document.body.querySelector('[name="callesAdyacentes"]');
const coloniaInput = document.body.querySelector('[name="colonia"]');
const numeroExteriorInput = document.body.querySelector('[name="numeroExterior"]');
const numeroInteriorInput = document.body.querySelector('[name="numeroInterior"]');
const cpInput = document.body.querySelector('[name="cp"]');
const camposUbicaciones = document.getElementById('campos-ubicaciones');
const listaUbicaciones = document.getElementById('lista-ubicaciones');
const clienteFormulario = document.querySelector('form');

document.addEventListener('agregarubicacion', () => {
  if (camposErroneos()) return;

  const itemUbicacion = new ItemDivisor();
  itemUbicacion.innerHTML = `
    <item-detalles>
      <wc-texto data-tipo-fuente='etiqueta-l'>
        ${coloniaInput.value}, ${callePrincipalInput.value} ${numeroExteriorInput.value ? `#${numeroExteriorInput.value}` : 'S.N.'}, C.P. ${cpInput.value}
      </wc-texto>
      <boton-icono
          slot='final'
          type='button'
          data-icono='delete'
          data-evento='confirmarremoverubicacion'>
      </boton-icono>
    </item-detalles>
  `;

  itemUbicacion.contenido = {
    callePrincipal: callePrincipalInput.value.trim(),
    callesAdyacentes: callesAdyacentesInput.value.trim(),
    colonia: coloniaInput.value.trim(),
    numeroExterior: numeroExteriorInput.value.trim(),
    numeroInterior: numeroInteriorInput.value.trim(),
    cp: cpInput.value.trim()
  };

  listaUbicaciones.prepend(itemUbicacion);
  itemUbicacion.querySelector('item-detalles boton-icono').dataColorTexto = 'var(--clr-error-40)';

  reiniciarCamposUbicacion();
  crearNotificacion(Mensajes.UBICACION_AGERGADA_TITULO, Mensajes.UBICACION_AGREGADA_MENSAJE, 'exito');
});

const nombreInput = document.body.querySelector('[name="nombre"]');
const apellidosInput = document.body.querySelector('[name="apellidos"]');
const listaClientes = document.getElementById('lista-clientes');
const totalClientes = document.getElementById('total-clientes');
const clientesTitulo = document.getElementById('clientes-titulo');

document.addEventListener('guardarcliente', () => {
  const ubicaciones = [];
  const ubicacionesItems = listaUbicaciones.querySelectorAll('item-divisor');

  for (let i = ubicacionesItems.length - 1; i >= 0; i--) {
    ubicaciones.push(ubicacionesItems[i].contenido);
  }

  if (!ubicaciones.length) {
    if (camposErroneos()) return;

    ubicaciones.push({
      callePrincipal: callePrincipalInput.value.trim(),
      callesAdyacentes: callesAdyacentesInput.value.trim(),
      colonia: coloniaInput.value.trim(),
      numeroExterior: numeroExteriorInput.value.trim(),
      numeroInterior: numeroInteriorInput.value.trim(),
      cp: cpInput.value.trim()
    });
  }

  const formData = new FormData(clienteFormulario);
  formData.append('ubicaciones', JSON.stringify(ubicaciones));

  fetch('php/includes/customers/agregar_cliente.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerRespuesta(datos, (itemError) => {
        camposUbicaciones.appendChild(itemError);
      });

      if (datos.status === 0) return;

      const cliente = new ItemDivisor();
      cliente.innerHTML = /*html*/`
        <lista-item>
          <wc-texto data-tipo-fuente='titulo-s'>
            ${apellidosInput.value} ${nombreInput.value}
          </wc-texto>
          <input class='id-cliente' type='hidden' value=${datos.contenido[0]}>
        </lista-item>
      `;

      cliente.querySelector('lista-item').addEventListener('click', function () {
        this.dispatchEvent(new CustomEvent('mostrarcliente', {
          bubbles: true,
          composed: true
        }));
      });

      if (+totalClientes.innerText === 0) listaClientes.replaceChildren();

      listaClientes.appendChild(cliente);

      totalClientes.innerText = +totalClientes.innerText + 1;
      clientesTitulo
        .innerHTML = `${totalClientes.outerHTML} cliente${+totalClientes.innerText === 1 ? '' : 's'}`;

      ordenarClientes();
      clienteFormulario.reset();
      listaUbicaciones.replaceChildren();
    });
});
