const template = document.createElement('template');
template.innerHTML = /*html*/`
<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200'>
<span class='material-symbols-rounded'></span>
`;

class MDIcono extends HTMLElement {
  static observedAttributes = ['data-icono', 'data-fill', 'data-wght', 'data-grad', 'data-opsz',
    'data-cursor', 'data-escala'];

  constructor () {
    super();

    this._CSS = new CSSStyleSheet();
    this._CSS.replaceSync(/*css*/`
    :host {
      display: inline-flex;
    }

    :host([data-cursor]) {
      cursor: pointer;
    }

    :host([data-escala='s']) span {
      font-size: var(--tam-icono-x-chico);
    }

    :host([data-escala='m']) span {
      font-size: var(--tam-icono-chico);
    }

    :host([data-escala='l']) span {
      font-size: var(--tam-icono-mediano);
    }

    span {
      user-select: none;
    }
    `);

    this._reglaCSSSpan = Array.from(this._CSS.cssRules).find(reglaCSS => {
      return reglaCSS.selectorText === 'span';
    });

    this._crearFontVariation();

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [this._CSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }

  _crearFontVariation () {
    const dataFill = this.dataFill ? 1 : 0;
    const dataWght = this.dataWght || 400;
    const dataGrad = this.dataGrad || 0;
    const dataOpsz = this.dataOpsz || 48;

    this._reglaCSSSpan.style.setProperty('font-variation-settings',
    `'FILL' ${dataFill}, 'wght' ${dataWght}, 'GRAD' ${dataGrad}, 'opsz' ${dataOpsz}`);
  }

  get dataIcono () { return this.dataset.icono; }

  set dataIcono (icono) { this.dataset.icono = icono; }

  get dataFill () { return this.hasAttribute('data-fill'); }

  set dataFill (bool) { this.toggleAttribute('data-fill', Boolean(bool)); }

  get dataWght () { return this.dataset.wght; }

  set dataWght (wght) { this.dataset.wght = wght; }

  get dataGrad () { return this.dataset.grad; }

  set dataGrad (grad) { this.dataset.grad = grad; }

  get dataOpsz () { return this.dataset.opsz; }

  set dataOpsz (opsz) { this.dataset.opsz = opsz; }

  get dataEscala () { return this.dataset.escala; }

  set dataEscala (escala) { this.dataset.escala = escala; }

  attributeChangedCallback (name, oldValue, newValue) {
    switch (name) {
      case 'data-icono':
        this.shadowRoot.querySelector('span').textContent = newValue;
        break;

      case 'data-fill':
      case 'data-wght':
      case 'data-grad':
      case 'data-opsz':
        this._crearFontVariation();
        break;
    }
  }
}

customElements.define('md-icono', MDIcono);
