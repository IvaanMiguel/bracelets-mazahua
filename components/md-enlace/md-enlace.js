import { BotonComun } from '../boton-comun/boton-comun.js';

/**
 * Clase que hereda del elemento "a", utilizada para crear
 * enlaces que se inicialicen con estilos predeterminados
 * según su contenido y con propiedades por defecto.
 * El contenido de esta clase y los estilos del componente se encuentran
 * en la carpeta components/boton-comun.
 */
class MdEnlace extends HTMLAnchorElement {
    constructor() {
        super();
        this.botonComun = new BotonComun(this);
    }
}

customElements.define('md-enlace', MdEnlace, { extends: 'a' });
