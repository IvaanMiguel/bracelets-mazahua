const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    --transiciones: flex .2s ease 0s;

    display: flex;
    flex-direction: column;
    flex: 1;

    max-width: 15rem;
    min-width: min-content;
    box-sizing: border-box;

    background-color: var(--clr-primario-40);
    padding: var(--espaciado-jumbo);
    border-radius: 0 var(--br-borde) var(--br-borde) 0;
    box-shadow: var(--bs-elevacion-2);
    transition: var(--transiciones);
  }

  :host([data-retraido]) {
    flex: unset;
  }

  div {
    display: flex;
    flex-direction: column;
    gap: var(--espaciado-grande);

    margin-bottom: auto;
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <div>
    <slot></slot>
  </div>
  <slot name='menu-final'></slot>
`;

class MenuLateral extends HTMLElement {
  static observedAttributes = ['data-retraido'];

  constructor () {
    super();

    if (!this.dataRetraido) this.style.minWidth = '15rem';

    this._actualizarMenu = this.actualizarMenu.bind(this);

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }

  actualizarMenu () {
    this.style.minWidth = null;

    this.dataRetraido = !this.dataRetraido;
  }

  get dataRetraido () { return this.hasAttribute('data-retraido'); }

  set dataRetraido (bool) { this.toggleAttribute('data-retraido', Boolean(bool)); }

  connectedCallback () {
    this.addEventListener('alternarmenu', this._actualizarMenu);
  }

  disconnectedCallback () {
    this.removeEventListener('alternarmenu', this._actualizarMenu);
  }
}

customElements.define('menu-lateral', MenuLateral);
