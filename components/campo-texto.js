const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: flex;
    flex-direction: column;
    gap: var(--espaciado-chico);

    text-align: left;
  }

  div {
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

  ::slotted([slot='campo']) {
    min-height: 2.5rem;
    padding: 0 var(--espaciado-jumbo);
    box-sizing: border-box;
    width: 100%;

    border: 1px solid var(--clr-borde);
    border-radius: var(--br-borde);

    background-color: var(--clr-fondo-99);
    color: var(--clr-fondo-10);

    font-size: var(--fs-cuerpo-mediano);
    line-height: var(--lh-cuerpo-mediano);
    letter-spacing: var(--ls-cuerpo-mediano);
    font-weight: var(--fw-normal);
  }

  ::slotted([slot='campo']:focus-visible) {
    outline: 2px solid var(--clr-primario-40);
    outline-offset: -2px;
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <div>
    <slot name='etiqueta'></slot>
  </div>
  <slot name='campo'></slot>
`;

export class CampoTexto extends HTMLElement {
  constructor () {
    super();

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }
}

customElements.define('campo-texto', CampoTexto);
