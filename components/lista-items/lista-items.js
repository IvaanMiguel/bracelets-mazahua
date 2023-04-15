const template = document.createElement('template');
template.innerHTML = /*html*/`
<style>
  :host {
    display: flex;
    flex-direction: column;
  }
</style>
<slot></slot>
`;

class ListaItems extends HTMLElement {
  constructor () {
    super();

    this.attachShadow({ mode: 'open' });
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    this._childListObserver = new MutationObserver(() => {
      const ultimoHijo = this.lastElementChild;

      /* Si el último elemento dentro de la lista es un componente item-divisor y no tiene
      el atributo data-no-divisor, i.e., al eliminar el último elemento previo al actual,
      se le agrega. */
      if (ultimoHijo.tagName === 'ITEM-DIVISOR' && !ultimoHijo.dataNoDivisor) {
        ultimoHijo.dataNoDivisor = true;
      }

      /* Si el último elemento tiene el atributo data-no-divisor y su hermano anterior
          también lo tiene, i.e., al agregar un nuevo elemento, a dicho hermano se le remueve este
          atributo, mostrando así la línea divisora entre ámbos elementos. */
      if (ultimoHijo.dataNoDivisor && ultimoHijo.previousElementSibling.dataNoDivisor) {
        ultimoHijo.previousElementSibling.dataNoDivisor = false;
      }
    });
  }

  connectedCallback () {
    this._childListObserver.observe(this, { childList: true });
  }

  disconnectedCallback () {
    this._childListObserver.disconnect();
  }
}

customElements.define('lista-items', ListaItems);
