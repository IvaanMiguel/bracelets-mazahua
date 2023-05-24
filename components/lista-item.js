const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: flex;
    align-items: center;
    justify-content: space-between;

    min-height: 3.5rem;
    padding: 0 1rem;
    cursor: pointer;
    user-select: none;

    transition: background-color .2s ease 0s;
  }
  
  :host(:hover) {
    background-color: var(--clr-fondo-hover);
  }

  :host([data-no-final]) .final {
    display: none;
  }

  :host([data-no-cursor]) {
    cursor: unset;
  }

  .inicio {
    display: flex;
    flex-direction: column;

    flex: 1;
  }

  .final {
    display: flex;
    gap: var(--espaciado-mediano);
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
<div class='inicio'>
  <slot></slot>
  <slot name='info-extra'></slot>
</div>
<div class='final'>
  <slot name='final'>
    <md-icono data-icono='chevron_right' data-opsz='24'></md-icono>
  </slot>
</div>
`;

class ListaItem extends HTMLElement {
  constructor () {
    super();

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }
}

customElements.define('lista-item', ListaItem);
