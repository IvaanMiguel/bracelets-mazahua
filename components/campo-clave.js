const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: flex;
    flex-direction: column;
    gap: var(--espaciado-chico);

    text-align: left;
  }

  :host([data-no-icono]) md-icono {
    display: none;
  }

  :host([data-no-icono]) slot:not([name='etiqueta'], [name='error'])::slotted(*) {
    padding-right: var(--espaciado-jumbo);
  }

  :host([data-focus]) .campo {
    outline: 2px solid var(--clr-primario-40);
    outline-offset: -2px;
  }

  .etiqueta {
    display: flex;
    align-items: center;
    gap: var(--espaciado-chico);
  }

  .campo {
    display: flex;
    min-height: 2.5rem;
    box-sizing: border-box;
    width: 100%;
    flex-grow: 1;
    overflow: hidden;

    border: 1px solid var(--clr-borde);
    border-radius: var(--br-borde);
  }

  ::slotted([slot='campo']) {
    background-color: var(--clr-fondo-hover);
    color: var(--clr-fondo-10);
    flex: 1;
    border: none;
    padding-left: var(--espaciado-jumbo);

    font-size: var(--fs-cuerpo-mediano);
    line-height: var(--lh-cuerpo-mediano);
    letter-spacing: var(--ls-cuerpo-mediano);
    font-weight: var(--fw-normal);
  }

  ::slotted([slot='campo']:focus-visible) {
    outline: none;
  }

  md-icono {
    margin: auto var(--espaciado-jumbo) auto var(--espaciado-mediano);
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <div class='etiqueta'>
    <slot name='etiqueta'></slot>
  </div>
  <div class='campo'>
    <slot name='campo'></slot>
    <md-icono data-icono='visibility' data-opsz='22' data-escala='l' data-cursor></md-icono>
  </div>
  <slot name='error'></slot>
`;

class CampoClave extends HTMLElement {
  static observedAttributes = ['data-visible'];

  constructor () {
    super();

    this.dataGrupo = this.dataGrupo ?? 1;

    this._mostrarCampo = this._mostrarCampo.bind(this);
    this._ocultarCampo = this._ocultarCampo.bind(this);
    this._onFocusIn = this._onFocusIn.bind(this);
    this._onBlur = this._onBlur.bind(this);

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    this._campo = this.querySelector('[slot="campo"]');
    this._iconoVisibilidad = this.shadowRoot.querySelector('md-icono');
  }

  _mostrarCampo () { this._actualizarCampo(true); }

  _ocultarCampo () { this._actualizarCampo(false); }

  _actualizarCampo (visible) {
    this.getRootNode().querySelectorAll(`campo-clave[data-grupo='${this.dataGrupo}']`)
      .forEach((elemento) => (elemento.dataVisible = visible));
  }

  _onFocusIn () { this.dataFocus = true; }

  _onBlur () { this.dataFocus = false; }

  get dataFocus () { return this.hasAttribute('data-focus'); }

  set dataFocus (bool) { this.toggleAttribute('data-focus', Boolean(bool)); }

  get dataGrupo () { return this.dataset.grupo; }

  set dataGrupo (grupo) { this.dataset.grupo = grupo; }

  get dataVisible () { return this.hasAttribute('data-visible'); }

  set dataVisible (bool) { this.toggleAttribute('data-visible', Boolean(bool)); }

  connectedCallback () {
    this._campo.addEventListener('focusin', this._onFocusIn);
    this._campo.addEventListener('blur', this._onBlur);

    if (this._iconoVisibilidad) {
      this._iconoVisibilidad.addEventListener('mousedown', this._mostrarCampo);
      this._iconoVisibilidad.addEventListener('mouseup', this._ocultarCampo);
      this._iconoVisibilidad.addEventListener('mouseleave', this._ocultarCampo);
    }
  }

  disconnectedCallback () {
    this._campo.removeEventListener('focusin', this._onFocusIn);
    this._campo.removeEventListener('blur', this._onBlur);

    if (this._iconoVisibilidad) {
      this._iconoVisibilidad.removeEventListener('mousedown', this._mostrarCampo);
      this._iconoVisibilidad.removeEventListener('mouseup', this._ocultarCampo);
      this._iconoVisibilidad.removeEventListener('mouseleave', this._ocultarCampo);
    }
  }

  attributeChangedCallback (name, oldValue, newValue) {
    switch (name) {
      case 'data-visible':
        this._campo.setAttribute('type', this.dataVisible ? 'text' : 'password');

        if (!this._iconoVisibilidad) return;
        this._iconoVisibilidad.dataIcono = this.dataVisible ? 'visibility_off' : 'visibility';
        break;
    }
  }
}

customElements.define('campo-clave', CampoClave);
