const template = document.createElement('template');
template.innerHTML = /*html*/`
  <slot></slot>
`;

class ContenedorFlex extends HTMLElement {
  static observedAttributes = ['justify-content', 'align-items', 'gap', 'flex-direction',
    'margin', 'padding'];

  constructor () {
    super();

    this._CSS = new CSSStyleSheet();
    this._CSS.replaceSync(/*css*/`
      :host {
        --justify-content: unset;
        --align-items: unset;
        --gap: 0;
        --flex-direction: unset;
        --margin: 0;
        --padding: 0;

        display: flex;
        flex-direction: var(--flex-direction);
        align-items: var(--align-items);
        gap: var(--gap);
        margin: var(--margin);
        padding: var(--padding);
      }
    `);

    this._reglaCSSHost = Array.from(this._CSS.cssRules).find(reglaCSS => {
      return reglaCSS.selectorText === ':host';
    });

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [this._CSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }

  attributeChangedCallback (name, oldValue, newValue) {
    if (newValue === oldValue) return;

    this._reglaCSSHost.style.setProperty(`--${name}`, `${newValue}`);
  }
}

customElements.define('contenedor-flex', ContenedorFlex);
