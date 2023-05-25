import ItemDivisor from '../../../components/item-divisor.js';
import { obtenerFecha } from '../../vista-control.js';

/** @param {string|number} idPedido */
const crearItemPedido = (idPedido) => {
  const idCliente = document.getElementById('id-cliente-agregar').value;
  const nombreCliente = document.body.querySelector(`.id-cliente[value="${idCliente}"]`)
    .previousElementSibling.innerText;
  const fechaEntrega = document.body.querySelector('[name="fechaEntrega"]').value;

  let totalProductos = 0;

  document.body.querySelectorAll('.mini-input').forEach((input) => {
    totalProductos += +input.value || 1;
  });

  const itemDivisor = new ItemDivisor();
  itemDivisor.innerHTML = /*html*/`
    <lista-item>
      <wc-texto data-tipo-fuente='titulo-s'>
        ${nombreCliente}
      </wc-texto>
      <wc-texto slot='info-extra' data-tipo-fuente='etiqueta-s'>
        ${totalProductos} producto${totalProductos === 1 ? '' : 's'} en total.
        <span class='entrega-completado'>Entrega el ${obtenerFecha(fechaEntrega)}</span>.
      </wc-texto>
      <input class='id-pedido' type='hidden' value='${idPedido}'>
    </lista-item>
  `;

  itemDivisor.querySelector('lista-item').addEventListener('click', function () {
    this.dispatchEvent(new CustomEvent('mostrarpedidopendiente', {
      bubbles: true,
      composed: true
    }));
  });

  return itemDivisor;
};

export default crearItemPedido;
