import { obtenerRespuesta } from '../vista-control.js';
import { ordenarProductosCategorias, ordenarProductos } from './ordenar-productos.js';
import WCColapsable from '../../components/wc-colapsable.js';

(() => {
  const ventanaEditarProducto = document.getElementById('editar-producto');
  const nombreInput = ventanaEditarProducto.querySelector('[name="nombre"]');
  const precioInput = ventanaEditarProducto.querySelector('[name="precio"]');
  const existenciasInput = ventanaEditarProducto.querySelector('[name="existenciasIniciales"]');
  const categoriaInput = ventanaEditarProducto.querySelector('[name="categoria"]');
  const idCategoriaInput = document.getElementById('id-categoria');

  document.addEventListener('editarproducto', () => {
    const producto = document.getElementById('informacion-producto').contenido;

    ventanaEditarProducto.querySelector('.nombre-producto').innerText = producto.Nombre;

    nombreInput.placeholder = producto.Nombre;
    precioInput.placeholder = producto.Precio;
    existenciasInput.placeholder = producto.Existencias;

    categoriaInput.value = idCategoriaInput.value;

    ventanaEditarProducto.mostrarVentana();
  });

  const ventanaConfirmacion = document.getElementById('confirmar-descarte');
  const reiniciarVentanaEditarProducto = () => {
    nombreInput.value = '';
    precioInput.value = '';
    existenciasInput.value = '';

    ventanaEditarProducto.querySelectorAll('item-error').forEach((itemError) => itemError.remove());
    ventanaEditarProducto.cerrarVentana();
  };

  ventanaEditarProducto.addEventListener('verificarcierre', () => {
    if (nombreInput.value || precioInput.value || existenciasInput.value ||
        idCategoriaInput.value !== categoriaInput.value) {
      ventanaConfirmacion.mostrarVentana();
      return;
    }

    reiniciarVentanaEditarProducto();
  });

  ventanaConfirmacion.addEventListener('cancelarcierre', () => ventanaConfirmacion.cerrarVentana());
  ventanaConfirmacion.addEventListener('cerrarventanas', () => {
    reiniciarVentanaEditarProducto();
    ventanaConfirmacion.cerrarVentana();
  });

  const informacionProducto = document.getElementById('informacion-producto');
  const idProductoInput = document.getElementById('id-producto');
  const totalCategorias = document.getElementById('total-categorias');
  const productosExtra = document.getElementById('productos-extra');

  ventanaEditarProducto.addEventListener('actualizarproducto', () => {
    const formData = new FormData(ventanaEditarProducto.querySelector('form'));
    formData.append('idProducto', document.getElementById('id-producto').value);

    fetch('php/includes/products/editar_producto.inc.php', {
      method: 'POST',
      body: formData
    })
      .then((respuesta) => respuesta.json())
      .then((datos) => {
        obtenerRespuesta(datos, (itemError) => {
          ventanaEditarProducto.querySelector('form contenedor-flex').appendChild(itemError);
        }, ventanaEditarProducto);

        if (datos.status === 0) return;

        const nombreCategoria = categoriaInput.options[categoriaInput.selectedIndex].text;

        const nombre = nombreInput.value
          ? nombreInput.value
          : informacionProducto.contenido.Nombre;
        const categoria = categoriaInput.value !== idCategoriaInput.value
          ? nombreCategoria
          : informacionProducto.contenido['Categoría'];
        const precio = precioInput.value
          ? `$${(+precioInput.value).toFixed(2)} MXN`
          : informacionProducto.contenido.Precio;
        const existencias = existenciasInput.value
          ? existenciasInput.value
          : informacionProducto.contenido.Existencias;

        informacionProducto.contenido = {
          Nombre: nombre,
          'Categoría': categoria,
          Precio: precio,
          Existencias: Math.trunc(+existencias)
        };

        const itemProducto = document.body.querySelector(`.id-producto[value='${idProductoInput.value}']`)
          .closest('item-divisor');

        itemProducto.querySelector('#nombre-producto').classList.remove('no-existencias');

        const originalListaCategoria = document.body.querySelector(`wc-colapsable lista-controlador[id='${idCategoriaInput.value}']`);
        let nuevaListaCategoria = document.body.querySelector(`wc-colapsable lista-controlador[id='${categoriaInput.value}']`);

        /*
         * En caso de que el producto haya sido cambiado a una nueva categoría distinta a la original;
         * si esta nueva categoría no estaba ya presente en la lista de productos, es decir, era una categoría
         * sin productos en ella, se crea un nuevo colapsable para la categoría en el que se añadirá este nuevo
         * producto, caso contrario simplemente se añadirá dicho producto al colapsable de la categoría ya
         * existente.
         */
        if (categoriaInput.value !== idCategoriaInput.value) {
          if (!nuevaListaCategoria) {
            const categoriaColapsable = new WCColapsable();
            categoriaColapsable.innerHTML = /*html*/`
              <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-m'>
                ${nombreCategoria}
              </wc-texto>
              <lista-controlador id=${categoriaInput.value}></lista-controlador>
            `;

            nuevaListaCategoria = categoriaColapsable.querySelector('lista-controlador');
            itemProducto.dataNoDivisor = true;
            nuevaListaCategoria.appendChild(itemProducto);
            document.body.querySelector('lista-encabezada').appendChild(categoriaColapsable);

            totalCategorias.innerText = +totalCategorias.innerText + 1;

            ordenarProductosCategorias();
          } else {
            nuevaListaCategoria.appendChild(itemProducto);
            ordenarProductos(nuevaListaCategoria);
          }

          /*
           * Si el producto fue cambiado de una categoría que solo contenía un producto, es decir,
           * una categoría que solo contenía a este mismo producto, el colapsable de esta categoría
           * original se eliminará.
          */
          if (!originalListaCategoria.childElementCount) {
            originalListaCategoria.closest('wc-colapsable').remove();
            totalCategorias.innerText = +totalCategorias.innerText - 1;
          } else {
            originalListaCategoria.lastElementChild.dataNoDivisor = true;
          }

          productosExtra
            .innerHTML = `en ${totalCategorias.outerHTML} categoría${+totalCategorias.innerText === 1 ? '' : 's'}`;
        } else {
          // Si se cambió el nombre del producto, su compoenente en la lista se actualizará.
          if (nombreInput.value) {
            itemProducto.querySelector('wc-texto').innerText = nombreInput.value;
            ordenarProductos(originalListaCategoria);
          }
        }

        reiniciarVentanaEditarProducto();
      });
  });
})();
