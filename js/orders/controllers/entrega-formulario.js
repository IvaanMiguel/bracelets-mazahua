import { formatearFecha } from '../../vista-control.js';

const entregaFormulario = {
  _tipoEntrega: document.body.querySelectorAll('#agregar-pedido [name="tipoEntrega"]'),
  _nombreDestinatario: document.body.querySelectorAll('#agregar-pedido [name="nombreDestinatario"]'),
  _celularDestinatario: document.body.querySelectorAll('#agregar-pedido [name="celularDestinatario"]'),
  _fechaEntrega: document.body.querySelectorAll('#agregar-pedido [name="fechaEntrega"]'),
  _horaEntrega: document.body.querySelectorAll('#agregar-pedido [name="horaEntrega"]'),
  _ubicacion: document.body.querySelectorAll('#agregar-pedido [name="ubicacion"]'),
  _aplicacion: document.body.querySelectorAll('[name="aplicacion"]'),
  _infoUbicacion: document.body.querySelectorAll('#agregar-pedido .info-ubicacion'),
  _fechaActual: new Date(),
  _fechaFormato: '',
  _horaMinima: new Date(new Date().getTime() + 5 * 60000),
  _horaFormato: '',

  get tipoEntrega () {
    this._tipoEntrega.forEach((input) => {
      if (input.isChecked) return input.value;
    });
  },

  set tipoEntrega (string) {
    this._tipoEntrega.forEach((input) => {
      if (input.value === string) {
        input.checked = true;
        input.dispatchEvent(new Event('change'));
      }
    });
  },

  get nombreDestinatario () { return this._nombreDestinatario[0].value; },

  set nombreDestinatario (string) {
    this._nombreDestinatario.forEach((input) => {
      input.value = string;
    });
  },

  get celularDestinatario () { return this._celularDestinatario[0].value; },

  set celularDestinatario (string) {
    this._celularDestinatario.forEach((input) => {
      input.value = string;
    });
  },

  get fechaEntrega () { return this._fechaEntrega[0].value; },

  set fechaEntrega (string) {
    this._fechaEntrega.forEach((input) => {
      input.min = string;
      input.value = string;
    });
  },

  get horaEntrega () { return this._horaEntrega[0].value; },

  set horaEntrega (string) {
    this._horaEntrega.forEach((input) => {
      input.value = string;
    });
  },

  get idUbicacion () { return this._ubicacion[0].value; },

  set idUbicacion (string) {
    this._ubicacion.forEach((input) => {
      input.value = string;
    });
  },

  get aplicacion () {
    this._aplicacion.forEach((input) => {
      if (input.isChecked) return input.value;
    });
  },

  set aplicacion (string) {
    this._aplicacion.forEach((input) => {
      if (input.value === string) input.checked = true;
    });
  },

  inicializar () {
    this._fechaFormato = `${this._fechaActual.getFullYear()}-${this._fechaActual.getMonth()}-${this._fechaActual.getDay()}`;

    this._inicializarInputs();

    this._horaFormato = `${String(this._horaMinima.getHours()).padStart(2, '0')}:${String(this._horaMinima.getMinutes()).padStart(2, '0')}`;

    this.fechaEntrega = formatearFecha(this._fechaActual);
    this.horaEntrega = this._horaFormato;
    this._actualizarHoraMinima();

    setInterval(this._actualizarHoraMinima.bind(this), 4 * 60 * 1000);
  },

  actualizarHora () {
    this._horaMinima = new Date(new Date().getTime() + 5 * 60000);
    this._horaFormato = `${this._horaMinima.getHours()}:${String(this._horaMinima.getMinutes()).padStart(2, '0')}`;

    this.horaEntrega = this._horaFormato;
  },

  actualizarFecha () {
    this.fechaEntrega = formatearFecha(this._fechaActual);
  },

  reiniciar () {
    this.tipoEntrega = 'Pick up';
    this.aplicacion = 'Uber';

    this._nombreDestinatario.forEach((input) => (input.placeholder = ''));
    this._celularDestinatario.forEach((input) => (input.placeholder = ''));

    this.nombreDestinatario = '';
    this.celularDestinatario = '';

    this.actualizarHora();
    this.actualizarFecha();

    this._ubicacion.forEach((select) => {
      Array.from(select.children).forEach((option) => {
        if (option.value) option.remove();
      });
    });

    this.idUbicacion = '';
    this._infoUbicacion.forEach((infoUbicacion) => {
      infoUbicacion.innerHTML = /*html*/`
        <contenedor-flex margin='0 auto' padding='var(--espaciado-chico)'>
          <wc-texto data-tipo-fuente='etiqueta-l'>Ninguna ubicación seleccionada.</wc-texto>
        </contenedor-flex>
      `;
    });
  },

  _actualizarHoraMinima () {
    this._horaMinima = new Date(new Date().getTime() + 5 * 60000);
    this._horaFormato = `${this._horaMinima.getHours()}:${String(this._horaMinima.getMinutes()).padStart(2, '0')}`;

    this._horaEntrega.forEach((input) => (input.min = this._horaFormato));
  },

  _inicializarInputs () {
    this._enlazarInputs(this._nombreDestinatario);
    this._enlazarInputs(this._celularDestinatario);
    this._enlazarInputs(this._fechaEntrega);
    this._enlazarInputs(this._horaEntrega);

    this._ubicacion.forEach((select) => {
      select.addEventListener('change', () => {
        const ubicacion = select.querySelector(`option[value='${select.value}']`);
        this._infoUbicacion.forEach((item) => (item.contenido = ubicacion.contenido));

        this._ubicacion.forEach((auxSelect) => (auxSelect.value = select.value));
      });
    });
  },

  _enlazarInputs (inputs) {
    inputs.forEach((input) => {
      input.addEventListener('input', () => {
        inputs.forEach((auxInput) => (auxInput.value = input.value));
      });
    });
  }
};

export default entregaFormulario;
