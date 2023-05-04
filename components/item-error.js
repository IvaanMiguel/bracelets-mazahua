const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: flex;
    gap: var(--espaciado-chico);

    color: var(--clr-error-40);
    margin-right: auto;
  }

  ::slotted([slot='error']) {
    display: flex;

    text-align: start;
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <slot name='icono'></slot>
  <slot name='error'></slot>
`;

export default class ItemError extends HTMLElement {
  constructor () {
    super();

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }
}

customElements.define('item-error', ItemError);
