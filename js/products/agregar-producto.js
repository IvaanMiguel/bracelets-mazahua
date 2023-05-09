import utils from '../utils.js';
import ordenar from './ordenar-productos.js';
import ItemDivisor from '../../components/item-divisor.js';
import WCColapsable from '../../components/wc-colapsable.js';

(() => {
  const formularioProducto = document.getElementById('formulario-producto');
  const nombreInput = formularioProducto.querySelector('[name="nombre"]');
  const precioInput = formularioProducto.querySelector('[name="precio"]');
  const existenciasInput = formularioProducto.querySelector('[name="existenciasIniciales"]');
  const categoriaInput = formularioProducto.querySelector('[name="categoria"]');
  const totalCategorias = document.getElementById('total-categorias');
  const totalProductos = document.getElementById('total-productos');
  const productosTitulo = document.getElementById('productos-titulo');
  const productosExtra = document.getElementById('productos-extra');

  document.addEventListener('agregarproducto', () => {
    fetch('php/includes/products/agregar_producto.inc.php', {
      method: 'POST',
      body: new FormData(document.querySelector('form'))
    })
      .then((respuesta) => respuesta.json())
      .then((datos) => {
        utils.obtenerRespuesta(datos, (itemError) => {
          formularioProducto.appendChild(itemError);
        });

        if (datos.status === 0) return;

        // Creación de un nuevo elemento HTML para el producto registrado.
        const producto = new ItemDivisor();
        producto.innerHTML = /*html*/`
          <lista-item>
            <wc-texto data-tipo-fuente='titulo-s'>
              ${document.querySelector('[name="nombre"]').value}
            </wc-texto>
            <input class='id-producto' type='hidden' value=${datos.contenido[0]}>
          </lista-item>
        `;

        producto.querySelector('lista-item').addEventListener('click', function () {
          this.dispatchEvent(new CustomEvent('mostrarproducto', {
            bubbles: true,
            composed: true
          }));
        });

        const listaCategoria = document.getElementById(categoriaInput.value);
        const nombreCategoria = categoriaInput.options[categoriaInput.selectedIndex].text;

        /*
         * Si la categoría con la que se registró el producto ya contaba previamente con
         * mínimo un producto, este nuevo producto se añadirá a la lista ya existente de dicha
         * categoría. Caso contrario se creará un nuevo elemento colapsable para esta nueva categoría.
         */
        if (listaCategoria) {
          listaCategoria.appendChild(producto);
          ordenar.ordenarProductos(listaCategoria);
        } else {
          const categoriaColapsable = new WCColapsable();
          categoriaColapsable.innerHTML = /*html*/`
            <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-m'>
              ${nombreCategoria}
            </wc-texto>
            <lista-controlador id=${categoriaInput.value}></lista-controlador>
          `;

          producto.dataNoDivisor = true;
          categoriaColapsable.querySelector('lista-controlador').appendChild(producto);
          document.body.querySelector('lista-encabezada').appendChild(categoriaColapsable);

          ordenar.ordenarProductosCategorias();

          totalCategorias.innerText = +totalCategorias.innerText + 1;
          productosExtra
            .innerHTML = `en ${totalCategorias.outerHTML} categoría${+totalCategorias.innerText === 1 ? '' : 's'}`;
        }

        totalProductos.innerText = +totalProductos.innerText + 1;
        productosTitulo
          .innerHTML = `en ${totalProductos.outerHTML} producto${+totalProductos.innerText === 1 ? '' : 's'}`;

        nombreInput.value = '';
        categoriaInput.value = '';
        precioInput.value = '';
        existenciasInput.value = '';
      });
  });
})();
