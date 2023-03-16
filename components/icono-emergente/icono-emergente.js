import { MdIcono } from '../md-icono/md-icono.js';

class IconoEmergente extends MdIcono {
    constructor() {
        super();

        this.estilosLink = document.createElement('link');
        this.estilosLink.setAttribute('rel', 'stylesheet');
        this.estilosLink.setAttribute('href', 'components/icono-emergente/icono-emergente.css');

        this.div = document.createElement('div');
    }

    connectedCallback() {
        super.connectedCallback();

        this.shadowRoot.appendChild(this.estilosLink);

        this.div.textContent = this.textContent;

        if (!this.span) return;
        this.span.addEventListener('mouseenter', () => this.agregarInfo());
        this.span.addEventListener('mousemove', (e) => this.actualizarPosicion(e.pageX + 15, e.pageY + 25));
        this.span.addEventListener('mouseleave', () => this.removerInfo());
    }

    agregarInfo() {
        this.shadowRoot.append(this.div);
    }

    actualizarPosicion(x, y) {
        if (!this.div) return;

        this.div.style.left = `${x}px`;
        this.div.style.top = `${y}px`;
    }

    removerInfo() {
        if (!this.div) return;

        this.div.remove();
    }
}

customElements.define('icono-emergente', IconoEmergente);
