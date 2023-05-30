export class ListaProductosDisponibles {
  /** @param {HTMLElement} lista */
  constructor (lista) {
    this._lista = lista;
    this._onClick = this._onClick.bind(this);
    this._listaItems = lista.querySelectorAll('lista-item');
    this._productosSeleccionados = {};

    this._lista.querySelectorAll('lista-item').forEach((listaItem) => {
      const existencias = +listaItem.querySelector('.existencias').innerText;

      if (existencias) {
        listaItem.addEventListener('click', this._onClick);
      }
    });
  }

  /** @param {Event} e */
  _onClick (e) {
    const productoItem = e.currentTarget;
    const checkbox = productoItem.querySelector('.check');
    const id = productoItem.querySelector('.id-producto').value;

    checkbox.checked = !checkbox.checked;

    if (checkbox.checked) {
      const nombre = productoItem.querySelector('.nombre').innerText;
      const precio = productoItem.querySelector('.precio').innerText;
      const existencias = productoItem.querySelector('.existencias').innerText;

      this._productosSeleccionados[id] = { id, nombre, precio, existencias, cantidad: 1 };
    } else {
      delete this._productosSeleccionados[id];
    }
  }

  desmarcarProductos () {
    this._listaItems.forEach((listaItem) => {
      listaItem.querySelector('.check').checked = false;
    });
  }

  /**
   * @param {string|number} id
   * @param {number} cantidad
   */
  actualizarProductoDisponible (id, sustraendo = 1) {
    const productoItem = [...this._listaItems].find((listaItem) => {
      return listaItem.querySelector(`.id-producto[value='${id}']`);
    });

    const existenciasProducto = productoItem.querySelector('.existencias');
    existenciasProducto.innerText = +existenciasProducto.innerText - sustraendo;

    if (+existenciasProducto.innerText <= 0) {
      productoItem.classList.add('no-existencias');
      productoItem.removeEventListener('click', this._onClick);
      productoItem.querySelector('.check').checked = false;
    } else {
      productoItem.classList.remove('no-existencias');
      productoItem.addEventListener('click', this._onClick);
    }
  }

  get listaItems () { return this._listaItems; }

  get productosSeleccionados () { return this._productosSeleccionados; }

  set productosSeleccionados (productos) { this._productosSeleccionados = productos; }
}
