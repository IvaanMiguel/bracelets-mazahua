const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: flex;
    align-items: center;
  }

  :host([data-hover]) div {
    display: unset;
  }

  div {
    position: absolute;
    display: none;

    background-color: var(--clr-superficie-90);
    padding: var(--espaciado-mediano);
    box-sizing: border-box;
    box-shadow: var(--bs-elevacion-2);
    max-width: 21.75rem;

    text-overflow: ellipsis;
    overflow: hidden;
    white-space: pre-line;

    font-size: var(--fs-etiqueta-chica);
    line-height: var(--lh-etiqueta-chica);
    letter-spacing: var(--ls-etiqueta-chica);
    font-weight: var(--fw-medio);
    color: var(--clr-superficie-30);
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <slot></slot>
  <div></div>
`;

class WCEmergente extends HTMLElement {
  static observedAttributes = ['data-mensaje'];

  constructor () {
    super();

    this._onMouseEnter = this._onMouseEnter.bind(this);
    this._onMouseMove = this._onMouseMove.bind(this);
    this._onMouseLeave = this._onMouseLeave.bind(this);

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    this._elementoAncla = this.shadowRoot.firstElementChild;
    this._emergente = this.shadowRoot.querySelector('div');

    this._emergente.textContent = this.dataMensaje;
  }

  _onMouseEnter () { this.dataHover = true; }

  _onMouseMove (e) {
    this._actualizarPosicionEmergente(e.pageX + 15, e.pageY + 25);
  }

  _actualizarPosicionEmergente (x, y) {
    this._emergente.style.left = `${x}px`;
    this._emergente.style.top = `${y}px`;
  }

  _onMouseLeave () {
    this.dataHover = false;
    this._emergente.removeAttribute('style');
  }

  get dataHover () { this.hasAttribute('data-hover'); }

  set dataHover (bool) { this.toggleAttribute('data-hover', Boolean(bool)); }

  get dataMensaje () { return this.dataset.mensaje; }

  set dataMensaje (mensaje) { this.dataset.mensaje = mensaje; }

  connectedCallback () {
    this._elementoAncla.addEventListener('mouseenter', this._onMouseEnter);
    this._elementoAncla.addEventListener('mousemove', this._onMouseMove);
    this._elementoAncla.addEventListener('mouseleave', this._onMouseLeave);
  }

  disconnectedCallback () {
    this._elementoAncla.removeEventListener('mouseenter', this._onMouseEnter);
    this._elementoAncla.removeEventListener('mousemove', this._onMouseMove);
    this._elementoAncla.removeEventListener('mouseleave', this._onMouseLeave);
  }

  attributeChangedCallback (name, oldValue, newValue) {
    switch (name) {
      case 'data-mensaje':
        this._emergente.textContent = this.dataMensaje;
        break;
    }
  }
}

customElements.define('wc-emergente', WCEmergente);
