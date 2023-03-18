import { BotonComun } from '../boton-comun/boton-comun.js';

/**
 * Encargada de establecer enlaces que adopten el comportamiento en común
 * de la clase `BotonComun`. Para más información ver la clase mencionada.
 */
class MdEnlace extends HTMLAnchorElement {
    constructor() {
        super();

        this.botonComun = new BotonComun(this);
    }

    connectedCallback() {
        this.botonComun.connectedCallback();
    }
}

customElements.define('md-enlace', MdEnlace, { extends: 'a' });
