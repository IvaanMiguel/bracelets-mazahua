const hojaCSS = /*css*/`
  :host {
    display: flex;
    flex-direction: column;
    gap: var(--espaciado-grande);

    position: fixed;
    top: 0;
    right: 0;

    box-sizing: border-box;
    overflow: hidden auto;
    
    width: max-content;
    max-height: 100%;
    padding: var(--espaciado-jumbo);

    z-index: 2000;
  }
`;

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <slot></slot>
`;

export default class GrupoNotificaciones extends HTMLElement {
  constructor () {
    super();

    this._CSS = new CSSStyleSheet();
    this._CSS.replaceSync(hojaCSS);

    this._childListObserver = new MutationObserver(() => {
      if (this.childElementCount === 0) this.remove();
    });

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [this._CSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }

  connectedCallback () {
    this._childListObserver.observe(this, { childList: true });
  }

  disconnectedCallback () {
    this._childListObserver.disconnect();
  }
}

customElements.define('grupo-notificaciones', GrupoNotificaciones);
