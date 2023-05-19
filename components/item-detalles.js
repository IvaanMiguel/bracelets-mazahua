const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: flex;
    gap: var(--espaciado-chico);
    align-items: center;
  
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  
    padding: var(--espaciado-chico) var(--espaciado-jumbo);
  }

  slot:not([name='inicio'], [name='final'])::slotted(*) {
    flex: 1;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <slot name='inicio'></slot>
  <slot></slot>
  <slot name='final'></slot>
`;

export default class ItemDetalles extends HTMLElement {
  constructor () {
    super();

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }
}

customElements.define('item-detalles', ItemDetalles);
