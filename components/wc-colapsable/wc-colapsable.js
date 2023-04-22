const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: flex;
    flex-direction: column;

    border: 1px solid var(--clr-borde);
    box-sizing: border-box;
    border-radius: var(--br-borde);
  }

  :host([data-minicabecera]) .cabecera {
    height: 2.5rem;
  }

  .cabecera {
    display: flex;
    justify-content: space-between;
    align-items: center;
  
    height: 3.5rem;
    padding: 0 var(--espaciado-jumbo);
    border-radius: var(--br-borde);
    cursor: pointer;
    user-select: none;

    background-color: var(--clr-terciario-90);
    color: var(--clr-terciario-10);
  }
  
  ::slotted([slot='texto-cabecera']) {
    font-size: var(--fs-titulo-mediano);
    line-height: var(--lh-titulo-mediano);
    letter-spacing: var(--ls-tiulo-mediano);
    font-weight: var(--fw-medio);
  }

  .lista {
    display: flex;
    flex-direction: column;
  
    max-height: 100vh;
    overflow: hidden;
  
    transition: max-height .2s ease 0s;
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <div class='cabecera'>
    <slot name='texto-cabecera'></slot>
    <slot name='icono-cabecera'></slot>
  </div>
  <div class='lista'>
    <slot name='lista'></slot>
  </div>
`;

class WCColapsable extends HTMLElement {
  static observedAttributes = ['data-oculto', 'data-minicabecera'];

  constructor () {
    super();

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    this._listaElementos = this.shadowRoot.querySelector('.lista');

    this._childListObserver = new MutationObserver(() => {
      this._listaElementos.style.maxHeight = `${this._listaElementos.scrollHeight}px`;
    });

    this._eventoClick = this._alternarVisibilidad.bind(this);

    this._cabecera = this.shadowRoot.querySelector('.cabecera');

    this._icono = this.querySelector('md-icono');
    this._icono.style.transition = 'transform .3s ease 0s';
  }

  _alternarVisibilidad () { this.dataOculto = !this.dataOculto; }

  _colapsar () {
    this._listaElementos.style.maxHeight = 0;
    this._icono.style.transform = 'rotate(180deg)';
  }

  _expandir () {
    // this.listaElementos.style.maxHeight = '100vh';
    this._listaElementos.style.maxHeight = `${this._listaElementos.scrollHeight}px`;
    this._icono.style.transform = 'rotate(0deg)';
  }

  get dataOculto () { return this.hasAttribute('data-oculto'); }

  set dataOculto (bool) { this.toggleAttribute('data-oculto', Boolean(bool)); }

  get dataMinicabecera () { return this.hasAttribute('data-minicabecera'); }

  set dataMinicabecera (bool) { this.toggleAttribute('data-minicabecera', Boolean(bool)); }

  connectedCallback () {
    this._childListObserver.observe(this, {
      subtree: true,
      childList: true
    });

    this._cabecera.addEventListener('click', this._eventoClick);
  }

  disconnectedCallback () {
    this._childListObserver.disconnect();

    this._cabecera.removeEventListener('click', this._eventoClick);
  }

  attributeChangedCallback (name, oldValue, newValue) {
    switch (name) {
      case 'data-oculto':
        this.dataOculto ? this._colapsar() : this._expandir();
        break;
    }
  }
}

customElements.define('wc-colapsable', WCColapsable);
