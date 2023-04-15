const template = document.createElement('template');
template.innerHTML = /*html*/`
  <link defer rel='stylesheet' href='components/wc-colapsable/wc-colapsable.css'>
  <slot name='cabecera'>
    <span>Cabecera</span>
    <md-icono data-icono='expand_less' data-opsz='24'></md-icono>
  </slot>
  <div>
    <slot name='lista-elemento'></slot>
  </div>
`;

class WCColapsable extends HTMLElement {
  static observedAttributes = ['data-oculto'];

  constructor () {
    super();

    this.attachShadow({ mode: 'open' });
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    this.listaElementos = this.shadowRoot.querySelector('div');

    this._childListObserver = new MutationObserver(() => {
      this.listaElementos.style.maxHeight = this.listaElementos.scrollHeight + 'px';
    });
    this._eventoClick = this.alternarVisibilidad.bind(this);

    this.cabecera = this.querySelector('[slot="cabecera"]');

    this.icono = this.cabecera.querySelector('md-icono');
    this.icono.style.transition = 'transform .3s ease 0s';
  }

  alternarVisibilidad () {
    this.dataOculto = !this.dataOculto;
  }

  colapsar () {
    this.listaElementos.style.maxHeight = 0;
    this.icono.style.transform = 'rotate(180deg)';
  }

  expandir () {
    this.listaElementos.style.maxHeight = this.listaElementos.scrollHeight + 'px';
    this.icono.style.transform = 'rotate(0deg)';
  }

  get dataOculto () { return this.hasAttribute('data-oculto'); }

  set dataOculto (bool) { this.toggleAttribute('data-oculto', Boolean(bool)); }

  connectedCallback () {
    this._childListObserver.observe(this, { childList: true });

    this.cabecera.addEventListener('click', this._eventoClick);
  }

  disconnectedCallback () {
    this._childListObserver.disconnect();

    this.cabecera.removeEventListener('click', this._eventoClick);
  }

  attributeChangedCallback (name, oldValue, newValue) {
    if (oldValue === newValue) return;
    switch (name) {
      case 'data-oculto':
        this.dataOculto ? this.colapsar() : this.expandir();
        break;
    }
  }
}

customElements.define('wc-colapsable', WCColapsable);
