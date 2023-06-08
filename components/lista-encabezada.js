const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: flex;
    flex-direction: column;
    gap: var(--espaciado-chico);
    border-radius: 5px var(--br-borde);
    border: 1px solid var(--clr-primario-90);
    overflow: hidden;
    margin-bottom: var(--espaciado-grande);
    background-color: var(--clr-primario-90);
    
  }

  div {
    display: flex;
    flex-direction: column;
    padding: 1rem 1rem .25rem 1rem;
  }

  span {
    margin: auto;
    padding: var(--espaciado-grande) 0;
    font-size: var(--fs-etiqueta-grande);
    line-height: var(--lh-etiqueta-grande);
    letter-spacing: var(--ls-etiqueta-grande);
    font-weight: var(--fw-medio);
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <div>
    <slot name='titulo'></slot>
    <slot name='extra'></slot>
  </div>
  <slot>
    <span>Aún no se ha añadido nada.</span>
  </slot>
`;

class ListaEncabezada extends HTMLElement {
  constructor () {
    super();

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }
}

customElements.define('lista-encabezada', ListaEncabezada);
