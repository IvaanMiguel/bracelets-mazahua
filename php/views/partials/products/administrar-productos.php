<?php
  require_once AUTOLOADER;

  use controllers\Producto;

  $vistaProducto = Producto::vistaProductoConstructor();
  $categoriasActivas = json_decode($vistaProducto->mostrarCategoriasActivas(), true)['contenido'];
  $productos = json_decode($vistaProducto->mostrarProductos(), true)['contenido'];
?>

<lista-encabezada>
  <wc-texto id='productos-titulo' slot='titulo' data-tipo-fuente='titulo-l'>
    <span id='total-productos'>
      <?= count($productos) ?>
    </span>
    <?= 'producto' . (count($productos) === 1 ? '' : 's') ?>
  </wc-texto>
  <wc-texto id='productos-extra' slot='extra' data-tipo-fuente='titulo-s'>
    en <span id='total-categorias'><?= count($categoriasActivas) ?></span>
    <?= 'categoría' . (count($categoriasActivas) === 1 ? '' : 's') ?>
  </wc-texto>

  <?php foreach ($categoriasActivas as $categoriaActiva): ?>
    <wc-colapsable>
      <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-m'>
        <?= $categoriaActiva['nombreCategoria'] ?>
      </wc-texto>
      <lista-controlador id=<?= $categoriaActiva['idCategoriaProducto'] ?>>

        <?php $productosFiltrados = array_filter($productos, function($producto) use ($categoriaActiva) {
          return $producto['idCategoriaProducto'] === $categoriaActiva['idCategoriaProducto'];
        });

        $i = 0;
        ?>

        <?php foreach ($productosFiltrados as $producto): ?>
          <item-divisor <?= ++$i === count($productosFiltrados) ? 'data-no-divisor' : '' ?>>
            <lista-item>
              <wc-texto data-tipo-fuente='titulo-s'><?= $producto['nombreProducto'] ?></wc-texto>
              <input class='id-producto' type='hidden' value=<?= $producto['idProducto'] ?>>
            </lista-item>
          </item-divisor>
         <?php endforeach; ?>

      </lista-controlador>
    </wc-colapsable>
  <?php endforeach; ?>

</lista-encabezada>
