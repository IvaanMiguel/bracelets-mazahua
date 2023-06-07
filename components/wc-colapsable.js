const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: flex;
    flex-direction: column;
    box-sizing: border-box;
    border-radius: var(--br-borde);
  }

  :host([data-minicabecera]) .cabecera {
    height: 2.5rem;
  }

  :host([data-colapsado]) .contenido {
    grid-template-rows: 0fr;
  }

  :host md-icono,
  :host ::slotted([slot='icono-cabecera']) {
    transition: transform .2s ease 0s;
  }

  :host([data-colapsado]) md-icono,
  :host([data-colapsado]) ::slotted([slot='icono-cabecera']) {
    transform: rotate(180deg);
  }

  .cabecera {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 3.5rem;
    padding: 0 var(--espaciado-jumbo);
    border-radius: var(--br-borde);
    cursor: pointer;
    user-select: none;
    background-color: var(--clr-fondo-hover);
    color: var(--clr-primario-40);
  }

  .contenido {
    display: grid;
    grid-template-rows: 1fr;
    transition: grid-template-rows .2s ease 0s;
    background: var(--clr-primario-90);
    
  }

  .contenido > * {
    overflow: hidden;
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <div class='cabecera'>
    <slot name='texto-cabecera'></slot>
    <slot name='icono-cabecera'>
      <md-icono data-icono='expand_less' data-opsz='24'></md-icono>
    </slot>
  </div>
  <div class='contenido'>
    <div>
      <slot></slot>
    </div>
  </div>
`;

export default class WCColapsable extends HTMLElement {
  static observedAttributes = ['data-colapsado', 'data-minicabecera'];

  constructor () {
    super();

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    this._onClick = this._onClick.bind(this);

    this._cabecera = this.shadowRoot.querySelector('.cabecera');
  }

  _onClick () { this.dataColapsado = !this.dataColapsado; }

  get dataColapsado () { return this.hasAttribute('data-colapsado'); }

  set dataColapsado (bool) { this.toggleAttribute('data-colapsado', Boolean(bool)); }

  get dataMinicabecera () { return this.hasAttribute('data-minicabecera'); }

  set dataMinicabecera (bool) { this.toggleAttribute('data-minicabecera', Boolean(bool)); }

  connectedCallback () {
    this._cabecera.addEventListener('click', this._onClick);
  }

  disconnectedCallback () {
    this._cabecera.removeEventListener('click', this._onClick);
  }
}

customElements.define('wc-colapsable', WCColapsable);
