export class MdIcono extends HTMLElement {
    constructor() {
        super();

        this.attachShadow({ mode: 'open' });

        this.style.display = 'flex';
        this.style.cursor = this.dataCursor;

        this.googleLink = document.createElement('link');
        this.clasesLink = document.createElement('link');
        this.estilos = document.createElement('style');
        this.span = document.createElement('span');

        this.crearEstilos();
    }

    connectedCallback() {
        this.span.textContent = this.dataIcono;

        const shadow = this.shadowRoot;
        shadow.appendChild(this.googleLink);
        shadow.appendChild(this.clasesLink)
        shadow.appendChild(this.estilos);
        shadow.appendChild(this.span);
    }

    crearEstilos() {
        this.googleLink.setAttribute('rel', 'stylesheet');
        this.googleLink.setAttribute('href', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200')

        this.clasesLink.setAttribute('rel', 'stylesheet');
        this.clasesLink.setAttribute('href', 'css/clases.css');

        this.span.classList.add('material-symbols-outlined');
        this.classList.forEach(clase => this.span.classList.add(clase));

        this.estilos.textContent = `
            span {
                user-select: none;
                font-variation-settings:
                'FILL' ${this.dataFill},
                'wght' ${this.dataWght},
                'GRAD' ${this.dataGrad},
                'opsz' ${this.dataOpsz}
            };
        `;
    }

    get dataIcono() {
        return this.dataset.icono || '×';
    }

    get dataFill() {
        return this.dataset.fill || 0;
    }

    get dataWght() {
        return this.dataset.wght || 400;
    }
    
    get dataGrad() {
        return this.dataset.grad || 0;
    }

    get dataOpsz() {
        return this.dataset.opsz || 48;
    }

    get dataCursor() {
        return this.dataset.cursor || 'auto';
    }
}

customElements.define('md-icono', MdIcono);
