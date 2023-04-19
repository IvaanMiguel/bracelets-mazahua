import WCBoton from './wc-boton.js';

const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
button, a {
  box-shadow: var(--bs-elevacion-1);
}

button:hover::after, a:hover::after {
  background-color: var(--clr-hover);
}

button:hover, a:hover {
  box-shadow: var(--bs-elevacion-2);
}

button:active, a:active {
  box-shadow: var(--bs-elevacion-1);
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

class BotonElevado extends WCBoton {
  constructor () {
    super();

    this.shadowRoot.adoptedStyleSheets = [...this.shadowRoot.adoptedStyleSheets, hojaCSS];
  }
}

customElements.define('boton-elevado', BotonElevado);
