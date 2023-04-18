import WCBoton from './wc-boton.js';

const CSS = new CSSStyleSheet();
CSS.replaceSync(/*css*/`
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
  background-color: var(--clr-hover);
}
`);

class BotonRelleno extends WCBoton {
  constructor () {
    super();

    this._reglaCSSHover = Array.from(CSS.cssRules).find(reglaCSS => {
      return reglaCSS.selectorText === 'button:hover::after, a:hover::after';
    });

    this.shadowRoot.adoptedStyleSheets = [...this.shadowRoot.adoptedStyleSheets, CSS];
  }

  attributeChangedCallback (name, oldValue, newValue) {
    super.attributeChangedCallback(name, oldValue, newValue);

    switch (name) {
      case 'data-color-texto':
        const colorHover = getComputedStyle(this).getPropertyValue('--clr-texto') + '14'; // .08
        this._reglaCSSHost.style.setProperty('--clr-hover', colorHover);

        const colorActive = getComputedStyle(this).getPropertyValue('--clr-texto') + '1f'; // // .12
        this._reglaCSSHost.style.setProperty('--clr-active', colorActive);
        break;
    }
  }
}

customElements.define('boton-relleno', BotonRelleno);
