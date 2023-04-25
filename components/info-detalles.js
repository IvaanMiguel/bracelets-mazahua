import ItemDetalles from './item-detalles.js';

const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: flex;
    flex-direction: column;
  }

  ::slotted(*) {
    flex: 1;
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <slot></slot>
`;

class InfoDetalles extends HTMLElement {
  constructor () {
    super();

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode('true'));
  }

  get contenido () { return this._contenido; }

  set contenido (contenido) {
    this._contenido = contenido;

    this.replaceChildren();

    for (const info in this._contenido) {
      const itemDetalles = new ItemDetalles();
      itemDetalles.innerHTML = /*html*/`
        <wc-texto data-tipo-fuente='etiqueta-mediana'>${info}</wc-texto>
        <wc-texto data-tipo-fuente='cuerpo-grande'>${this._contenido[info]}</wc-texto>
      `;

      this.appendChild(itemDetalles);
    }
  }
}

customElements.define('info-detalles', InfoDetalles);
