import { obtenerRespuesta } from '../vista-control.js';

(() => {
  const ventanaEliminar = document.getElementById('eliminar-producto');
  const informacionProducto = document.getElementById('informacion-producto');

  document.addEventListener('eliminarproducto', () => {
    ventanaEliminar.querySelectorAll('.nombre-producto').forEach((elemento) => {
      elemento.innerText = informacionProducto.contenido.Nombre;
    });

    ventanaEliminar.mostrarVentana();
  });

  ventanaEliminar.addEventListener('cancelar', () => ventanaEliminar.cerrarVentana());

  const idProductoInput = document.getElementById('id-producto');
  const idCategoriaInput = document.getElementById('id-categoria');
  const productosTitulo = document.getElementById('productos-titulo');
  const productosExtra = document.getElementById('productos-extra');
  const totalProductos = document.getElementById('total-productos');
  const totalCategorias = document.getElementById('total-categorias');
  const subtab = document.getElementById('subtab');

  ventanaEliminar.addEventListener('confirmareliminarproducto', () => {
    const formData = new FormData();
    formData.append('id', idProductoInput.value);

    fetch('php/includes/products/eliminar_producto.inc.php', {
      method: 'POST',
      body: formData
    })
      .then((respuesta) => respuesta.json())
      .then((datos) => {
        obtenerRespuesta(datos);
        ventanaEliminar.cerrarVentana();

        if (datos.status === 0) return;

        const itemProducto = document.body.querySelector(`.id-producto[value='${idProductoInput.value}']`)
          .closest('item-divisor');
        const listaCategoria = itemProducto.closest('lista-controlador');

        itemProducto.remove();

        totalProductos.innerText = +totalProductos.innerText - 1;
        productosTitulo
          .innerHTML = `${totalProductos.outerHTML} producto${+totalProductos.innerText === 1 ? '' : 's'}`;

        if (!listaCategoria.childElementCount) {
          listaCategoria.closest('wc-colapsable').remove();
          totalCategorias.innerText = +totalCategorias.innerText - 1;
          productosExtra
            .innerHTML = `en ${totalCategorias.outerHTML} categoria${+totalCategorias.innerText === 1 ? '' : 's'}`;
        }

        informacionProducto.contenido = {
          Nombre: 'Cargando...',
          'Categoría': 'Cargando...',
          Precio: 'Cargando...',
          Existencias: 'Cargando...'
        };

        idProductoInput.value = '';
        idCategoriaInput.value = '';

        subtab.seleccionarTab(2);
      });
  });
})();
