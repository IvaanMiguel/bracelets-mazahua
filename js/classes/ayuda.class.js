class Ayuda {
    constructor(texto) {
        this.div = document.createElement('div');
        this.div.innerText = texto;
        this.div.className = 'texto-ayuda';
        document.body.appendChild(this.div);
    }

    actualizarPosicion(x, y) {
        this.div.style.left = `${x}px`;
        this.div.style.top = `${y}px`;
    }

    remover() {
        this.div.remove();
    }
}
