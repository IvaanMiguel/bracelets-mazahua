import ItemDivisor from '../../../../components/item-divisor.js';

const productosPopup = {
  _ventana: document.getElementById('editar-productos-pedidos'),

  /** @type {HTMLElement} */
  _tabs: null,

  /** @type {HTMLElement} */
  _productosComprados: null,

  _productoSeleccionado: null,

  get ventana () { return this._ventana; },

  get tabs () { return this._tabs; },

  get productosComprados () { return this._productosComprados; },

  /** @param {string|number} id */
  set productoSeleccionado (id) {
    this._productoSeleccionado = id;
  },

  get productoSeleccionado () { return this._productoSeleccionado; },

  inicializar () {
    this._productosComprados = this.ventana.querySelector('.productos-comprados');
    this._tabs = this.ventana.querySelector('.tabs-productos-popup');
  },

  reiniciar () {
    this._productosComprados.replaceChildren();
    this._tabs.seleccionarTab(1);
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
              max=${existencias}
              name='cantidad'
              placeholder=${cantidad}>
        </campo-texto>
        <wc-texto data-tipo-fuente='etiqueta-l'> ×
          <span class='nombre-producto-pedido'>${nombre}</span>
        </wc-texto>
        <wc-texto data-tipo-fuente='etiqueta-l'> $
          <span class='subtotal-producto'>${subtotal}</span> MXN</wc-texto>
        <boton-icono
            slot='final'
            type='button'
            data-icono='delete'
            data-evento='confirmarremoverproductopedido'>
        </boton-icono>
        <input class='id-producto-pedido' type='hidden' value=${id}>
      </item-detalles>
    `;

    this._productosComprados.appendChild(itemDivisor);

    itemDivisor.querySelector('boton-icono').dataColorTexto = 'var(--clr-error-40)';
  },

  tieneCamposEditados () {
    return false;
  }
};

export default productosPopup;
