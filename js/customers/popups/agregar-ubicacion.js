const ventanaAgregarUbicacion = {
  _ventana: document.getElementById('agregar-ubicacion'),

  /** @type {HTMLInputElement} */
  _inputCallePrincipal: null,

  /** @type {HTMLInputElement} */
  _inputCallesAdyacentes: null,

  /** @type {HTMLInputElement} */
  _inputColonia: null,

  /** @type {HTMLInputElement} */
  _inputNumeroExterior: null,

  /** @type {HTMLInputElement} */
  _inputNumeroInterior: null,

  /** @type {HTMLInputElement} */
  _inputCodigoPostal: null,

  _callePrincipal: '',
  _callesAdyacentes: '',
  _colonia: '',
  _numeroExterior: '',
  _numeroInterior: '',
  _codigoPostal: '',

  get ventana () { return this._ventana; },

  get callePrincipal () { return this._inputCallePrincipal.value; },

  set callePrincipal (string) {
    this._callePrincipal = string;
    this._inputCallePrincipal.value = string;
  },

  get callesAdyacentes () { return this._inputCallesAdyacentes.value; },

  set callesAdyacentes (string) {
    this._callesAdyacentes = string;
    this._inputCallesAdyacentes.value = string;
  },

  get colonia () { return this._inputColonia.value; },

  set colonia (string) {
    this._colonia = string;
    this._inputColonia.value = string;
  },

  get numeroExterior () { return this._inputNumeroExterior.value; },

  set numeroExterior (string) {
    this._numeroExterior = string;
    this._inputNumeroExterior.value = string;
  },

  get numeroInterior () { return this._inputNumeroInterior.value; },

  set numeroInterior (string) {
    this._numeroInterior = string;
    this._inputNumeroInterior.value = string;
  },

  get codigoPostal () { return this._inputCodigoPostal.value; },

  set codigoPostal (string) {
    this._codigoPostal = string;
    this._inputCodigoPostal.value = string;
  },

  inicializar () {
    this._inputCallePrincipal = this.ventana.querySelector('[name="callePrincipal"]');
    this._inputCallesAdyacentes = this.ventana.querySelector('[name="callesAdyacentes"]');
    this._inputColonia = this.ventana.querySelector('[name="colonia"]');
    this._inputNumeroExterior = this.ventana.querySelector('[name="numeroExterior"]');
    this._inputNumeroInterior = this.ventana.querySelector('[name="numeroInterior"]');
    this._inputCodigoPostal = this.ventana.querySelector('[name="cp"]');
  },

  reiniciar () {
    this.callePrincipal = '';
    this.callesAdyacentes = '';
    this.colonia = '';
    this.numeroExterior = '';
    this.numeroInterior = '';
    this.codigoPostal = '';

    this.ventana.querySelectorAll('item-error').forEach((item) => item.remove());
  },

  /** @returns {boolean} */
  tieneCamposEditados () {
    return (this._inputCallePrincipal.value || this._inputCallesAdyacentes.value || this._inputColonia.value ||
        this._inputNumeroExterior.value || this._inputNumeroInterior.value || this._inputCodigoPostal.value);
  }
};

ventanaAgregarUbicacion.inicializar();

export default ventanaAgregarUbicacion;
