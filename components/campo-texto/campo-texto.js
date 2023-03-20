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
     * Elemento HTML representante del icono que alternará la visibilidad del campo.
     * @type {HTMLElement}
     */
    this.iconoVisibilidad = this.querySelector('[slot="icono-visibilidad"]');

    /**
     * Elemento HTML representante del campo del elemento.
     * @type {HTMLElement}
     */
    this.campo = this.querySelector('[slot="campo"]');

    this.attachShadow({ mode: 'open' });
    this.crearTemplate();

    componentsUtil.establecerAtributos(this.estilosLink, {
      rel: 'stylesheet',
      href: 'components/campo-texto/campo-texto.css'
    });

    if (!this.grupo && this.campo.getAttribute('type') === 'password') {
      this.dataset.grupo = 1;
    }
  }

  connectedCallback () {
    const shadow = this.shadowRoot;

    shadow.appendChild(this.estilosLink);
    shadow.appendChild(this.template.content.cloneNode(true));

    if (this.iconoVisibilidad) {
      this.iconoVisibilidad.span.addEventListener('mousedown', () => this.mostrarCampo());
      this.iconoVisibilidad.span.addEventListener('mouseup', () => this.ocultarCampo());
      this.iconoVisibilidad.span.addEventListener('mouseleave', () => this.ocultarCampo());
    }
  }

  /**
   * Crea un template para el compoenente en base al dataset tipo y a los elementos
   * insertados en los slots.
   */
  crearTemplate () {
    if (this.etiquetaTexto || this.etiquetaIcono) {
      this.template.innerHTML = `
        <div${this.claseEtiqueta ? ` class=${this.claseEtiqueta}` : ''}>
          <slot name='etiqueta-texto'></slot>
          <slot name='etiqueta-icono'></slot>
        </div>
      `;
    }

    if (this.tipo === 'clave') {
      this.template.innerHTML += `
        <div ${this.claseCampo ? ` class=${this.claseCampo}` : ''}>
          <slot name='campo'>
            <input type='text'>
          </slot>
          <slot name='icono-visibilidad'></slot>
        </div>
      `;

      return;
    }

    this.template.innerHTML += `
      <slot name='campo'>
        <input type='text'>
      </slot>
    `;
  }

  /**
   * Cambia el atributo `type` a `text` de todos los componentes que coincidan con el
   * mismo grupo definito en el atributo `data-grupo`.
   */
  mostrarCampo () {
    document.querySelectorAll(`[data-grupo='${this.grupo}']`).forEach((elemento) => {
      elemento.querySelector('[slot="campo"]').setAttribute('type', 'text');

      const iconoVisibilidad = elemento.querySelector('[slot="icono-visibilidad"]');

      if (iconoVisibilidad) {
        iconoVisibilidad.span.innerText = 'visibility_off';
      }
    });
  }

  /**
   * Cambia el atributo `type` a `password` de todos los componentes que coincidan con el
   * mismo grupo definito en el atributo `data-grupo`.
   */
  ocultarCampo () {
    document.querySelectorAll(`[data-grupo='${this.grupo}']`).forEach((elemento) => {
      elemento.querySelector('[slot="campo"]').setAttribute('type', 'password');

      const iconoVisibilidad = elemento.querySelector('[slot="icono-visibilidad"]');

      if (iconoVisibilidad) {
        iconoVisibilidad.span.innerText = this.iconoVisibilidad.dataIcono;
      }
    });
  }

  get claseEtiqueta () {
    return (this.dataset.claseEtiqueta || '').trim();
  }

  get claseCampo () {
    return (this.dataset.claseCampo || '').trim();
  }

  get tipo () {
    return (this.dataset.tipo || '').trim();
  }

  get grupo () {
    return (this.dataset.grupo || '').trim();
  }
}

customElements.define('campo-texto', CampoTexto);
