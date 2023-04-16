const template = document.createElement('template');
template.innerHTML = /*html*/`
<style>
  :host {
    display: flex;
    flex-direction: column;

    border-radius: var(--br-borde);
    border: 1px solid var(--clr-neutral-80);
    overflow: hidden;
    margin-bottom: var(--espaciado-grande);
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
</style>
<div>
  <slot name='titulo'></slot>
  <slot name='extra'></slot>
</div>
<slot name='lista'>
  <span>Aún no se ha añadido ningún cliente</span>
</slot>
`;

class ListaEncabezada extends HTMLElement {
  constructor () {
    super();

    this.attachShadow({ mode: 'open' });
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }
}

customElements.define('lista-encabezada', ListaEncabezada);
