<lista-desplegable>
  <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
    Categoría
  </wc-texto>
  <select class='lista-categorias' name='categoria'>
    <option value='' hidden selected>Selecciona una categoría</option>

    <?php
      require_once AUTOLOADER;

      $vistaCategoria = new \controllers\VistaCategoria();
      $resultado = json_decode($vistaCategoria->mostrarCategorias(), true);

      foreach($resultado['contenido'] as $categoria): ?>
        <option value=<?= $categoria['idCategoriaProducto'] ?>>
          <?= $categoria['nombreCategoria'] ?>
        </option>
    <?php endforeach; ?>

  </select>
</lista-desplegable>  
