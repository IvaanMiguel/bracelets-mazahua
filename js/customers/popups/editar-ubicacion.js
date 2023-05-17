const ventanaEditarUbicacion = {
  _ventana: document.getElementById('editar-ubicacion'),
  _infoUbicacionRaiz: document.getElementById('informacion-ubicacion'),

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

  _callePrincipalPlaceholder: '',
  _callesAdyacentesPlaceholder: '',
  _coloniaPlaceholder: '',
  _numeroExteriorPlaceholder: '',
  _numeroInteriorPlaceholder: '',
  _codigoPostalPlaceholder: '',

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

  get callePrincipalPlaceholder () { return this._callePrincipalPlaceholder; },

  set callePrincipalPlaceholder (string) {
    this._callePrincipalPlaceholder = string;
    this._inputCallePrincipal.placeholder = string;
  },

  get callesAdyacentesPlaceholder () { return this._callesAdyacentesPlaceholder; },

  set callesAdyacentesPlaceholder (string) {
    this._callesAdyacentesPlaceholder = string;
    this._inputCallesAdyacentes.placeholder = string;
  },

  get coloniaPlaceholder () { return this._coloniaPlaceholder; },

  set coloniaPlaceholder (string) {
    this._coloniaPlaceholder = string;
    this._inputColonia.placeholder = string;
  },

  get numeroExteriorPlaceholder () { return this._numeroExteriorPlaceholder; },

  set numeroExteriorPlaceholder (string) {
    this._numeroExteriorPlaceholder = string;
    this._inputNumeroExterior.placeholder = string;
  },

  get numeroInteriorPlaceholder () { return this._numeroInteriorPlaceholder; },

  set numeroInteriorPlaceholder (string) {
    this._numeroInteriorPlaceholder = string;
    this._inputNumeroInterior.placeholder = string;
  },

  get codigoPostalPlaceholder () { return this._codigoPostalPlaceholder; },

  set codigoPostalPlaceholder (string) {
    this._codigoPostalPlaceholder = string;
    this._inputCodigoPostal.placeholder = string;
  },

  inicializar () {
    this._inputCallePrincipal = this.ventana.querySelector('[name="callePrincipal"]');
    this._inputCallesAdyacentes = this.ventana.querySelector('[name="callesAdyacentes"]');
    this._inputColonia = this.ventana.querySelector('[name="colonia"]');
    this._inputNumeroExterior = this.ventana.querySelector('[name="numeroExterior"]');
    this._inputNumeroInterior = this.ventana.querySelector('[name="numeroInterior"]');
    this._inputCodigoPostal = this.ventana.querySelector('[name="cp"]');

    this.reiniciarPlaceholders();
  },

  reiniciarCampos () {
    this.callePrincipal = '';
    this.callesAdyacentes = '';
    this.colonia = '';
    this.numeroExterior = '';
    this.numeroInterior = '';
    this.codigoPostal = '';

    this.ventana.querySelectorAll('item-error').forEach((item) => item.remove());
  },

  reiniciarVentana () {
    this.reiniciar();
    this.reiniciarPlaceholders();
  },

  /** @returns {boolean} */
  tieneCamposEditados () {
    return (this.callePrincipal || this.callesAdyacentes || this.colonia ||
        this.numeroExterior || this.numeroInterior || this.codigoPostal);
  },

  actualizarPlaceholders () {
    const ubicacion = this._infoUbicacionRaiz.contenido;

    this.callePrincipalPlaceholder = ubicacion['Calle principal'];
    this.callesAdyacentesPlaceholder = ubicacion['Calle(s) adyacente(s)'];
    this.coloniaPlaceholder = ubicacion.Colonia;
    this.numeroExteriorPlaceholder = ubicacion['Número exterior'];
    this.numeroInteriorPlaceholder = ubicacion['Número interior'];
    this.codigoPostalPlaceholder = ubicacion['Código postal'];
  },

  reiniciarPlaceholders () {
    this.callePrincipalPlaceholder = 'Cargando...';
    this.callesAdyacentesPlaceholder = 'Cargando...';
    this.coloniaPlaceholder = 'Cargando...';
    this.numeroExteriorPlaceholder = 'Cargando...';
    this.numeroInteriorPlaceholder = 'Cargando...';
    this.codigoPostalPlaceholder = 'Cargando...';
  }
};

ventanaEditarUbicacion.inicializar();

export default ventanaEditarUbicacion;
