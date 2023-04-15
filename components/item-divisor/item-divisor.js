const template = document.createElement('template');
template.innerHTML = /*html*/`
  <slot></slot>
  <wc-divisor></wc-divisor>
`;

class ItemDivisor extends HTMLElement {
  static observedAttributes = ['data-no-divisor'];

  constructor () {
    super();

    this.attachShadow({ mode: 'open' });
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    this._childListObserver = new MutationObserver(() => {
      if (this.childElementCount === 0) this.remove();
    });
  }

  _actualizarDivisor () {
    const divisor = this.shadowRoot.querySelector('wc-divisor');
    this.dataNoDivisor ? divisor.style.display = 'none' : divisor.style.display = null;
  }

  get dataNoDivisor () { return this.hasAttribute('data-no-divisor'); }

  set dataNoDivisor (bool) { this.toggleAttribute('data-no-divisor', Boolean(bool)); }

  connectedCallback () {
    this._childListObserver.observe(this, { childList: true });
  }

  disconnectedCallback () {
    this._childListObserver.disconnect();
  }

  attributeChangedCallback (name, oldValue, newValue) {
    switch (name) {
      case 'data-no-divisor':
        this._actualizarDivisor();
        break;
    }
  }
}

customElements.define('item-divisor', ItemDivisor);
