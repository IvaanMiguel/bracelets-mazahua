const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
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
    --boton-alto: 3rem;
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
    border-radius: inherit;
    background-color: var(--clr-superficie-primario-9);
    z-index: -1;

    transition: transform .2s ease-in-out 0s;
  }

  .contenido {
    height: 100%;
    position: relative;
    overflow: hidden;
  }

  slot:not([name='tab'])::slotted(*) {
    width: 100%;
    height: 100%;
    position: absolute;
    overflow-y: auto;

    transition: transform .2s ease 0s;
  }
`);

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

    this._onClick = this._onClick.bind(this);

    this._reglaCSSSpan = Array.from(hojaCSS.cssRules).find(reglaCSS => {
      return reglaCSS.selectorText === 'span';
    });

    this._reglaCSSTab = Array.from(hojaCSS.cssRules).find(reglaCSS => {
      return reglaCSS.selectorText === 'slot:not([name="tab"])::slotted(*)';
    });

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    this._cabecera = this.shadowRoot.querySelector('.cabecera');

    this._tabs = this.querySelectorAll('[slot="tab"]');
    this._tabs.forEach((tab, i) => (tab.numTab = i + 1));

    this._reglaCSSSpan.style.setProperty('width', `${100 / this._tabs.length}%`);

    this._contenidos = this.querySelectorAll('wc-tabs > :not([slot="tab"])');
    this._contenidos.forEach((contenido, i) => (contenido.style.left = `${i * 100}%`));
  }

  _onClick (e) {
    this.dataTab = e.target.numTab;
    this._seleccionarTab(e.target.numTab);
  }

  _seleccionarTab (tab) {
    if (tab <= 0 || tab > this._tabs.length) return;

    const numTab = (tab - 1) * 100;

    this._reglaCSSSpan.style.setProperty('transform', `translateX(${numTab}%)`);
    this._reglaCSSTab.style.setProperty('transform', `translateX(${-numTab}%)`);
  }

  get dataTab () { return this.dataset.tab; }

  set dataTab (tab) { this.dataset.tab = tab; }

  connectedCallback () {
    this._cabecera.addEventListener('click', this._onClick);
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
