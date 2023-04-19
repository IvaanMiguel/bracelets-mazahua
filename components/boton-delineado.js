import WCBoton from './wc-boton.js';

const CSS = new CSSStyleSheet();
CSS.replaceSync(/*css*/`
:host {
  --clr-contorno: var(--clr-borde);
}

button, a {
  border: 1px solid var(--clr-contorno);
}

button:hover::after, a:hover::after {
  background-color: var(--clr-hover);
}

button:hover, a:hover {
  box-shadow: var(--bs-elevacion-1);
}

button:active, a:active {
  box-shadow: unset;
}

button:active::after, a:active::after {
  background-color: var(--clr-active);
}

button:focus-visible, a:focus-visible {
  outline: none;
  box-shadow: unset;
  border-color: var(--clr-texto);
}

button:focus-visible::after, a:focus-visible::after {
  background-color: var(--clr-active);
}
`);

class BotonDelineado extends WCBoton {
  static observedAttributes = [...WCBoton.observedAttributes, 'data-color-contorno'];

  constructor () {
    super();

    this._reglaCSSHostLocal = Array.from(CSS.cssRules).find(reglaCSS => {
      return reglaCSS.selectorText === ':host';
    });

    this.shadowRoot.adoptedStyleSheets = [...this.shadowRoot.adoptedStyleSheets, CSS];
  }

  attributeChangedCallback (name, oldValue, newValue) {
    super.attributeChangedCallback(name, oldValue, newValue);

    switch (name) {
      case 'data-color-contorno':
        this._reglaCSSHostLocal.style.setProperty('--clr-contorno', !newValue ? 'var(--clr-borde)' : newValue);
        break;
    }
  }
}

customElements.define('boton-delineado', BotonDelineado);
