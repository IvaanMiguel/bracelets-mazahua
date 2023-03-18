import { componentsUtil } from '../components-util.js';

/**
 * Clase creada para ser utilizada en conjunto por los componentes
 * `md-boton` y `md-enlace`, esto significa que ambos compoentes se
 * comportarán y verán de maneras exactamente iguales.
 * Esta clase no es usada para crear un componente con la misma.
 * Permite inicializar elementos con los estilos y propiedades de un
 * botón y eventos personalizados en base a su propiedad `data-evento`.
 */
export class BotonComun {
    constructor(elemento) {
        /**
         * Elemento HTML del DOM.
         * @type {HTMLElement}
         */
        this.elemento = elemento;

        componentsUtil.cargarEstilos(this.elemento, 'components/boton-comun/boton-comun.css');

        if (!this.elemento.hasAttribute('title') && this.elemento.innerText) {
            this.elemento.setAttribute('title', this.elemento.innerText);
        }
    }

    /**
     * Añade un event listener de clic al elemento que ejecutará un evento
     * personalizado cuando este sea presionado.
     */
    connectedCallback() {
        if (!this.elemento.dataset.evento) return;

        this.elemento.addEventListener('click', () => {
            this.elemento.dispatchEvent(this.crearEvento());
        });
    }

    /**
     * Crea un objeto `CustomEvent` que puede ser disparado por el botón que haya llamado al método.
     * El nombre del evento es determinado por la propiedad `data-evento` del elemento, además de establecer
     * ciertos detalles en base a dicho nombre.
     * @return {CustomEvent} Un nuevo objeto de la clase `CustomEvent` con el atributo `bubbles` como `true`
     * y una serie de detalles según la propiedad `data-evento` del botón.
     */
    crearEvento() {
        const nombreEvento = this.elemento.dataset.evento;
        let detallesEvento = {};

        switch(nombreEvento) {
            case 'cargarseccion':
                detallesEvento = { pagina: this.elemento.name };
                break;

            case 'alternarmenu':
            case 'cerrarsesion':
                break;

            default:
                return null;
        }

        return new CustomEvent(nombreEvento, {
            bubbles: true,
            detail: detallesEvento
        });
    }
}
