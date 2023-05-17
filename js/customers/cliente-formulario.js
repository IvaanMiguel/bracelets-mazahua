const clienteFormulario = {
  formulario: document.getElementById('editar-cliente'),

  input: {
    nombre: null,
    apellidos: null,
    edad: null,
    celular: null,
    email: null
  },

  placeholder: {
    nombre: '',
    apellidos: '',
    edad: '',
    celular: '',
    email: ''
  },

  get nombre () { return this.placeholder.nombre; },

  set nombre (string) {
    this.placeholder.nombre = string;
    this.input.nombre.placeholder = string;
  },

  get apellidos () { return this.placeholder.apellidos; },

  set apellidos (string) {
    this.placeholder.apellidos = string;
    this.input.apellidos.placeholder = string;
  },

  get edad () { return this.placeholder.edad; },

  set edad (string) {
    this.placeholder.edad = string;
    this.input.edad.placeholder = string;
  },

  get celular () { return this.placeholder.celular; },

  set celular (string) {
    this.placeholder.celular = string;
    this.input.celular.placeholder = string;
  },

  get email () { return this.placeholder.email; },

  set email (string) {
    this.placeholder.email = string;
    this.input.email.placeholder = string;
  },

  inicializar () {
    this.input.nombre = this.formulario.querySelector('[name="nombre"]');
    this.input.apellidos = this.formulario.querySelector('[name="apellidos"]');
    this.input.edad = this.formulario.querySelector('[name="edad"]');
    this.input.celular = this.formulario.querySelector('[name="celular"]');
    this.input.email = this.formulario.querySelector('[name="email"]');

    this.defaultPlaceholder();
  },

  defaultPlaceholder () {
    this.nombre = 'Cargando...';
    this.apellidos = 'Cargando...';
    this.edad = 'Cargando...';
    this.celular = 'Cargando...';
    this.email = 'Cargando...';
  }
};

clienteFormulario.inicializar();

export default clienteFormulario;
