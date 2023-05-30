const infoClientePopup = {
  _info: document.getElementById('info-cliente-popup'),
  _infoCargada: false,

  get info () { return this._info; },

  get infoCargada () { return this._infoCargada; },

  set infoCargada (bool) { this._infoCargada = bool; },

  /**
   * @param {string} nombre
   * @param {string} apellidos
   * @param {string} edad
   * @param {string} celular
   * @param {string} email
   */
  setInfo (nombre, apellidos, edad, celular, email) {
    this.info.contenido = {
      Nombre: nombre,
      'Apellido(s)': apellidos,
      Edad: `${edad} año${edad === 1 ? '' : 's'}`,
      'Número de celular': celular,
      'Dirección de email': email || 'Sin email'
    };

    this.infoCargada = true;
  },

  inicializar () {
    this.reiniciar();
  },

  reiniciar () {
    this.info.contenido = {
      Nombre: 'Cargando...',
      'Apellido(s)': 'Cargando...',
      Edad: 'Cargando...',
      'Número de celular': 'Cargando...',
      'Dirección de email': 'Cargando...'
    };

    this.infoCargada = false;
  }
};

infoClientePopup.inicializar();

export default infoClientePopup;
