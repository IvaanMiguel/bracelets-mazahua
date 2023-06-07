const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: inline;
  }

  :host,
  :host([data-tipo-fuente='cuerpo-m']) {
    --font-size: var(--fs-cuerpo-mediano);
    --line-height: var(--lh-cuerpo-mediano);
    --letter-spacing: var(--ls-cuerpo-mediano);
    --font-weight: var(--fw-normal);

    font-size: var(--font-size);
    line-height: var(--line-height);
    letter-spacing: var(--letter-spacing);
    font-weight: var(--font-weight);
  }

  :host([data-tipo-fuente='titulo-l']) {
    --font-size: var(--fs-titulo-grande);
    --line-height: var(--lh-titulo-grande);
    --letter-spacing: var(--ls-titulo-grande);
    --font-weight: var(--fw-medio);
      
  }

  :host([data-tipo-fuente='titulo-m']) {
    --font-size: var(--fs-titulo-mediano);
    --line-height: var(--lh-titulo-grande);
    --letter-spacing: var(--ls-titulo-mediano);
    --font-weight: var(--fw-medio);
    
  }

  :host([data-tipo-fuente='titulo-s']) {
    --font-size: var(--fs-titulo-chico);
    --line-height: var(--lh-titulo-chico);
    --letter-spacing: var(--ls-titulo-chico);
    --font-weight: var(--fw-medio);
  }

  :host([data-tipo-fuente='cuerpo-l']) {
    font-size: var(--fs-cuerpo-grande);
    line-height: var(--lh-cuerpo-grande);
    letter-spacing: var(--ls-cuerpo-grande);
    font-weight: var(--fw-normal);
  }

  :host([data-tipo-fuente='cuerpo-s']) {
    font-size: var(--fs-cuerpo-chico);
    line-height: var(--lh-cuerpo-chico);
    letter-spacing: var(--ls-cuerpo-chico);
    font-weight: var(--fw-normal);
    color: var(--clr-primario-40);
  }

  :host([data-tipo-fuente='etiqueta-l']) {
    font-size: var(--fs-etiqueta-grande);
    line-height: var(--lh-etiqueta-grande);
    letter-spacing: var(--ls-etiqueta-grande);
    font-weight: var(--fw-medio);
    color: var(--clr-primario-10);
    
  }

  :host([data-tipo-fuente='etiqueta-m']) {
    font-size: var(--fs-etiqueta-mediana);
    line-height: var(--lh-etiqueta-mediana);
    letter-spacing: var(--ls-etiqueta-mediana);
    font-weight: var(--fw-medio);
  }

  :host([data-tipo-fuente='etiqueta-s']) {
    font-size: var(--fs-etiqueta-chica);
    line-height: var(--lh-etiqueta-chica);
    letter-spacing: var(--ls-etiqueta-chica);
    font-weight: var(--fw-medio);
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <slot></slot>
`;

class WCTexto extends HTMLElement {
  constructor () {
    super();

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }
}

customElements.define('wc-texto', WCTexto);
