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

    background-color: #fff;
    width: clamp(18.75rem, 50%, 30rem);
    box-sizing: border-box;
    border-radius: var(--br-borde);
    overflow: hidden;
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
    padding: var(--espaciado-chico) var(--espaciado-jumbo);

    font-size: var(--fs-titulo-mediano);
    line-height: var(--lh-titulo-mediano);
    letter-spacing: var(--ls-tiulo-mediano);
    font-weight: var(--fw-medio);
  }

  .cuerpo {
    font-size: var(--fs-cuerpo-mediano);
    line-height: var(--lh-cuerpo-mediano);
    letter-spacing: var(--ls-cuerpo-mediano);
    font-weight: var(--fw-normal);
  }

  .pie {
    display: flex;
    justify-content: flex-end;
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
    <div class='cuerpo'>
      <slot></slot>
    </div>
    <wc-divisor></wc-divisor>
    <div class='pie'>
      <slot name='pie-final'></slot>
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

  cerrarVentana () { this.dataMostrar = false; }

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
