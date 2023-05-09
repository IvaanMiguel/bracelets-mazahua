const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: flex;
    flex-direction: column;

    box-sizing: border-box;
  }

  div {
    display: flex;
    gap: var(--espaciado-chico);
    align-items: center;
  
    flex: 1;
  
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  
    padding: var(--espaciado-chico) var(--espaciado-jumbo);
  }

  slot:not([name='final'])::slotted(*) {
    flex: 1;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <div>
    <slot></slot>
    <slot name='final'></slot>
  </div>
`;

export default class ItemDetalles extends HTMLElement {
  constructor () {
    super();

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }
}

customElements.define('item-detalles', ItemDetalles);
