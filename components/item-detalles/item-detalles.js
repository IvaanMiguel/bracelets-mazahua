const template = document.createElement('template');
template.innerHTML = /*html*/`
<style>
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
</style>
<div>
  <slot name='info-principal'></slot>
  <slot name='info-extra'></slot>
</div>
<slot name='icono'>
  <md-icono data-icono='chevron_right' data-opsz='24'></md-icono>
</slot>
`;

class ItemDetalles extends HTMLElement {
  constructor () {
    super();

    this.attachShadow({ mode: 'open' });
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }
}

customElements.define('item-detalles', ItemDetalles);
