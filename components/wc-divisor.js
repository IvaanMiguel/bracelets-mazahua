const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: block;
  }

  :host([data-orientacion='horizontal']) {
    width: 100%;
    max-height: 0px;
    border-bottom: 1px solid var(--clr-neutral-80);
  }

  :host([data-orientacion='vertical']) {
    height: 100%;
    max-width:0px;
    border-left: 1px solid var(--clr-neutral-80);
  }
`);

class WCDivisor extends HTMLElement {
  static observedAttributes = ['data-orientacion'];

  constructor () {
    super();

    this.dataOrientacion = 'horizontal';

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
  }

  get dataOrientacion () { return this.dataset.orientacion; }

  set dataOrientacion (orientacion) {
    if (this.dataOrientacion === orientacion) return;
    this.dataset.orientacion = orientacion;
  }

  attributeChangedCallback (name, oldValue, newValue) {
    if (oldValue === newValue) return;
    switch (name) {
      case 'data-orientacion':
        this.dataOrientacion = newValue;
        break;
    }
  }
}

customElements.define('wc-divisor', WCDivisor);
