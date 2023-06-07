const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: flex;
    flex-direction: column;
    gap: var(--espaciado-chico);

    text-align: left;
  }

  :host([data-no-etiqueta]) div {
    display: none;
  }

  div {
    display: flex;
    align-items: center;
    gap: var(--espaciado-chico);
  }

  slot:not([name='etiqueta'], [name='error'])::slotted(*) {
    background-color: var(--clr-fondo-hover);
    display: flex;
    min-height: 2.5rem;
    padding: 0 var(--espaciado-jumbo);
    box-sizing:  border-box;
    width: 100%;
    flex-grow: 1;
    overflow: hidden;

    border: 1px solid var(--clr-primario-40);
    border-radius: var(--br-borde);

    font-size: var(--fs-cuerpo-mediano);
    line-height: var(--lh-cuerpo-mediano);
    letter-spacing: var(--ls-cuerpo-mediano);
    font-weight: var(--fw-normal);
  }

  slot:not([name='etiqueta'], [name='error'])::slotted(*:focus-visible) {
    outline: 1px solid var(--clr-primario-40);
    outline-offset: -2px;
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <div>
    <slot name='etiqueta'></slot>
  </div>
  <slot></slot>
  <slot name='error'></slot>
`;

export class CampoTexto extends HTMLElement {
  constructor () {
    super();

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    this._input = this.shadowRoot.querySelector('input');
  }
}

customElements.define('campo-texto', CampoTexto);
