import ItemDivisor from '../../../components/item-divisor.js';

const productosAgregados = {
  _listaItems: document.getElementById('productos-agregados'),
  _total: document.getElementById('total'),
  _anticipo: document.getElementById('anticipo'),
  _productos: {},

  get listaItems () { return this._listaItems; },

  get total () { return this._total; },

  get anticipo () { return this._anticipo; },

  /** @param {number} total */
  set anticipo (total) { this._anticipo.innerText = (total / 2).toFixed(2); },

  get productos () { return this._productos; },

  set productos (lista) {
    const total = document.getElementById('total');

    for (const producto in lista) {
      const productoInfo = lista[producto];
      if (!this.productos.hasOwnProperty(productoInfo.nombre)) {
        this._productos[productoInfo.nombre] = {
          id: productoInfo.id,
          nombre: productoInfo.nombre,
          precio: productoInfo.precio,
          existencias: productoInfo.existencias,
          cantidad: productoInfo.cantidad
        };

        this._agregarItem(this._productos[productoInfo.nombre]);

        total.innerText = (+total.innerText + +productoInfo.precio).toFixed(2);
        this.anticipo = +this.total.innerText;
      }
    };
  },

  _agregarItem (productoInfo) {
    const productoItem = new ItemDivisor();
    productoItem.innerHTML = /*html*/`
      <item-detalles>
        <campo-texto slot='inicio' data-no-etiqueta>
          <input
              class='mini-input'
              type='number'
              min='1'
              max=${productoInfo.existencias}
              name='cantidad'
              placeholder='1'>
        </campo-texto>
        <wc-texto slot='inicio' data-tipo-fuente='etiqueta-l'>×</wc-texto>
        <wc-texto class='nombre-seleccionado' data-tipo-fuente='etiqueta-l'>
          ${productoInfo.nombre}
        </wc-texto>
        <wc-texto class='subtotal' data-tipo-fuente='etiqueta-l'>$${productoInfo.precio} MXN</wc-texto>
        <boton-icono
            slot='final'
            type='button'
            data-icono='delete'
            data-evento='removerproducto'>
        </boton-icono>
        <input class='id-seleccionado' type='hidden' value=${productoInfo.id}>
      </item-detalles>
    `;

    this._listaItems.appendChild(productoItem);
    if (productoItem.previousElementSibling) {
      productoItem.previousElementSibling.dataNoDivisor = false;
    }
    productoItem.querySelector('item-detalles boton-icono').dataColorTexto = 'var(--clr-error-40)';

    const subtotal = productoItem.querySelector('.subtotal');

    const inputCantidad = productoItem.querySelector('[name="cantidad"]');

    inputCantidad.addEventListener('input', () => {
      const cantidaPrevia = productoInfo.cantidad;
      productoInfo.cantidad = inputCantidad.value || 1;
      const subtotalActual = productoInfo.cantidad * productoInfo.precio;
      const subtotalPrevio = cantidaPrevia * productoInfo.precio;
      subtotal.innerText = `$${subtotalActual.toFixed(2)} MXN`;

      this.total.innerText = (+this.total.innerText + (subtotalActual - subtotalPrevio)).toFixed(2);
      this.anticipo = +this.total.innerText;
    });

    inputCantidad.addEventListener('change', () => {
      if (+inputCantidad.value > +inputCantidad.max) {
        inputCantidad.value = inputCantidad.max;
        inputCantidad.dispatchEvent(new Event('input'));
      } else if (+inputCantidad.value < 1) {
        inputCantidad.value = 1;
        inputCantidad.dispatchEvent(new Event('input'));
      }
    });
  },

  removerProducto (nombre) {
    const productoInfo = this.productos[nombre];
    this.total.innerText = (+this.total.innerText - productoInfo.precio * productoInfo.cantidad).toFixed(2);
    this.anticipo = +this.total.innerText;

    delete this.productos[nombre];
  },

  removerProductos () {
    this.total.innerText = '0.00';
    this.anticipo = '0.00';

    this._productos = {};
  }
};

export default productosAgregados;
