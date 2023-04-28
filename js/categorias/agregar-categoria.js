import utils from '../utils.js';

(() => {
  document.addEventListener('agregarcategoria', () => {
    fetch('php/includes/categories/agregar_categoria.inc.php', {
      method: 'POST',
      body: new FormData(document.querySelector('form'))
    })
      .then((respuesta) => respuesta.json())
      .then((datos) => {
        utils.obtenerRespuesta(datos, (itemError) => {
          document.querySelector('campo-texto').appendChild(itemError);
        });
      });
  });
})();
