const template = document.createElement('template');
template.innerHTML = /*html*/`
  <slot></slot>
  <wc-divisor></wc-divisor>
`;

const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host([data-no-divisor]) wc-divisor {
    display: none;
  }
`);

class ItemDivisor extends HTMLElement {
  static observedAttributes = ['data-no-divisor'];

  constructor () {
    super();

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    this._childListObserver = new MutationObserver(() => {
      if (this.childElementCount === 0) this.remove();
    });
  }

  get dataNoDivisor () { return this.hasAttribute('data-no-divisor'); }

  set dataNoDivisor (bool) { this.toggleAttribute('data-no-divisor', Boolean(bool)); }

  connectedCallback () {
    this._childListObserver.observe(this, { childList: true });
  }

  disconnectedCallback () {
    this._childListObserver.disconnect();
  }
}

customElements.define('item-divisor', ItemDivisor);
