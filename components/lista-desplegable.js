import { ordenarItems } from '../js/vista-control.js';

const hojaCSS = /*css*/`
  :host {
    display: flex;
    flex-direction: column;
    gap: var(--espaciado-chico);
    
  }

  :host([data-desplegado]) md-icono {
    transform: rotate(180deg);
  }

  div {
    display: flex;
    align-items: center;
    position: relative;
    cursor: pointer;
  }

  slot:not([name='etiqueta'])::slotted(*) {
    min-height: 2.5rem;
    flex: 1;
    padding: 0 1rem;
    background-color: var(--clr-fondo-hover);
    border: 1px solid var(--clr-primario-40);
    border-radius: var(--br-borde);
    outline-color: var(--clr-primario-40);

    appearance: none;
    cursor: pointer;

    font-size: var(--fs-cuerpo-mediano);
    line-height: var(--lh-cuerpo-mediano);
    letter-spacing: var(--ls-cuerpo-mediano);
    font-weight: var(--fw-normal);
  }

  md-icono {
    position: absolute;
    right: 1rem;
    transition: transform .15s ease 0s;
  }
`;

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <slot name='etiqueta'></slot>
  <div>
    <slot></slot>
    <md-icono data-icono='expand_more' data-opsz='24'></md-icono>
  </div>
`;

class ListaDesplegable extends HTMLElement {
  constructor () {
    super();

    this._onClick = this._onClick.bind(this);
    this._onBlur = this._onBlur.bind(this);

    this._CSS = new CSSStyleSheet();
    this._CSS.replaceSync(hojaCSS);

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [this._CSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    this._lista = this.querySelector('select');

    ordenarItems(this._lista.querySelectorAll('option'), (opcion) => {
      this._lista.appendChild(opcion);
    });
  }

  _onClick () { this.dataDesplegado = !this.dataDesplegado; }

  _onBlur () { this.dataDesplegado = false; }

  get dataDesplegado () { return this.hasAttribute('data-desplegado'); }

  set dataDesplegado (bool) { this.toggleAttribute('data-desplegado', Boolean(bool)); }

  connectedCallback () {
    this._lista.addEventListener('click', this._onClick);
    this._lista.addEventListener('blur', this._onBlur);
  }

  disconnectedCallback () {
    this._lista.removeEventListener('click', this._onClick);
    this._lista.removeEventListener('blur', this._onBlur);
  }
}

customElements.define('lista-desplegable', ListaDesplegable);
