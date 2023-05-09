const hojaCSS = /*css*/`
  :host {
    display: grid;
    grid-template-rows: 1fr;

    transition: grid-template-rows .1s ease 0s;
  }

  :host([data-reducir]) {
    grid-template-rows: 0fr;
  }

  div {
    overflow: hidden;
  }
`;

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <div>
    <slot></slot>
  </div>
`;

export default class ContenedorColapsable extends HTMLElement {
  constructor () {
    super();

    this._CSS = new CSSStyleSheet();
    this._CSS.replaceSync(hojaCSS);

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [this._CSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }

  get dataReducir () { return this.hasAttribute('data-reducir'); }

  set dataReducir (bool) { this.toggleAttribute('data-reducir', Boolean(bool)); }

  connectedCallback () { }

  disconnectedCallback () { }

  attributeChangedCallback (name, oldValue, newValue) { }
}

customElements.define('contenedor-colapsable', ContenedorColapsable);
