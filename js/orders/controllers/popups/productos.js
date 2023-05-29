import productosPedidos from '../lista-productos-pedidos.js';

const productosPopup = {
  _ventana: document.getElementById('editar-productos-pedidos'),

  /** @type {HTMLElement} */
  _tabs: null,

  /** @type {HTMLElement} */

  _productoSeleccionado: null,

  _listaProductosComprados: null,

  _listaProductosDisponibles: null,

  _nuevosProductosAgregados: [],

  get ventana () { return this._ventana; },

  get tabs () { return this._tabs; },

  get productosDisponiblesItems () {
    return this._listaProductosDisponibles.querySelectorAll('lista-item');
  },

  /** @param {string|number} id */
  set productoSeleccionado (id) {
    this._productoSeleccionado = id;
  },

  get productoSeleccionado () { return this._productoSeleccionado; },

  get listaProductosComprados () { return this._listaProductosComprados; },

  get nuevosProductosAgregados () { return this._nuevosProductosAgregados; },

  set nuevosProductosAgregados (productos) {
    this._nuevosProductosAgregados = productos;
  },

  get listaProductosDisponibles () { return this._listaProductosDisponibles; },

  inicializar () {
    this._productosComprados = this.ventana.querySelector('.productos-comprados');
    this._tabs = this.ventana.querySelector('.tabs-productos-popup');
    this._listaProductosComprados = this.ventana.querySelector('.productos-comprados');
    this._listaProductosDisponibles = this.ventana.querySelector('.lista-productos');

    this._inicializarProductosDisponibles();

    this._buscarProductoNuevoEvt();
    this._regresarEvt();
    this._ventanaOcultaEvt();
  },

  reiniciar () {
    this._listaProductosComprados.replaceChildren();
    this._tabs.seleccionarTab(1);
  },

  reiniciarCampos () {
    [...this._listaProductosComprados.children].forEach((item) => {
      item.querySelector('.mini-input').value = '';
    });
  },

  tieneCamposEditados () {
    let camposEditados = false;

    [...this._listaProductosComprados.children].forEach((item) => {
      if (item.querySelector('.mini-input').value) camposEditados = true;
    });

    return camposEditados;
  },

  reiniciarProductosDisponibles () {
    this.productosDisponiblesItems.forEach((item) => {
      const checkbox = item.querySelector('.check');
      checkbox.checked = false;
    });
  },

  _inicializarProductosDisponibles () {
    this.productosDisponiblesItems.forEach((item) => {
      const checkbox = item.querySelector('.check');
      item.addEventListener('click', () => {
        checkbox.checked = !checkbox.checked;

        const idProducto = item.querySelector('.id-producto').value;

        console.log(productosPedidos.productos);
        if (productosPedidos.productos[idProducto]) return;

        if (checkbox.checked) {
          this._nuevosProductosAgregados.push({
            id: idProducto,
            cantidad: 1
          });
        } else {
          const indice = this._nuevosProductosAgregados.indexOf(idProducto);
          this._nuevosProductosAgregados = this._nuevosProductosAgregados.splice(indice, indice);
        }

        console.log(this._nuevosProductosAgregados);
      });
    });
  },

  _buscarProductoNuevoEvt () {
    this.ventana.addEventListener('buscarproductonuevo', () => {
      this._tabs.seleccionarTab(2);

      this._listaProductosComprados.querySelectorAll('.id-producto-pedido').forEach((id) => {
        const productoId = this._listaProductosDisponibles.querySelector(`.id-producto[value='${id.value}']`);

        let productoItem;
        if (productoId) productoItem = productoId.parentElement;

        if (!productoItem) return;
        productoItem.querySelector('.check').checked = true;
      });
    });
  },

  _regresarEvt () {
    this.ventana.addEventListener('regresar', () => {
      this._tabs.seleccionarTab(1);
      this.reiniciarProductosDisponibles();
      this._nuevosProductosAgregados = [];
    });
  },

  _ventanaOcultaEvt () {
    this.ventana.addEventListener('ventanaoculta', () => {
      this.ventana.dispatchEvent(new CustomEvent('regresar'));
      this.reiniciarCampos();
      this._nuevosProductosAgregados = [];
    });
  }
};

export default productosPopup;
