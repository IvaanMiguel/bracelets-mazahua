import { MdIcono } from '../md-icono/md-icono.js';
import { componentsUtil } from '../components-util.js';

/**
 * Permite instanciar un elemento 'icono-emergente' con 'event listeners' de ratón
 * añadidos, permtiéndole mostrar u ocultar un elemento emergente con información.
 * Dada la clase padre de la que hereda, acepta todos los atributos de `MdIcono`.
 * @example
 * <icono-emergente>
 *     Texto emergente a mostrar
 * </icono-emergente>
 */
class IconoEmergente extends MdIcono {
    constructor() {
        super();

        /**
         * Tendrá la referencia a los estilos locales CSS `icono-emergente.css`.
         * @type {HTMLLinkElement}
         */
        this.estilosLink = document.createElement('link');

        /**
         * Contenedor emergente que contendrá la información a mostrar y ocultar.
         * @type {HTMLDivElement}
         */
        this.div = document.createElement('div');

        componentsUtil.establecerAtributos(this.estilosLink, {
            rel: 'stylesheet',
            href: 'components/icono-emergente/icono-emergente.css'
        })

    }
    
    connectedCallback() {
        this.shadowRoot.appendChild(this.estilosLink);
        super.connectedCallback();

        this.div.textContent = this.textContent;

        if (!this.span) return;

        this.span.addEventListener('mouseenter', () => this.agregarInfo());
        this.span.addEventListener('mousemove', (e) => this.actualizarPosicion(e.pageX + 15, e.pageY + 25));
        this.span.addEventListener('mouseleave', () => this.removerInfo());
    }

    /**
     * Agrega al `DOM` el `div` emergente con la información siempre y
     * cuando este se encuentre.
     * */
    agregarInfo() {
        if (!this.div) return;

        this.shadowRoot.append(this.div);
    }

    /**
     * Actualiza la posición del `div` emergente en el `DOM` siempre y
     * cuando este se encuentre.
     * @param {number} x Posición horizontal en el DOM.
     * @param {number} y Posición vertical en el DOM.
     */
    actualizarPosicion(x, y) {
        if (!this.div) return;

        this.div.style.left = `${x}px`;
        this.div.style.top = `${y}px`;
    }

    /**
     * Remueve del `DOM` el div emergente con la información siempre y
     * cuando este se encuentre.
     */
    removerInfo() {
        if (!this.div) return;

        this.div.remove();
    }
}

customElements.define('icono-emergente', IconoEmergente);
