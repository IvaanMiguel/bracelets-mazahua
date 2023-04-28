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

    this._actualizarMenu = this.actualizarMenu.bind(this);

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }

  actualizarMenu () {
    this.dataRetraido = !this.dataRetraido;
  }

  actualizarBotones () {
    this.querySelectorAll('[href], [data-evento="confirmarcierresesion"]').forEach((boton) => {
      const etiqueta = boton.shadowRoot.querySelector('span');

      if (this.dataRetraido) {
        boton.dataVariante = 'icono';
        etiqueta.style.width = '0';
        etiqueta.style.opacity = '0';
        etiqueta.style.fontSize = '0';
        return;
      }

      boton.dataVariante = 'texto-icono';
      etiqueta.style = null;
    });
  }

  get dataRetraido () { return this.hasAttribute('data-retraido'); }

  set dataRetraido (bool) { this.toggleAttribute('data-retraido', Boolean(bool)); }

  connectedCallback () {
    this.addEventListener('alternarmenu', this._actualizarMenu);
  }

  disconnectedCallback () {
    this.removeEventListener('alternarmenu', this._actualizarMenu);
  }

  attributeChangedCallback (name, oldValue, newValue) {
    if (oldValue === newValue) return;

    switch (name) {
      case 'data-retraido':
        this.actualizarBotones();
        break;
    }
  }
}

customElements.define('menu-lateral', MenuLateral);
