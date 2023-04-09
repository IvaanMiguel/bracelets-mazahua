const template = document.createElement('template');
template.innerHTML = `
  <link rel='stylesheet' href='components/lista-desplegable/lista-desplegable.css'>
  <slot name='cabecera'>
    <span>Cabecera</span>
    <md-icono data-icono='expand_less' data-opsz='24'></md-icono>
  </slot>
  <slot name='lista-elementos'></slot>
`;

class ListaDesplegable extends HTMLElement {
  constructor () {
    super();

    this.attachShadow({ mode: 'open' });
  }

  connectedCallback () {
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    this.cabecera = this.querySelector('[slot="cabecera"]');

    this.icono = this.cabecera.querySelector('md-icono');
    this.icono.style.transition = 'transform .3s ease 0s';

    this.listaElementos = this.querySelector('[slot="lista-elementos"]');

    this.cabecera.addEventListener('click', this.alternarEstado.bind(this));
  }

  static observedAttributes = ['data-oculto'];

  attributeChangedCallback (name, oldValue, newValue) {
    switch (name) {
      case 'data-oculto':
        this.dataOculto ? this.ocultarLista() : this.mostrarLista();
        break;
    }
  }

  alternarEstado () {
    this.dataOculto = !this.dataOculto;
  }

  ocultarLista () {
    this.listaElementos.style.maxHeight = 0;
    this.icono.style.transform = 'rotate(180deg)';
  }

  mostrarLista () {
    this.listaElementos.style.maxHeight = this.listaElementos.scrollHeight + 'px';
    this.icono.style.transform = null;
  }

  get dataOculto () { return this.hasAttribute('data-oculto'); }

  set dataOculto (bool) { this.toggleAttribute('data-oculto', Boolean(bool)); }
}

customElements.define('lista-desplegable', ListaDesplegable);
