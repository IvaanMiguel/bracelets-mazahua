import { BotonComun } from '../boton-comun/boton-comun.js';

/**
 * Encargada de establecer botones que adopten el comportamiento en común
 * de la clase `BotonComun`. Para más información ver la clase mencionada.
 */
class MdBoton extends HTMLButtonElement {
  constructor() {
    super();

    this.botonComun = new BotonComun(this);
  }

  connectedCallback() {
    this.botonComun.connectedCallback();
  }
}

customElements.define('md-boton', MdBoton, { extends: 'button' });
