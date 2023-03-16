import { componentsUtil } from '../components-util.js';

/**
 * Clase creada para ser utilizada en conjunto por los componentes
 * md-boton y md-enlace, esto significa que ambos compoentes se
 * comportarán y verán de maneras exactamente iguales.
 * Esta clase no es usada para crear un componente con la misma.
 */
export class BotonComun {
    constructor(elemento) {
        this.elemento = elemento;

        this.elemento.classList.add('boton');
        componentsUtil.cargarEstilos(this.elemento, 'components/boton-comun/boton-comun.css');
        this.establecerTipo(this.elemento);

        if (!this.elemento.hasAttribute('title')) {
            this.elemento.setAttribute('title', this.elemento.innerText);
        }
    }

    /**
     * Se encarga de establecer la clase que tendrá el boton o enlace en
     * cuestión en base a los elementos dentro del componente. Si no se
     * encuentra ningún elemento dentro del componente, simplemente se agrega
     * un elemento span con un texto por defecto.
     */
    establecerTipo() {
        let icono = this.elemento.querySelector('md-icono');
        let etiqueta = this.elemento.querySelector('span');

        if (!etiqueta && icono) {
            this.elemento.classList.add('boton--icono');
        } else if (etiqueta && icono) {
            this.elemento.classList.add('boton--icono-texto');
        } else if (!etiqueta && !icono) {
            const span = document.createElement('span');
            span.classList.add('etiqueta', 'etiqueta-grande');
            span.textContent = 'Botón';

            this.elemento.appendChild(span);
        }
    }
}
