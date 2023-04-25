const template = document.createElement('template');
template.innerHTML = /*html*/`
  <div class='cabecera'>
    <slot name='tab'></slot>
    <span></span>
  </div>
  <div class='contenido'>
    <slot></slot>
  </div>
`;

class WCTabs extends HTMLElement {
  static observedAttributes = ['data-tab'];

  constructor () {
    super();

    this._CSS = new CSSStyleSheet();
    this._CSS.replaceSync(/*css*/`
      :host {
        --_span-ancho: 0;
        --_tabs: 0;
        --_translate-tab: 0;
        --_translate-span: 0;

        --tab-alto: 3rem;

        display: flex;
        flex-direction: column;
        gap: var(--espaciado-chico);
    
        width: 100%;
        flex: 1;
      }
    
      .cabecera {
        display: flex;
    
        border-radius: 1.5rem;
        position: relative;
        background-color: var(--clr-superficie-primario-5);
      }
    
      ::slotted([slot='tab']) {
        --boton-alto: var(--tab-alto);
        --boton-justify-content: center;
    
        gap: var(--espaciado-mediano);
        flex: 1;
        padding: 0;
        overflow: hidden;
        position: relative;
        border-radius: calc(var(--boton-alto) / 2);
      }
    
      span {
        position: absolute;
        height: 100%;
        width: var(--_span-ancho);
        z-index: -1;

        border-radius: inherit;
        background-color: var(--clr-superficie-primario-9);
    
        transform: translateX(var(--_translate-span));
        transition: transform .2s ease-in-out 0s;
      }
    
      .contenido {
        display: grid;
        grid-template-columns: repeat(var(--_tabs), 100%);

        overflow: hidden;
      }
    
      slot:not([name='tab'])::slotted(*) {
        width: 100%;
        height: 100%;
        overflow-y: auto;
    
        transform: translateX(var(--_translate-tab));
        transition: transform .2s ease 0s;
      }
    `);

    this._onClick = this._onClick.bind(this);

    this._reglaCSSHost = Array.from(this._CSS.cssRules).find(reglaCSS => {
      return reglaCSS.selectorText === ':host';
    });

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [this._CSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    this._cabecera = this.shadowRoot.querySelector('.cabecera');

    this._tabs = [];
    this._contenidos = [];
    Array.from(this.children).forEach(elementoHijo => {
      if (elementoHijo.getAttribute('slot') === 'tab') {
        this._tabs.push(elementoHijo);
      } else {
        this._contenidos.push(elementoHijo);
      }
    });

    this._tabs.forEach((tab, i) => (tab.numTab = i + 1));

    this._reglaCSSHost.style.setProperty('--_span-ancho', `${100 / this._tabs.length}%`);
    this._reglaCSSHost.style.setProperty('--_tabs', this._tabs.length);
  }

  _onClick (e) {
    this.dataTab = e.target.numTab;
    this._seleccionarTab(e.target.numTab);
  }

  _seleccionarTab (tabIndex) {
    if (tabIndex <= 0 || tabIndex > this._tabs.length) return;

    this._contenidos.forEach((contenido, i) => {
      this._contenidos[tabIndex - 1] !== contenido
        ? contenido.style.height = 0
        : contenido.removeAttribute('style');
    });

    const numTab = (tabIndex - 1) * 100;
    this._reglaCSSHost.style.setProperty('--_translate-span', `${numTab}%`);
    this._reglaCSSHost.style.setProperty('--_translate-tab', `${-numTab}%`);
  }

  get dataTab () { return this.dataset.tab; }

  set dataTab (tab) { this.dataset.tab = tab; }

  connectedCallback () {
    this._cabecera.addEventListener('click', this._onClick);

    if (!this.dataTab) this._seleccionarTab(1);
  }

  disconnectedCallback () {
    this._cabecera.removeEventListener('click', this._onClick);
  }

  attributeChangedCallback (name, oldValue, newValue) {
    switch (name) {
      case 'data-tab':
        if (!newValue) return;

        this._seleccionarTab(newValue);
        break;
    }
  }
}

customElements.define('wc-tabs', WCTabs);
