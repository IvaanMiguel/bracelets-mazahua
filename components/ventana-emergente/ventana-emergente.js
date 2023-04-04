import { componentsUtil } from '../components-util.js';
import { cerrarSesion } from '../../js/cerrar-sesion.js';

export class VentanaEmergente extends HTMLElement {
  constructor () {
    super();

    this.divContenedor = document.createElement('div');

    this.estilosPadre = document.createElement('link');

    this.estilosClases = document.createElement('link');

    this.attachShadow({ mode: 'open' });

    componentsUtil.establecerAtributos(this.estilosPadre, {
      rel: 'stylesheet',
      href: 'components/ventana-emergente/ventana-emergente.css'
    });

    componentsUtil.establecerAtributos(this.estilosClases, {
      rel: 'stylesheet',
      href: 'css/clases.css'
    });

    this.shadowRoot.appendChild(this.estilosClases);
    this.shadowRoot.appendChild(this.estilosPadre);
    this.shadowRoot.appendChild(this.shadowRoot.host.firstElementChild);
  }

  connectedCallback () {
    this.shadowRoot.addEventListener('cerrarventana', () => this.cerrarVentana());
    this.shadowRoot.addEventListener('cerrarsesion', () => cerrarSesion());
  }

  cerrarVentana () {
    const host = this.shadowRoot.host;

    if (host.getAttribute('style').indexOf('display: flex;') > -1) {
      host.removeAttribute('style');
    }
  }
}

customElements.define('ventana-emergente', VentanaEmergente);
