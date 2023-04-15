const template = document.createElement('template');
template.innerHTML = /*html*/`
  <link rel='stylesheet' href='components/item-removible/item-removible.css'>
  <div data-id='contenido'>
    <slot name='info'></slot>
    <slot name='boton-remover'>
    </slot>
  </div>
`;

class ItemRemovible extends HTMLElement {
  constructor () {
    super();

    this._connectedCallbackCalled = false;

    this.attachShadow({ mode: 'open' });
  }

  confirmarRemoverUbicacion (e) {
    document.querySelector('[data-id="remover-ubicacion"]').style.display = 'flex';
    document.querySelector('[data-id="remover-ubicacion"]').detallesEvento = e.detail.ubicacion;
  }

  connectedCallback () {
    if (this._connectedCallbackCalled) return;
    this._connectedCallbackCalled = true;

    document.body.addEventListener('confirmarremoverubicacion', this.confirmarRemoverUbicacion);

    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }
}

customElements.define('item-removible', ItemRemovible);
