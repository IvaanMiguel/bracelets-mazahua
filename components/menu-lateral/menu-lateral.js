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
    this.addEventListener('alternarmenu', () => this.alternarMenu());
    this.addEventListener('cargarseccion', (e) => this.cargarSeccion(e.detail.pagina));
    this.addEventListener('cerrarsesion', () => this.cerrarSesion());
  }

  /**
   * Cambia el estado en el que el menú lateral y sus hijos se encuentran, alternando
   * entre un estado reducido y uno expandido.
   */
  alternarMenu () {
    if (this.claseReducido) {
      this.classList.toggle(this.claseReducido);
    }

    this.querySelectorAll('[name], [data-evento="cerrarsesion"]').forEach((boton) => {
      boton.classList.toggle(boton.dataset.claseReducido);
      const etiqueta = boton.querySelector('[data-rol="etiqueta"]');
      etiqueta.classList.toggle(etiqueta.dataset.claseReducido);
    });
  }

  cargarSeccion (pagina) {
    fetch('php/includes/index.inc.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'pagina=' + encodeURIComponent(pagina)
    })
      .then((respuesta) => respuesta.text())
      .then((pagina) => {
        document.querySelector('[data-rol="secciones"]').innerHTML = pagina;
      });
  }

  cerrarSesion () {
    fetch('php/includes/cerrarsesion.inc.php')
      .then((respuesta) => respuesta.json())
      .then((datos) => (location.href = datos.contenido));
  }

  get claseReducido () {
    return (this.dataset.claseReducido || '').trim();
  }
}

customElements.define('menu-lateral', MenuLateral);
