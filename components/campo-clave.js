const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: flex;
    flex-direction: column;
    gap: var(--espaciado-chico);

    text-align: left;
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

  ::slotted([slot='etiqueta']) {
    font-size: var(--fs-etiqueta-grande);
    line-height: var(--lh-etiqueta-grande);
    letter-spacing: var(--ls-etiqueta-grande);
    font-weight: var(--fw-medio);
  }

  .campo {
    display: flex;
    min-height: 2.5rem;
    padding-right: var(--espaciado-jumbo);
    box-sizing: border-box;
    width: 100%;
    flex-grow: 1;
    overflow: hidden;

    border: 1px solid var(--clr-borde);
    border-radius: var(--br-borde);
  }

  ::slotted([slot='campo']) {
    background-color: transparent;
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

  ::slotted([slot='icono-visibilidad']) {
    margin: auto 0 auto var(--espaciado-mediano);
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <div class='etiqueta'>
    <slot name='etiqueta'></slot>
  </div>
  <div class='campo'>
    <slot name='campo'></slot>
    <slot name='icono-visibilidad'></slot>
  </div>
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
    this._iconoVisibilidad = this.querySelector('[slot="icono-visibilidad"]');
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
