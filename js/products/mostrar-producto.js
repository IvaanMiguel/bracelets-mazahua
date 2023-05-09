(() => {
  const subtab = document.getElementById('subtab');
  document.addEventListener('regresarproductos', () => subtab.seleccionarTab(2));

  const mostrarProducto = new CustomEvent('mostrarproducto', {
    bubbles: true,
    composed: true
  });

  document.body.querySelectorAll('lista-item').forEach((elemento) => {
    elemento.addEventListener('click', () => elemento.dispatchEvent(mostrarProducto));
  });

  const informacionProducto = document.getElementById('informacion-producto');
  const idCategoriaInput = document.getElementById('id-categoria');
  const idProductoInput = document.getElementById('id-producto');

  document.addEventListener('mostrarproducto', (e) => {
    informacionProducto.contenido = {
      Nombre: 'Cargando...',
      Categoría: 'Cargando...',
      Precio: 'Cargando...',
      Existencias: 'Cargando...'
    };

    subtab.seleccionarTab(1);

    const formData = new FormData();
    formData.append('id', e.target.querySelector('.id-producto').value);

    fetch('php/includes/products/mostrar_producto.inc.php', {
      method: 'POST',
      body: formData
    })
      .then((respuesta) => respuesta.json())
      .then((datos) => {
        const producto = datos.contenido[0];

        informacionProducto.contenido = {
          Nombre: producto.nombreProducto,
          Categoría: producto.nombreCategoria,
          Precio: `$${producto.precio} MXN`,
          Existencias: producto.existencias
        };

        idCategoriaInput.value = producto.idCategoriaProducto;
        idProductoInput.value = producto.idProducto;
      });
  });
})();
