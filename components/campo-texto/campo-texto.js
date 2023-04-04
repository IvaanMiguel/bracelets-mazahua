import { componentsUtil } from '../components-util.js';

/**
 * Clase creada para generar campos de texto para los usuarios capaces de
 * inicializar una etiqueta, un icono y el campo de texto respectivamente de manera
 * ordenada.
 * Es posible omitir cada elemento a excepción del campo, el cual será agregado como un input por defecto
 * si es ignorado.
 * @example
 * <campo-texto>
 *   <div class='etiqueta'>
 *     <span slot='etiqueta-texto'></span>
 *     <md-icono slot='etiqueta-icono'></md-icono>
 *   </div>
 *   <input slot='campo'></input>
 * </campo-texto>
 */
export class CampoTexto extends HTMLElement {
  constructor () {
    super();

    /** @type {HTMLTemplateElement} */
    this.template = document.createElement('template');

    /**
     * Elemento HTML `Link` que tendrá la referencia a los estilos locales CSS `campo-texto.css`.
     * @type {HTMLLinkElement}
     */
    this.estilosLink = document.createElement('link');

    /**
     * Elemento HTML representante del texto en la etiqueta del campo.
     * @type {HTMLElement}
     */
    this.etiquetaTexto = this.querySelector('[slot="etiqueta-texto"]');

    /**
     * Elemento HTML representante del icono en la etiqueta del campo.
     * @type {HTMLElement}
     */
    this.etiquetaIcono = this.querySelector('[slot="etiqueta-icono"]');

    this.attachShadow({ mode: 'open' });
    this.crearTemplate();

    componentsUtil.establecerAtributos(this.estilosLink, {
      rel: 'stylesheet',
      href: 'components/campo-texto/campo-texto.css'
    });
  }

  connectedCallback () {
    this.shadowRoot.appendChild(this.estilosLink);
    this.shadowRoot.appendChild(this.template.content.cloneNode(true));
  }

  disconnectedCallback () {
    this.shadowRoot.replaceChildren();
  }

  /**
   * Crea un template para el componente en base al dataset tipo y a los elementos
   * insertados en los slots.
   */
  crearTemplate () {
    if (this.etiquetaTexto || this.etiquetaIcono) {
      this.template.innerHTML = `
        <div class='etiqueta'>
          <slot name='etiqueta-texto'></slot>
          <slot name='etiqueta-icono'></slot>
        </div>
      `;
    }

    this.template.innerHTML += `
      <slot name='campo'>
        <input type='text'>
      </slot>
    `;
  }
}

customElements.define('campo-texto', CampoTexto);
