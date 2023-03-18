import { componentsUtil } from '../components-util.js';

/**
 * Permite crear un elemento inicializado con los estilos por defecto de
 * Material Design de Google. Cada atributo puede ser omitido, pero será reemplazado
 * por los valores por defecto mostrados a continuación.
 * @example
 * <md-icono data-icono='×' data-fill='0' data-wght='400' data-grad='0' data-opsz='48'>
 * </md-icono>
 */
export class MdIcono extends HTMLElement {
  constructor () {
    super();

    /**
     * Tendrá la referencia a la API de Material Design Icons.
     * @type {HTMLLinkElement}
     */
    this.googleLink = document.createElement('link');

    /**
     * Tendrá la referencia al estilos globales CSS `clases.css`.
     * @type {HTMLLinkElement}
     */
    this.clasesLink = document.createElement('link');

    /**
     * Tendrá la referencia a los estilos locales CSS `md-icono.css`.
     * @type {HTMLLinkElement}
     */
    this.estilosIcono = document.createElement('link');

    /**
     * Contenedor principal del icono.
     * @type {HTMLSpanElement}
     */
    this.span = document.createElement('span');

    this.attachShadow({ mode: 'open' });

    this.style.display = 'flex';
    this.crearEstilos();
  }

  connectedCallback () {
    this.span.textContent = this.dataIcono;

    const shadow = this.shadowRoot;
    shadow.appendChild(this.googleLink);
    shadow.appendChild(this.clasesLink);

    shadow.appendChild(this.estilosIcono);
    shadow.appendChild(this.span);
  }

  /**
   * Inicializa los elementos de estilos que serán usados en el componente en
   * cuestión, además de agregar a dicho componente las configuraciones de variación
   * de la fuente definidas por los atributos `data-fill`, `data-wght`, `data-grad` y `data-opsz`.
   */
  crearEstilos () {
    componentsUtil.establecerAtributos(this.googleLink, {
      rel: 'stylesheet',
      href: 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200'
    });

    componentsUtil.establecerAtributos(this.clasesLink, {
      rel: 'stylesheet',
      href: 'css/clases.css'
    });

    componentsUtil.establecerAtributos(this.estilosIcono, {
      rel: 'stylesheet',
      href: 'components/md-icono/md-icono.css'
    });

    this.span.classList.add('material-symbols-outlined');
    this.classList.forEach((clase) => this.span.classList.add(clase));

    if (this.dataFill || this.dataWght || this.dataGrad || this.dataOpsz) {
      const dataFill = this.dataFill || 0;
      const dataWght = this.dataWght || 400;
      const dataGrad = this.dataGrad || 0;
      const dataOpsz = this.dataOpsz || 48;
      this.span.setAttribute(
        'style',
        `font-variation-settings: 'FILL' ${dataFill}, 'wght' ${dataWght}, 'GRAD' ${dataGrad}, 'opsz' ${dataOpsz};`
      );
    }
  }

  get dataIcono () {
    return (this.dataset.icono || '×').trim();
  }

  get dataFill () {
    return (this.dataset.fill || '0').trim();
  }

  get dataWght () {
    return (this.dataset.wght || '400').trim();
  }

  get dataGrad () {
    return (this.dataset.grad || '0').trim();
  }

  get dataOpsz () {
    return (this.dataset.opsz || '48').trim();
  }
}

customElements.define('md-icono', MdIcono);
