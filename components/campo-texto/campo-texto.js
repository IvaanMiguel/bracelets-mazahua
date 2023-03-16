import { componentsUtil } from '../components-util.js';

class CampoTexto extends HTMLElement {
    constructor() {
        super();

        this.attachShadow({ mode: 'open' });

        this.template = document.createElement('template');
        this.template.innerHTML = `
            <div class='etiqueta'>
                <slot class='etiqueta__texto' name='etiqueta-texto'></slot>
                <slot class='etiqueta__icono' name='etiqueta-icono'></slot>
            </div>
            <slot class='campo' name='campo'>
                <input class='campo fondo fondo-2-texto' type='text'>
            </slot>
        `;

        this.estilosLink = document.createElement('link');
        this.estilosLink.setAttribute('rel', 'stylesheet');
        this.estilosLink.setAttribute('href', 'components/campo-texto/campo-texto.css');
        this.etiquetaTexto = this.querySelector('[slot="etiqueta-texto"]');
        this.etiquetaIcono = this.querySelector('[slot="etiqueta-icono"]');
        this.campo = this.querySelector('[slot="campo"]');

        this.crearEstilos();
    }

    connectedCallback() {
        const shadow = this.shadowRoot;

        if (this.clasesLink) {
            shadow.appendChild(this.clasesLink);
        }

        shadow.appendChild(this.estilosLink);
        shadow.appendChild(this.template.content.cloneNode(true));
    }

    crearEstilos() {
        if (!this.etiquetaTexto && !this.etiquetaIcono) {
            this.style.gap = 0;
        }

        if (!this.campo) {
            this.clasesLink = document.createElement('link');
            this.clasesLink.setAttribute('rel', 'stylesheet');
            this.clasesLink.setAttribute('href', 'css/clases.css');
        }
    }
}

customElements.define('campo-texto', CampoTexto);
