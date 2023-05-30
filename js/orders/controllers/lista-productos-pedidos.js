import productosPopup from './popups/productos.js';
import ItemDivisor from '../../../components/item-divisor.js';

const productosPedidos = {
  _listaItems: null,
  _productos: {},
  _productosModificados: [],

  get listaItems () { return this._listaItems; },

  get productos () { return this._productos; },

  set productos (productos) { this._productos = productos; },

  /** @param {object} producto */
  set producto (producto) {
    this._productos[producto.idProducto] = {
      id: producto.idProducto,
      precio: producto.precio,
      cantidad: producto.cantidad,
      existencias: producto.existencias
    };
  },

  get productosModificados () { return this._productosModificados; },

  set productosModificados (productos) {
    this._productosModificados = productos;
  },

  incializar () {
    this._listaItems = productosPopup.ventana.querySelector('.productos-comprados');
  },

  enlazarInput (itemProducto) {
    const idProducto = itemProducto.querySelector('.id-producto-pedido').value;
    const miniInput = itemProducto.querySelector('.mini-input');
    const subtotalProducto = itemProducto.querySelector('.subtotal-producto');
    const precio = this._productos[idProducto].precio;

    miniInput.addEventListener('input', () => {
      const cantidad = miniInput.value || miniInput.placeholder;

      const subtotalNuevo = precio * cantidad;
      subtotalProducto.innerText = subtotalNuevo.toFixed(2);
    });

    const cantidad = this._productos[idProducto].cantidad;

    miniInput.addEventListener('change', () => {
      const existencias = this._productos[idProducto].existencias + cantidad;

      if (miniInput.value > existencias) {
        miniInput.value = existencias;

        subtotalProducto.innerText = (precio * existencias).toFixed(2);
      } else if (miniInput.value <= 0) {
        miniInput.value = '';
        subtotalProducto.innerText = (precio * cantidad).toFixed(2);
      }

      if (miniInput.value) {
        this._productosModificados.push({
          id: idProducto,
          cantidad: miniInput.value || cantidad
        });
      } else {
        const indexProducto = this._productosModificados.findIndex((item) => item.id === idProducto);
        delete this._productosModificados[indexProducto];
        this._productosModificados = this._productosModificados.filter((item) => item);
      }
    });
  },

  /**
   * @param {string|number} id
   * @param {string} nombre
   * @param {string|number} cantidad
   * @param {string|number} subtotal
   * @param {string|number} existencias
   */
  agregarProducto (id, nombre, cantidad, subtotal, existencias) {
    const itemDivisor = new ItemDivisor();
    itemDivisor.innerHTML = /*html*/`
      <item-detalles>
        <campo-texto slot='inicio' data-no-etiqueta>
          <input
              class='mini-input'
              type='number'
              min='1'
              max=${existencias + cantidad}
              name='cantidad'
              placeholder=${cantidad}>
        </campo-texto>
        <wc-texto data-tipo-fuente='etiqueta-l'> ×
          <span class='nombre-producto-pedido'>${nombre}</span>
        </wc-texto>
        <wc-texto data-tipo-fuente='etiqueta-l'>
          $<span class='subtotal-producto'>${subtotal}</span> MXN</wc-texto>
        <boton-icono
            slot='final'
            type='button'
            data-icono='delete'
            data-evento='confirmarremoverproductopedido'>
        </boton-icono>
        <input class='id-producto-pedido' type='hidden' value=${id}>
      </item-detalles>
    `;

    productosPopup.listaProductosComprados.appendChild(itemDivisor);
    itemDivisor.querySelector('boton-icono').dataColorTexto = 'var(--clr-error-40)';

    if (itemDivisor.previousElementSibling) itemDivisor.previousElementSibling.dataNoDivisor = false;

    this.enlazarInput(itemDivisor);
  }
};

export default productosPedidos;
