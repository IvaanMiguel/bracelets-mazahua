const datosEntregaPopup = {
  _ventana: document.getElementById('editar-informacion-entrega'),

  /** @type {HTMLInputElement} */
  _tipoEntrega: null,

  /** @type {HTMLSelectElement} */
  _ubicaciones: null,

  /** @type {HTMLElement} */
  _infoUbicacion: null,

  /** @type {HTMLInputElement} */
  _aplicacion: null,

  /** @type {HTMLInputElement} */
  _fechaEntrega: null,

  /** @type {HTMLInputElement} */
  _horaEntrega: null,

  /** @type {HTMLElement} */
  _contenedorUbicaciones: null,

  /** @type {HTMLElement} */
  _contenedorAplicaciones: null,

  get ventana () { return this._ventana; },

  /** @param {string} tipoEntrega */
  set tipoEntrega (tipoEntrega) {
    this._tipoEntrega.forEach((input) => {
      if (input.value === tipoEntrega) {
        input.checked = true;
        input.dispatchEvent(new Event('change'));
      }
    });
  },

  get tipoEntrega () {
    this._tipoEntrega.forEach((input) => {
      if (input.checked) return input.value;
    });
  },

  get ubicaciones () { return this._ubicaciones; },

  /** @param {string|number} id */
  set idUbicacion (id) { this._ubicaciones.value = id; },

  /** @param {string} aplicacion */
  set aplicacion (aplicacion) {
    this._aplicacion.forEach((input) => {
      if (input.value === aplicacion) {
        input.checked = true;
      }
    });
  },

  get aplicacion () {
    this._aplicacion.forEach((input) => {
      if (input.checked) return input.value;
    });
  },

  /** @param {string} fecha */
  set fechaEntrega (fecha) {
    this._fechaEntrega.value = fecha;
    this._fechaEntrega.min = fecha;
  },

  /** @param {string} hora */
  set horaEntrega (hora) { this._horaEntrega.value = hora; },

  inicializar () {
    // this._horaFormato = `${this._horaMinima.getHours()}:${String(this._horaMinima.getMinutes()).padStart(2, '0')}`;

    this._tipoEntrega = this.ventana.querySelectorAll('[name="tipoEntrega"]');
    this._ubicaciones = this.ventana.querySelector('[name="ubicacion"]');
    this._infoUbicacion = this.ventana.querySelector('.info-ubicacion');
    this._aplicacion = this.ventana.querySelectorAll('[name="aplicacion"]');
    this._fechaEntrega = this.ventana.querySelector('[name="fechaEntrega"]');
    this._horaEntrega = this.ventana.querySelector('[name="horaEntrega"]');

    this._contenedorUbicaciones = this.ventana.querySelector('#contenedor-ubicaciones');
    this._contenedorAplicaciones = this.ventana.querySelector('#contenedor-aplicaciones');

    this._enlazarTiposEntrega();
    this._enlazarUbicaciones();
  },

  reiniciar () {
    this.tipoEntrega = 'Pick up';
    this.aplicacion = 'Uber';

    this.idUbicacion = '';
    this._ubicaciones.replaceChildren();

    this._infoUbicacion.innerHTML = /*html*/`
      <contenedor-flex margin="auto" padding="var(--espaciado-chico)">
        <wc-texto data-tipo-fuente="etiqueta-l">Ninguna ubicación seleccionada.</wc-texto>
      </contenedor-flex>
    `;
  },

  _enlazarTiposEntrega () {
    this._tipoEntrega.forEach((input) => {
      input.addEventListener('change', () => {
        switch (input.value) {
          case 'Pick up':
            this._contenedorAplicaciones.dataReducir = true;
            this._contenedorUbicaciones.dataReducir = true;
            break;

          case 'Domicilio':
            this._contenedorAplicaciones.dataReducir = true;
            this._contenedorUbicaciones.dataReducir = false;
            break;

          case 'Aplicación':
            this._contenedorAplicaciones.dataReducir = false;
            this._contenedorUbicaciones.dataReducir = false;
            break;
        };
      });
    });
  },

  _enlazarUbicaciones () {
    this._ubicaciones.addEventListener('change', () => {
      const ubicacion = this._ubicaciones.querySelector(`option[value="${this._ubicaciones.value}"]`);

      this._infoUbicacion.contenido = ubicacion.contenido;
    });
  }
};

export default datosEntregaPopup;
