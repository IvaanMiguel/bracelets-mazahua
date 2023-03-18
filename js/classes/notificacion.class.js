// eslint-disable-next-line no-unused-vars
class Notificacion {
  constructor (mensaje, ambito) {
    this.mensaje = mensaje;
    this.ambito = ambito;

    this.elemento = document.createElement('div');
    this.elemento.innerText = mensaje;
    this.elemento.className = `notificaciones notificacion-${ambito}`;
  }

  agregarMensaje (mensaje) {
    const texto = document.createTextNode(mensaje);
    this.elemento.appendChild(texto);
  }

  insertarAmbito () {
    document.querySelector(`[name="${this.ambito}"]`).after(this.elemento);
  }
}
