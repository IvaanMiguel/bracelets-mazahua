import { productosDisponiblesEdicion } from '../../init.js';

const productosPopup = {
  _ventana: document.getElementById('editar-productos-pedidos'),

  /** @type {HTMLElement} */
  _tabs: null,

  /** @type {HTMLElement} */

  _productoSeleccionado: null,

  _listaProductosComprados: null,

  _nuevosProductosAgregados: {},

  get ventana () { return this._ventana; },

  get tabs () { return this._tabs; },

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

  inicializar () {
    this._productosComprados = this.ventana.querySelector('.productos-comprados');
    this._tabs = this.ventana.querySelector('.tabs-productos-popup');
    this._listaProductosComprados = this.ventana.querySelector('.productos-comprados');
    this._listaProductosDisponibles = this.ventana.querySelector('.lista-productos');

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

  _buscarProductoNuevoEvt () {
    this.ventana.addEventListener('buscarproductonuevo', () => {
      this._tabs.seleccionarTab(2);

      this._listaProductosComprados.querySelectorAll('.id-producto-pedido').forEach((id) => {
        const productoId = [...productosDisponiblesEdicion.listaItems].find((item) => {
          return item.querySelector(`.id-producto[value='${id.value}']`);
        });

        const productoItem = productoId.parentElement;
        productoItem.querySelector('.check').checked = true;
      });
    });
  },

  _regresarEvt () {
    this.ventana.addEventListener('regresar', () => {
      this._tabs.seleccionarTab(1);
      productosDisponiblesEdicion.desmarcarProductos();
      productosDisponiblesEdicion.productosSeleccionados = {};
    });
  },

  _ventanaOcultaEvt () {
    this.ventana.addEventListener('ventanaoculta', () => {
      this.ventana.dispatchEvent(new CustomEvent('regresar'));
      this.reiniciarCampos();
      productosDisponiblesEdicion.productosSeleccionados = {};
    });
  }
};

export default productosPopup;
