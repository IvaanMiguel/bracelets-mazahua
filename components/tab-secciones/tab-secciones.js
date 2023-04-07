import { componentsUtil } from '../components-util.js';

class TabSecciones extends HTMLElement {
  constructor () {
    super();

    this.administrarCallback = this.administrar.bind(this);

    this.agregarCallback = this.agregar.bind(this);

    this.estilosLink = document.createElement('link');

    this.estilosGlobal = document.createElement('link');

    this.contenedor = document.createElement('div');

    this.template = document.createElement('template');

    this.template.innerHTML = `
      <div class='botones-contenedor'>
        <slot name='boton-administrar'></slot>
        <slot name='boton-agregar'></slot>
        <span class='selector'></span>
      </div>
    `;

    componentsUtil.establecerAtributos(this.estilosLink, {
      rel: 'stylesheet',
      href: 'components/tab-secciones/tab-secciones.css'
    });

    componentsUtil.establecerAtributos(this.estilosGlobal, {
      rel: 'stylesheet',
      href: 'css/global.css'
    });

    this.contenedor.className = 'contenedor';

    this.attachShadow({ mode: 'open' });

    this.shadowRoot.appendChild(this.estilosGlobal);
    this.shadowRoot.appendChild(this.estilosLink);
    this.shadowRoot.appendChild(this.template.content.cloneNode(true));
    this.shadowRoot.appendChild(this.contenedor);
    this.contenedor.appendChild(document.querySelector('[data-id="contenido-administrar"]'));
    this.contenedor.appendChild(document.querySelector('[data-id="contenido-agregar"]'));
  }

  connectedCallback () {
    this.contenidoIzquierdo = this.shadowRoot.querySelector('[data-id="contenido-administrar"]');
    this.contenidoDerecho = this.shadowRoot.querySelector('[data-id="contenido-agregar"]');
    this.selector = this.shadowRoot.querySelector('.selector');

    this.shadowRoot.addEventListener('cargarclientes', this.administrarCallback);
    this.shadowRoot.addEventListener('agregarcliente', this.agregarCallback);
  }

  administrar () {
    if (this.contenidoIzquierdo.classList.contains('contenido--transform') &&
        this.contenidoDerecho.classList.contains('contenido--transform')) {
      this.contenidoIzquierdo.classList.remove('contenido--transform');
      this.contenidoDerecho.classList.remove('contenido--transform');
    }

    if (this.selector.classList.contains('selector--transform')) {
      this.selector.classList.remove('selector--transform');
    }
  }

  agregar () {
    if (!this.contenidoIzquierdo.classList.contains('contenido--transform') &&
        !this.contenidoDerecho.classList.contains('contenido--transform')) {
      this.contenidoIzquierdo.classList.add('contenido--transform');
      this.contenidoDerecho.classList.add('contenido--transform');
    }

    if (!this.selector.classList.contains('selector--transform')) {
      this.selector.classList.add('selector--transform');
    }
  }
}

customElements.define('tab-secciones', TabSecciones);
