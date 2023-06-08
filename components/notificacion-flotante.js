const hojaCSS = /*css*/`
  :host {
    --_color-tipo: #000000;

    display: flex;
    justify-content: space-between;
    gap: var(--espaciado-mediano);

    box-shadow: var(--bs-elevacion-3);
    border-radius: var(--br-borde);
    background-color: var(--clr-fondo-hover);
    color: var(--_color-tipo);

    outline: 1px solid var(--_color-tipo);
    outline-offset: -1px;

    width: 25rem;
    padding: var(--espaciado-jumbo);

    transition: opacity .2s ease 0s;
  }

  :host([data-tipo='error']) {
    --_color-tipo: var(--clr-error-40);
  }

  :host([data-tipo='exito']) {
    --_color-tipo: var(--clr-exito-40);
  }

  :host(:hover) {
    opacity: .5;
  }
`;

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <contenedor-flex gap='var(--espaciado-mediano)'>
    <md-icono data-icono='error' data-escala='l' data-opsz='22'></md-icono>
    <contenedor-flex flex-direction='column' gap='var(--espaciado-chico)'>
      <slot></slot>
    </contenedor-flex>
  </contenedor-flex>
  <boton-icono data-icono='close' data-evento='cerrarnotificacion' data-color-texto='var(--_color-tipo)'></boton-icono>
`;

export default class NotificacionFlotante extends HTMLElement {
  static observedAttributes = ['data-tipo'];

  constructor () {
    super();

    this._notificacionDuracion = 5000; // ms.

    this._CSS = new CSSStyleSheet();
    this._CSS.replaceSync(hojaCSS);

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [this._CSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    this._icono = this.shadowRoot.querySelector('md-icono');
  }

  _cerrarNotificacion () { this.remove(); }

  _cambiarIcono (tipo) {
    switch (tipo) {
      case 'exito':
        this._icono.dataset.icono = 'check_circle';
        break;

      case 'error':
        this._icono.dataset.icono = 'error';
        break;
    }
  }

  connectedCallback () {
    this.addEventListener('cerrarnotificacion', this._cerrarNotificacion);

    setTimeout(() => this._cerrarNotificacion(), this._notificacionDuracion);
  }

  disconnectedCallback () {
    this.removeEventListener('cerrarnotificacion', this._cerrarNotificacion);
  }

  attributeChangedCallback (name, oldValue, newValue) {
    if (oldValue === newValue) return;

    switch (name) {
      case 'data-tipo':
        this._cambiarIcono(newValue);
        break;
    }
  }
}

customElements.define('notificacion-flotante', NotificacionFlotante);
