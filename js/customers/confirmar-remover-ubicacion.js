import { crearNotificacion } from '../vista-control.js';
import Mensajes from './constantes-ubicaciones.js';

(() => {
  const ventanaEmergente = document.body.querySelector('#remover-ubicacion');
  let ubicacion;

  ventanaEmergente.querySelector('boton-delineado')
    .addEventListener('click', () => ventanaEmergente.cerrarVentana());
  ventanaEmergente.querySelector('boton-icono')
    .addEventListener('click', () => ventanaEmergente.cerrarVentana());

  document.addEventListener('confirmarremoverubicacion', (e) => {
    ventanaEmergente.mostrarVentana();
    ubicacion = e.target.parentElement;
  });

  ventanaEmergente.addEventListener('removerubicacion', () => {
    ubicacion.remove();
    ventanaEmergente.cerrarVentana();
    crearNotificacion(
      Mensajes.UBICACION_REMOVIDA_TITULO,
      Mensajes.UBICACION_REMOVIDA_MENSAJE,
      'exito'
    );
  });
})();
