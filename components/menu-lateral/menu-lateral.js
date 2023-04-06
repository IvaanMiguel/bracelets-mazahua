import { componentsUtil } from '../components-util.js';

/**
 * Documentación por ser añadida.
 * @example
 * <menu-lateral data-clase-reducido=''>
 * </menu-lateral>
 */
class MenuLateral extends HTMLElement {
  constructor () {
    super();

    componentsUtil.cargarEstilos(this, 'components/menu-lateral/menu-lateral.css');
  }

  connectedCallback () {
    this.addEventListener('alternarmenu', this.alternarMenu);
    document.body.addEventListener('cargarseccion', this.cargarSeccion);
    document.body.addEventListener('confirmarcierresesion', this.confirmarCerrarSesion);
  }

  /**
   * Cambia el estado en el que el menú lateral y sus hijos se encuentran, alternando
   * entre un estado reducido y uno expandido.
   */
  alternarMenu () {
    if (this.claseReducido) {
      this.classList.toggle(this.claseReducido);
    }

    this.querySelectorAll('[name], [data-evento="confirmarcierresesion"]').forEach((boton) => {
      boton.classList.toggle(boton.dataset.claseReducido);
      const etiqueta = boton.querySelector('[data-rol="etiqueta"]');
      etiqueta.classList.toggle(etiqueta.dataset.claseReducido);
    });
  }

  confirmarCerrarSesion () {
    document.querySelector('[data-id="cerrar-sesion"]').setAttribute('style', 'display: flex;');
  }

  cargarSeccion (e) {
    fetch('php/includes/index.inc.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'paginaSolicitada=' + encodeURIComponent(e.detail.paginaSolicitada)
    })
      .then((respuesta) => respuesta.text())
      .then((paginaSolicitada) => (document.querySelector('[data-rol="secciones"]').innerHTML = paginaSolicitada));
  }

  get claseReducido () {
    return (this.dataset.claseReducido || '').trim();
  }
}

customElements.define('menu-lateral', MenuLateral);
