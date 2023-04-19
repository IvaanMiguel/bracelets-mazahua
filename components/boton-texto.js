import WCBoton from './wc-boton.js';

const CSS = new CSSStyleSheet();
CSS.replaceSync(/*css*/`
button:hover::after, a:hover::after {
  background-color: var(--clr-hover);
}

button:active::after, a:active::after {
  background-color: var(--clr-active);
}

button:focus-visible, a:focus-visible {
  outline: none;
  box-shadow: unset;
}

button:focus-visible::after, a:focus-visible::after {
  background-color: var(--clr-active);
}
`);

class BotonTexto extends WCBoton {
  constructor () {
    super();

    this.shadowRoot.adoptedStyleSheets = [...this.shadowRoot.adoptedStyleSheets, CSS];
  }

  attributeChangedCallback (name, oldValue, newValue) {
    if (name === 'data-color-fondo') return;

    super.attributeChangedCallback(name, oldValue, newValue);
  }
}

customElements.define('boton-texto', BotonTexto);
