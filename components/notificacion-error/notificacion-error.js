import { MdIcono } from '../md-icono/md-icono.js';
import { componentsUtil } from '../components-util.js';

/**
 * Permite crear elementos div que informen al usuario acerca de cualquier
 * error en los datos ingresados, inicializaándose con un icono y un mensaje
 * de error.
 * @example
 * <div is='notificacion-error'>
 *   <md-icono></md-icono>
 *   <span slot='error'>Mensaje de error</span>
 * </div>
 */
export class NotificacionError extends HTMLDivElement {
  constructor () {
    super();

    /** @type {HTMLTemplateElement} */
    this.template = document.createElement('template');

    /**
     * Elemento encargado de establecer los estilos del componente.
     * @type {HTMLLinkElement}
     */
    this.estilosLink = document.createElement('link');

    /** @type {MdIcono} */
    this.icono = new MdIcono();

    /**
     * Elemento contenedor del mensaje de error a mostrar.
     * @type {HTMLElement}
     */
    this.mensajeError = document.querySelector('[slot="error"]');

    this.attachShadow({ mode: 'open' });
    this.className = 'notificacion-error';

    componentsUtil.establecerAtributos(this.estilosLink, {
      rel: 'stylesheet',
      href: 'components/notificacion-error/notificacion-error.css'
    });

    this.shadowRoot.appendChild(this.estilosLink);

    this.template.innerHTML = `
      <slot name='error'>
        <span>Mensaje de error no establecido.</span>
      </slot>
    `;

    componentsUtil.establecerAtributos(this.icono, {
      'data-icono': 'error',
      'data-fill': '1',
      'data-opsz': '20'
    });
  }

  connectedCallback () {
    this.shadowRoot.appendChild(this.icono);
    this.icono.span.classList.add('icono-x-chico');

    this.shadowRoot.appendChild(this.template.content.cloneNode(true));
  }
}

customElements.define('notificacion-error', NotificacionError, { extends: 'div' });
