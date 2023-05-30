const datosDestinatarioPopup = {
  _ventana: document.getElementById('editar-datos-destinatario'),

  /** @type {HTMLInputElement} */
  _nombreDestinatario: null,

  /** @type {HTMLInputElement} */
  _celularDestinatario: null,

  get ventana () { return this._ventana; },

  /** @param {string} string */
  set nombreDestinatarioPlaceholder (string) {
    this._nombreDestinatario.placeholder = string;
  },

  /** @param {string} string */
  set celularDestinatarioPlaceholder (string) {
    this._celularDestinatario.placeholder = string;
  },

  /** @param {string} string */
  set nombreDestinatario (string) {
    this._nombreDestinatario.value = string;
  },

  get nombreDestinatario () { return this._nombreDestinatario.value; },

  /** @param {string} string */
  set celularDestinatario (string) {
    this._celularDestinatario.value = string;
  },

  get celularDestinatario () { return this._celularDestinatario.value; },

  incializar () {
    this._nombreDestinatario = this.ventana.querySelector('[name="nombreDestinatario"]');
    this._celularDestinatario = this.ventana.querySelector('[name="celularDestinatario"]');
  },

  reiniciar () {
    this.nombreDestinatario = '';
    this.celularDestinatario = '';

    this.ventana.querySelectorAll('item-error').forEach((item) => item.remove());
  },

  reiniciarPlaceholders () {
    this.nombreDestinatarioPlaceholder = 'Cargando...';
    this.celularDestinatarioPlaceholder = 'Cargando...';
  },

  tieneCamposEditados () {
    return (this._nombreDestinatario.value || this._celularDestinatario.value);
  }
};

export default datosDestinatarioPopup;
