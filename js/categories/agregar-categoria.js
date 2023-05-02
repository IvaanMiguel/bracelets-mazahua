import utils from '../utils.js';
import ItemDivisor from '../../components/item-divisor.js';

(() => {
  document.addEventListener('agregarcategoria', () => {
    fetch('php/includes/categories/agregar_categoria.inc.php', {
      method: 'POST',
      body: new FormData(document.querySelector('form'))
    })
      .then((respuesta) => respuesta.json())
      .then((datos) => {
        if (datos.status !== 1) {
          utils.obtenerRespuesta(datos, (itemError) => {
            document.querySelector('campo-texto').appendChild(itemError);
          });

          return;
        }

        const categoria = new ItemDivisor();
        categoria.innerHTML = /*html*/`
          <lista-item data-no-cursor>
            <wc-texto data-tipo-fuente='titulo-m'>${datos.contenido[0]}</wc-texto>
            <boton-icono
                slot='final'
                class='editar-categoria'
                data-evento='editarcategoria'
                data-icono='edit'>
            </boton-icono>
            <boton-icono
                slot='final'
                class='eliminar-categoria'
                data-evento='eliminarcategoria'
                data-icono='delete_forever'>
            </boton-icono>
            <input class='id-categoria' type='hidden' value=${datos.contenido[1]}>
          </lista-item>
        `;

        document.querySelector('lista-controlador').appendChild(categoria);

        /*
        * El color del texto del botón se debe agregar justo después de que fue conectado al documento
        * para que el método getComputedStyles pueda recuperar el valor hexadecimal correctamente.
        */
        const listaItem = categoria.querySelector('lista-item');
        listaItem.querySelector('.editar-categoria').dataColorTexto = 'var(--clr-secundario-40)';
        listaItem.querySelector('.eliminar-categoria').dataColorTexto = 'var(--clr-error-40)';

        const categorias = document.querySelector('lista-controlador').querySelectorAll('item-divisor');

        // Actualización del contador de categorías en la parte superior de la lista.
        document.getElementById('categorias-titulo').innerText = categorias.length === 1
          ? '1 categoría'
          : `${categorias.length} categorías`;

        utils.ordenarLista(categorias, (item) => {
          document.querySelector('lista-controlador').appendChild(item);
        });

        document.querySelector('[name="nuevaCategoria"]').value = '';
      });
  });
})();
