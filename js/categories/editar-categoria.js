import utils from '../utils.js';

(() => {
  const ventanaPrincipal = document.getElementById('editar-categoria');

  const reiniciarVentanaPrincipal = () => {
    ventanaPrincipal.querySelector('[name="nuevoNombreCategoria"]').value = '';
    ventanaPrincipal.cerrarVentana();
  };

  document.addEventListener('editarcategoria', (e) => {
    const listaItem = e.target.parentElement;

    ventanaPrincipal.querySelector('.nombre-categoria').innerText = listaItem.innerText;
    ventanaPrincipal.mostrarVentana();
    ventanaPrincipal.idCategoria = listaItem.parentElement.querySelector('.id-categoria').value;
    ventanaPrincipal.listaItem = listaItem;
  });

  const ventanaConfirmacion = document.getElementById('confirmar-descarte');

  ventanaConfirmacion.addEventListener('cancelarcierre', () => ventanaConfirmacion.cerrarVentana());
  ventanaConfirmacion.addEventListener('cerrarventanas', () => {
    reiniciarVentanaPrincipal();
    ventanaConfirmacion.cerrarVentana();
  });

  ventanaPrincipal.addEventListener('verificarcierre', () => {
    const nuevoNombreCategoria = ventanaPrincipal.querySelector('[name="nuevoNombreCategoria"]').value;

    /*
     * Si no hay nada escrito en el campo, simplemente cierra la ventana, caso
     * contrario pide confirmación.
     */
    !nuevoNombreCategoria ? ventanaPrincipal.cerrarVentana() : ventanaConfirmacion.mostrarVentana();
  });

  ventanaPrincipal.addEventListener('actualizarcategoria', () => {
    const nuevoNombreCategoria = ventanaPrincipal.querySelector('[name="nuevoNombreCategoria"]').value;

    const formData = new FormData();
    formData.append('idCategoria', +ventanaPrincipal.idCategoria);
    formData.append('nuevoNombreCategoria', nuevoNombreCategoria);

    fetch('php/includes/categories/modificar_categoria.inc.php', {
      method: 'POST',
      body: formData
    })
      .then((respuesta) => respuesta.json())
      .then((datos) => {
        utils.obtenerRespuesta(datos, (itemError) => {
          ventanaPrincipal.querySelector('campo-texto').after(itemError);
        });

        if (datos.status !== 1) return;

        ventanaPrincipal.listaItem.querySelector('wc-texto').innerText = nuevoNombreCategoria;
        const categorias = document.querySelector('lista-controlador').querySelectorAll('item-divisor');

        utils.ordenarLista(categorias, (item) => {
          document.querySelector('lista-controlador').appendChild(item);
        });

        reiniciarVentanaPrincipal();
      });
  });
})();
