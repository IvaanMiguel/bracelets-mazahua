import utils from '../utils.js';

(() => {
  const ventanaEliminar = document.getElementById('eliminar-categoria');

  document.addEventListener('eliminarcategoria', (e) => {
    const listaItem = e.target.parentElement;

    ventanaEliminar.querySelectorAll('.nombre-categoria').forEach((elemento) => {
      elemento.innerText = listaItem.innerText;
    });
    ventanaEliminar.mostrarVentana();
    ventanaEliminar.idCategoria = listaItem.parentElement.querySelector('.id-categoria').value;
    ventanaEliminar.listaItem = listaItem;
  });

  ventanaEliminar.addEventListener('cancelar', () => ventanaEliminar.cerrarVentana());

  ventanaEliminar.addEventListener('confirmareliminarcategoria', () => {
    const formData = new FormData();
    formData.append('idCategoria', ventanaEliminar.idCategoria);

    fetch('php/includes/categories/eliminar_categoria.inc.php', {
      method: 'POST',
      body: formData
    })
      .then((respuesta) => respuesta.json())
      .then((datos) => {
        utils.obtenerRespuesta(datos);

        if (datos.status !== 1) return;

        ventanaEliminar.cerrarVentana();
        ventanaEliminar.listaItem.remove();

        const categorias = document.querySelectorAll('lista-controlador item-divisor lista-item');
        document.getElementById('categorias-titulo').innerText = categorias.length === 1
          ? '1 categoría'
          : `${categorias.length} categorías`;
      });
  });
})();
