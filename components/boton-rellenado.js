import WCBoton from './wc-boton.js';

const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
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
}

button:focus-visible::after, a:focus-visible::after {
  background-color: var(--clr-active);
}
`);

class BotonRellenado extends WCBoton {
  constructor () {
    super();

    this.shadowRoot.adoptedStyleSheets = [...this.shadowRoot.adoptedStyleSheets, hojaCSS];
  }
}

customElements.define('boton-rellenado', BotonRellenado);
