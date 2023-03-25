import { CampoTexto } from '../campo-texto/campo-texto.js';
import { componentsUtil } from '../components-util.js';

/**
 * Genera campos de texto para contraseñas capaces de inicializarse con
 * una etiqueta, un icono, un campo y un icono extra para alternar la visibilidad
 * de dicho campo.
 * Este icono para alternar visibilidad afectará a todos los campos que tengan su dataset
 * grupo definido con el mismo número. Si es ignorado, se le asignará por defecto el número 1.
 * Es posible omitir cada elemento a excepción del campo, el cual será agregado como un input por defecto
 * si es ignorado.
 * @example
 * <campo-clave data-grupo='1'>
 *   <div class='etiqueta'>
 *     <span slot='etiqueta-texto'></span>
 *     <md-icono slot='etiqueta-icono'></md-icono>
 *   </div>
 *   <div class='campo-contenedor'>
 *     <input slot='campo'></input>
 *     <md-icono slot='etiqueta-icono'></md-icono>
 *   </div>
 * </campo-clave>
 */
class CampoClave extends CampoTexto {
  constructor () {
    super();

    /**
     * Elemento HTML `Link` que tendrá la referencia a los estilos locales CSS `campo-clave.css`.
     * @type {HTMLLinkElement}
     */
    this.claveEstilos = document.createElement('link');

    /**
     * Elemento HTML representante del icono que alternará la visibilidad del campo.
     * @type {HTMLElement}
     */
    this.iconoVisibilidad = this.querySelector('[slot="icono-visibilidad"]');

    componentsUtil.cargarEstilos(this.shadowRoot, 'components/campo-clave/campo-clave.css');

    if (!this.grupo) this.dataset.grupo = 1;

    this.modificarTemplate();
  }

  connectedCallback () {
    this.shadowRoot.appendChild(this.template.content.cloneNode(true));

    if (this.iconoVisibilidad) {
      this.iconoVisibilidad.span.addEventListener('mousedown', () => this.mostrarCampo());
      this.iconoVisibilidad.span.addEventListener('mouseup', () => this.ocultarCampo());
      this.iconoVisibilidad.span.addEventListener('mouseleave', () => this.ocultarCampo());
    }
  }

  /**
   * Modifica el template heredado por `campo-texto` para adaptarse al componente.
   */
  modificarTemplate () {
    const campoContenedor = document.createElement('div');
    campoContenedor.className = 'campo-contenedor';

    const iconoSlot = document.createElement('slot');
    iconoSlot.setAttribute('name', 'icono-visibilidad');

    campoContenedor.appendChild(this.template.content.querySelector('[name="campo"]'));
    campoContenedor.appendChild(iconoSlot);

    this.template.content.appendChild(campoContenedor);

    console.log(this.template.content);
  }

  /**
   * Cambia el atributo `type` a `text` de todos los componentes que coincidan con el
   * mismo grupo definito en el atributo `data-grupo`.
   */
  mostrarCampo () {
    document.querySelectorAll(`[data-grupo='${this.grupo}']`).forEach((elemento) => {
      elemento.querySelector('[slot="campo"]').setAttribute('type', 'text');
      this.iconoVisibilidad.span.innerText = 'visibility_off';
    });
  }

  /**
   * Cambia el atributo `type` a `password` de todos los componentes que coincidan con el
   * mismo grupo definito en el atributo `data-grupo`.
   */
  ocultarCampo () {
    document.querySelectorAll(`[data-grupo='${this.grupo}']`).forEach((elemento) => {
      elemento.querySelector('[slot="campo"]').setAttribute('type', 'password');
      this.iconoVisibilidad.span.innerText = this.iconoVisibilidad.dataIcono;
    });
  }

  get grupo () {
    return (this.dataset.grupo || '').trim();
  }
}

customElements.define('campo-clave', CampoClave);
