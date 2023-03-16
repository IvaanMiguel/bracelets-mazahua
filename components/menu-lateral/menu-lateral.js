import { componentsUtil } from '../components-util.js';

class MenuLateral extends HTMLElement {
    constructor() {
        super();

        this.classList.add('menu-lateral');
        componentsUtil.cargarEstilos(this, 'components/menu-lateral/menu-lateral.css');

        this.botonMenu = this.querySelector('.boton-menu');
        this.botonesSecciones = this.querySelectorAll('.secciones__boton');
    }

    connectedCallback() {
        if (this.botonMenu) {
            this.botonMenu.addEventListener('click', () => this.alternarMenu());
        }
        if (this.botonesSecciones) {
            this.botonesSecciones.forEach((boton) => {
                boton.addEventListener('click', () => this.cargarSeccion(boton.name));
            })
        }
    }

    alternarMenu() {
        this.classList.toggle('menu-lateral--reducido');

        this.querySelectorAll('.boton--icono-texto').forEach((boton) => {
            boton.classList.toggle('boton--icono');
            boton.querySelector('.etiqueta-grande').classList.toggle('etiqueta--oculto');
        });
    }

    cargarSeccion(pagina) {
        fetch('php/includes/index.inc.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'pagina=' + encodeURIComponent(pagina),
        })
            .then((respuesta) => respuesta.text())
            .then((pagina) => {
                document.querySelector('.seccion').innerHTML = pagina;
            });
    }
}

customElements.define('menu-lateral', MenuLateral);
