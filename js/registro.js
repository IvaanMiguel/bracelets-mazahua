document.querySelector('.boton-registro').addEventListener('click', (e) => {
  e.preventDefault();

  fetch('php/includes/registro.inc.php', {
    method: 'POST',
    body: new FormData(document.querySelector('.formulario'))
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      document.querySelectorAll('.notificaciones').forEach((e) => e.remove());

      switch (datos.tipo) {
        case 'url':
          location.href = datos.contenido;
          break;

        case 'mensaje':
          const mensaje = datos.contenido.mensaje;
          const ambito = datos.contenido.ambito;
          const notificacion = new Notificacion(mensaje, ambito);
          const notificaciones = document.querySelector(`.notificacion-${ambito}`);

          if (!notificaciones) {
            document.querySelector('.campos').after(notificacion.elemento);
            return;
          }

          notificaciones.appendChild(document.createElement('br'));
          notificaciones.appendChild(document.createTextNode(notificacion.mensaje));
          break;

        case 'array':
          datos.contenido.forEach((item) => {
            const notificacion = new Notificacion(item.mensaje, item.ambito);
            const notificaciones = document.querySelector(`.notificacion-${notificacion.ambito}`);

            if (!notificaciones) {
              switch (notificacion.ambito) {
                case 'clave':
                  document.querySelector('.input-clave').after(notificacion.elemento);
                  break;

                case 'general':
                  document.querySelector('.campos').after(notificacion.elemento);
                  break;

                default:
                  notificacion.insertarAmbito();
                  break;
              }
              return;
            }

            notificaciones.appendChild(document.createElement('br'));
            notificaciones.appendChild(document.createTextNode(notificacion.mensaje));
          });
          break;
      }
    });
});

document.querySelectorAll('.ayuda').forEach((element) => {
  let texto;
  if (element.classList.contains('ayuda-nombre')) {
    texto = 'Debe tener mínimo 4 caracteres y máximo 15 caracteres.\nSolo puede contener letras y números.';
  } else if (element.classList.contains('ayuda-clave')) {
    texto =
      'Debe tener mínimo 8 caracteres y máximo 20 caracteres.\nDebe contener al menos una letra mayúscula y un número.';
  }

  let ayuda;
  element.addEventListener('mouseenter', () => {
    ayuda = new Ayuda(texto);
  });
  element.addEventListener('mousemove', (e) => {
    ayuda.actualizarPosicion(e.pageX + 15, e.pageY + 25);
  });
  element.addEventListener('mouseleave', () => {
    ayuda.remover();
  });
});

const mostrarClave = document.querySelector('.icono-visibilidad');

mostrarClave.addEventListener('mousedown', () => {
  document.querySelector('[name=clave]').type = 'text';
  document.querySelector('[name=claveVerificacion]').type = 'text';
  mostrarClave.innerText = 'visibility_off';
});

mostrarClave.addEventListener('mouseup', () => {
  document.querySelector('[name=clave]').type = 'password';
  document.querySelector('[name=claveVerificacion]').type = 'password';
  mostrarClave.innerText = 'visibility';
});

mostrarClave.addEventListener('mouseleave', () => {
  const clave = document.querySelector('[name=clave]');
  const claveVerificacion = document.querySelector('[name=claveVerificacion]');

  if (clave.type === 'text' || claveVerificacion.type === 'text') {
    document.querySelector('[name=clave]').type = 'password';
    document.querySelector('[name=claveVerificacion]').type = 'password';
    mostrarClave.innerText = 'visibility';
  }
});
