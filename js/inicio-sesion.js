document.querySelector('.boton-inicio-sesion').addEventListener('click', (e) => {
    e.preventDefault();

    fetch('php/includes/iniciosesion.inc.php', {
        method: 'POST',
        body: new FormData(document.querySelector('.formulario')),
    })
        .then((respuesta) => respuesta.json())
        .then((datos) => {
            document.querySelectorAll('.notificaciones').forEach((e) => e.remove());

            switch (datos.tipo) {
                case 'url':
                    location.href = datos.contenido;
                    break;

                case 'mensaje':
                    let mensaje = datos.contenido.mensaje;
                    let ambito = datos.contenido.ambito;
                    let notificacion = new Notificacion(mensaje, ambito);
                    let notificaciones = document.querySelector(`.notificacion-${ambito}`);

                    if (!notificaciones) {
                        document.querySelector('.campos').after(notificacion.elemento);
                        return;
                    }

                    notificaciones.appendChild(document.createElement('br'));
                    notificaciones.appendChild(document.createTextNode(notificacion.mensaje));
                    break;

                case 'array':
                    datos.contenido.forEach((item) => {
                        let notificacion = new Notificacion(item.mensaje, item.ambito);
                        let notificaciones = document.querySelector(`.notificacion-${notificacion.ambito}`);

                        if (!notificaciones) {
                            document.querySelector('.campos').after(notificacion.elemento);
                            return;
                        }

                        notificaciones.appendChild(document.createElement('br'));
                        notificaciones.appendChild(document.createTextNode(notificacion.mensaje));
                    });
                    break;
            }
        });
});

let mostrarClave = document.querySelector('.icono-visibilidad');

mostrarClave.addEventListener('mousedown', () => {
    document.querySelector('[name=clave]').type = 'text';
    mostrarClave.innerText = 'visibility_off';
});

mostrarClave.addEventListener('mouseup', () => {
    document.querySelector('[name=clave]').type = 'password';
    mostrarClave.innerText = 'visibility';
});

mostrarClave.addEventListener('mouseleave', () => {
    let clave = document.querySelector('[name=clave]');

    if (clave.type === 'text') {
        document.querySelector('[name=clave]').type = 'password';
        mostrarClave.innerText = 'visibility';
    }
});
