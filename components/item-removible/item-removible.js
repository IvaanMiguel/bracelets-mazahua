const hojaCSS = new CSSStyleSheet();
hojaCSS.replaceSync(/*css*/`
  :host {
    display: flex;
    flex-direction: column;

    box-sizing: border-box;
  }

  div {
    display: flex;
    gap: var(--espaciado-chico);
    align-items: center;
  
    flex: 1;
  
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  
    padding: var(--espaciado-chico) var(--espaciado-jumbo);
  }

  ::slotted([slot='info']) {
    flex: 1;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
`);

const template = document.createElement('template');
template.innerHTML = /*html*/`
  <div>
    <slot name='info'></slot>
    <slot name='boton-remover'></slot>
  </div>
`;

class ItemRemovible extends HTMLElement {
  constructor () {
    super();

    this._connectedCallbackCalled = false;

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [hojaCSS];
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }

  confirmarRemoverUbicacion (e) {
    document.querySelector('[data-id="remover-ubicacion"]').style.display = 'flex';
    document.querySelector('[data-id="remover-ubicacion"]').detallesEvento = e.detail;
  }

  connectedCallback () {
    if (this._connectedCallbackCalled) return;
    this._connectedCallbackCalled = true;

    document.body.addEventListener('confirmarremoverubicacion', this.confirmarRemoverUbicacion);
  }
}

customElements.define('item-removible', ItemRemovible);
