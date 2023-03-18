import { componentsUtil } from '../components-util.js';

/**
 * Clase creada para generar campos de texto para los usuarios capaces de
 * inicializar una etiqueta, un icono y el campo de texto respectivamente de manera
 * ordenada.
 * Es posible omitir cada elemento a excepción del campo, el cual será agregado como un input por defecto
 * si es ignorado.
 * El atributo `data-clase-etiqueta` es utilizado para estilizar el contenedor padre de
 * `etiqueta-texto` y `etiqueta-icono`.
 * @example
 * <campo-texto data-clase-etiquta='clase'>
 *     <span slot='etiqueta-texto'></span>
 *     <md-icono slot='etiqueta-icono'></md-icono>
 *     <input slot='campo'></input>
 * </campo-texto>
 */
class CampoTexto extends HTMLElement {
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

    /**
     * Elemento HTML representante del campo del elemento.
     * @type {HTMLElement}
     */
    this.campo = this.querySelector('[slot="campo"]');

    this.attachShadow({ mode: 'open' });

    this.template.innerHTML = `
      <div ${this.claseEtiqueta ? `class=${this.claseEtiqueta}` : ''}>
        <slot name='etiqueta-texto'></slot>
        <slot name='etiqueta-icono'></slot>
      </div>
      <slot name='campo'>
        <input type='text'>
      </slot>
    `;

    componentsUtil.establecerAtributos(this.estilosLink, {
      rel: 'stylesheet',
      href: 'components/campo-texto/campo-texto.css'
    });

    if (!this.etiquetaTexto && !this.etiquetaIcono) {
      this.style.gap = 0;
    }
  }

  connectedCallback () {
    const shadow = this.shadowRoot;

    shadow.appendChild(this.estilosLink);
    shadow.appendChild(this.template.content.cloneNode(true));
  }

  get claseEtiqueta () {
    return (this.dataset.claseEtiqueta || '').trim();
  }
}

customElements.define('campo-texto', CampoTexto);
