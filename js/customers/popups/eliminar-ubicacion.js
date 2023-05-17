const ventanaEliminarUbicacion = {
  _ventana: document.getElementById('eliminar-ubicacion'),
  _infoUbicacionRaiz: document.getElementById('informacion-ubicacion'),

  /** @type {NodeListOf} */
  _nombreClienteItems: null,

  _nombreCliente: '',

  /** @type {HTMLElement} */
  _infoUbicacion: null,

  get ventana () { return this._ventana; },

  get nombreClienteItems () { return this._nombreClienteItems; },

  get nombreCliente () { return this._nombreCliente; },

  /** @param {string} nombre */
  set nombreCliente (nombre) {
    this._nombreCliente = nombre;
    this._nombreClienteItems.forEach((nombreItem) => (nombreItem.innerText = nombre));
  },

  get infoUbicacion () { return this._infoUbicacion; },

  /** @param {HTMLElement} infoDetalles */
  set infoUbicacion (infoDetalles) {
    this.infoUbicacion.replaceWith(infoDetalles);
    this._infoUbicacion = infoDetalles;
  },

  inicializar () {
    this._nombreClienteItems = this._ventana.querySelectorAll('.nombre-cliente');
    this._infoUbicacion = document.getElementById('info-ubicacion-ventana');

    this.reiniciar();
  },

  reiniciar () {
    this.nombreCliente = 'Cargando...';
    this.infoUbicacion.innerHTML = /*html*/`
      <wc-texto style='padding: var(--espaciado-chico) var(--espaciado-jumbo);'>
        Cargando...
      </wc-texto>
    `;
  },

  actualizarInfoUbicacion () {
    const clon = this._infoUbicacionRaiz.cloneNode(true);
    clon.id = 'info-ubicacion-ventana';
    this.infoUbicacion = clon;
  }
};

ventanaEliminarUbicacion.inicializar();

export default ventanaEliminarUbicacion;
