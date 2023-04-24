const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: flex;
    align-items: center;
    justify-content: space-between;

    min-height: 3.5rem;
    padding: 0 1rem;
    cursor: pointer;

    transition: background-color .2s ease 0s;
  }

  :host(:hover) {
    background-color: var(--clr-fondo-hover);
  }

  div {
    display: flex;
    flex-direction: column;
  }

  ::slotted([slot='info-principal']) {
    font-size: var(--fs-titulo-mediano);
    line-height: var(--lh-titulo-mediano);
    letter-spacing: var(--ls-titulo-mediano);
    font-weight: var(--fw-medio);
  }

  ::slotted([slot='info-extra']) {
    font-size: var(--fs-etiqueta-chica);
    line-height: var(--lh-etiqueta-chica);
    letter-spacing: var(--ls-etiqueta-chica);
    font-weight: var(--fw-medio);
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
<div>
  <slot name='info-principal'></slot>
  <slot name='info-extra'></slot>
</div>
<slot name='icono'>
  <md-icono data-icono='chevron_right' data-opsz='24'></md-icono>
</slot>
`;

class ListaItem extends HTMLElement {
  constructor () {
    super();

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }
}

customElements.define('lista-item', ListaItem);
