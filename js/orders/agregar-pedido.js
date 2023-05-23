import obtenerFormData from './obtener-form-data.js';
import { crearNotificacion, obtenerRespuesta } from '../vista-control.js';
import productosAgregados from './controllers/lista-productos-agregados.js';
import entregaFormulario from './controllers/entrega-formulario.js';

entregaFormulario.inicializar();

const infoCliente = document.getElementById('info-cliente');
const idCliente = document.getElementById('id-cliente');
const listaProductos = document.getElementById('lista-productos');
const pagoEfectivo = document.body.querySelector('[value="Efectivo"]');
const clabeCuenta = document.body.querySelector('[value="clabeCuenta"]');
const numeroTarjeta = document.body.querySelector('[value="numeroTarjeta"]');
const titular = document.body.querySelector('[value="titular"]');

document.addEventListener('hacerpedido', () => {
  fetch('php/includes/orders/agregar_pedido.inc.php', {
    method: 'POST',
    body: obtenerFormData()
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerRespuesta(datos, () => {
        crearNotificacion(datos.contenido[0].titulo, datos.contenido[0].mensaje, 'error');
      });

      if (datos.status === 0) return;

      // Reinicio de apartado de clientes.
      idCliente.value = '';
      infoCliente.innerHTML = /*html*/`
        <contenedor-flex margin='auto' padding='var(--espaciado-chico)'>
          <wc-texto data-tipo-fuente='etiqueta-l'>Ningún cliente selccionado</wc-texto>
        </contenedor-flex>
      `;

      // Reinicio de apartado de productos.
      for (const producto in productosAgregados.productos) {
        const infoProducto = productosAgregados.productos[producto];
        const id = infoProducto.id;
        const existenciasRestantes = infoProducto.existencias - infoProducto.cantidad;

        if (existenciasRestantes === 0) {
          listaProductos.querySelector(`[value="${id}"]`).parentElement.remove();
        } else {
          listaProductos.querySelector(`[value="${id}"]`).parentElement.querySelector('.existencias')
            .innerText = existenciasRestantes;
        }
      }

      productosAgregados.listaItems.replaceChildren();
      productosAgregados.removerProductos();

      entregaFormulario.reiniciar();

      pagoEfectivo.checked = true;
      pagoEfectivo.dispatchEvent(new Event('change'));

      clabeCuenta.value = '';
      numeroTarjeta.value = '';
      titular.value = '';
    });
});
