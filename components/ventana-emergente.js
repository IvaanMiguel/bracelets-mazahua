const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: none;
    align-items: center;
    justify-content: center;

    height: 100vh;
    height: 100svh;
    width: 100%;

    position: fixed;
    top: 0;
    z-index: 998;
  }

  :host([data-mostrar]) {
    display: flex;
  }

  :host([data-no-pie]) :where(wc-divisor, .pie) {
    display: none;
  }

  .fondo {
    height: 100%;
    width: 100%;
    position: fixed;
    z-index: 999;

    background-color: rgba(0, 0, 0, 0.5);
  }

  .ventana {
    display: flex;
    flex-direction: column;

    width: clamp(18.75rem, 65%, 40rem);
    box-sizing: border-box;
    overflow: hidden;
    max-height: 90%;

    background-color: #fff;
    border-radius: var(--br-borde);
    box-shadow: var(--bs-elevacion-3);

    z-index: 1000;
  }

  .ventana > * {
    padding: var(--espaciado-jumbo);
  }

  .cabecera {
    display: flex;
    align-items: center;
    justify-content: space-between;

    background-color: var(--clr-primario-40);
    color: #ffffff;
    padding: var(--espaciado-grande) var(--espaciado-jumbo);
    min-height: 4rem;
    box-sizing: border-box;
  }

  .contenido {
    overflow: auto;
  }

  .pie {
    display: flex;
    justify-content: space-between;
    gap: var(--espaciado-grande);
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <div class='fondo'></div>
  <div class='ventana'>
    <div class='cabecera'>
      <slot name='cabecera-inicio'></slot>
      <slot name='cabecera-final'></slot>
    </div>
    <div class='contenido'>
      <slot></slot>
    </div>
    <wc-divisor></wc-divisor>
    <div class='pie'>
      <contenedor-flex gap='var(--espaciado-grande)'>
        <slot name='pie-inicio'></slot>
      </contenedor-flex>
      <contenedor-flex gap='var(--espaciado-grande)'>
        <slot name='pie-final'></slot>
      </contenedor-flex>
    </div>
  </div>
`;

class VentanaEmergente extends HTMLElement {
  static observedAttributes = ['data-cierre-explicito'];

  constructor () {
    super();

    this.cerrarVentana = this.cerrarVentana.bind(this);

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    this._fondo = this.shadowRoot.querySelector('.fondo');
  }

  mostrarVentana () { this.dataMostrar = true; }

  cerrarVentana () {
    this.dataMostrar = false;
    this.dispatchEvent(new CustomEvent('ventanaoculta', { bubbles: true, composed: true }));
  }

  get dataMostrar () { return this.hasAttribute('data-mostrar'); }

  set dataMostrar (bool) { this.toggleAttribute('data-mostrar', Boolean(bool)); }

  get dataCierreExplicito () { return this.hasAttribute('data-cierre-explicito'); }

  set dataCierreExplicito (bool) { this.toggleAttribute('data-cierre-explicito', Boolean(bool)); }

  connectedCallback () {
    if (!this.dataCierreExplicito) {
      this._fondo.addEventListener('click', this.cerrarVentana);
    }
  }

  disconnectedCallback () {
    this._fondo.removeEventListener('click', this.cerrarVentana);
  }

  attributeChangedCallback (name, oldValue, newValue) {
    switch (name) {
      case 'data-cierre-explicito':
        this.dataCierreExplicito
          ? this._fondo.removeEventListener('click', this.cerrarVentana)
          : this._fondo.addEventListener('click', this.cerrarVentana);
        break;
    }
  }
}

customElements.define('ventana-emergente', VentanaEmergente);
