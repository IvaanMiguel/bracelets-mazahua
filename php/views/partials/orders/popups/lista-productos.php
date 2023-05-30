<?php
  require_once AUTOLOADER;

  use controllers\Producto;

  $vistaProducto = Producto::vistaProductoConstructor();
  $categoriasActivas = json_decode($vistaProducto->mostrarCategoriasActivas(), true)['contenido'];
  $productos = json_decode($vistaProducto->mostrarProductos(), true)['contenido'];
?>

<contenedor-flex class='lista-productos' gap='var(--espaciado-chico)'>
  <?php if (count($categoriasActivas) > 0): ?>
    <?php foreach ($categoriasActivas as $categoriaActiva): ?>
      <wc-colapsable data-minicabecera>
        <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-s'>
          <?= $categoriaActiva['nombreCategoria'] ?>
        </wc-texto>
        <lista-controlador id='<?= $categoriaActiva['idCategoriaProducto'] ?>'>
  
          <?php
            $productosFiltrados = array_filter($productos, function($producto) use ($categoriaActiva) {
              return $producto['idCategoriaProducto'] === $categoriaActiva['idCategoriaProducto'];
            });
    
            $i = 0;
          ?>
  
          <?php foreach ($productosFiltrados as $producto): ?>
            <?php // if ($producto['existencias'] <= 0) continue; ?>
            <item-divisor <?= ++$i === count($productosFiltrados) ? 'data-no-divisor' : '' ?>>
              <lista-item class='<?= $producto['existencias'] <= 0 ? 'no-existencias' : '' ?>' data-no-final>
                <item-detalles>
                  <input class='check' slot='inicio' type='checkbox'>
                  <wc-texto class='nombre'><?= $producto['nombreProducto'] ?></wc-texto>
                  <wc-texto>$<span class='precio'><?=$producto['precio'] ?></span> MXN</wc-texto>
                  <wc-texto>
                    <span class='existencias'><?=$producto['existencias'] ?></span>
                    existencia<?= $producto['existencias'] == 1 ? '' : 's' ?>
                  </wc-texto>
                </item-detalles>
                <input class='id-producto' type='hidden' value=<?= $producto['idProducto'] ?>>
              </lista-item>
            </item-divisor>
          <?php endforeach; ?>
  
        </lista-controlador>
      </wc-colapsable>
    <?php endforeach; ?>
  <?php else: ?>
    <contenedor-flex margin='0 auto' padding='var(--espaciado-chico)'>
      <wc-texto data-tipo-fuente='etiqueta-l'>Sin productos registrados.</wc-texto>
    </contenedor-flex>
  <?php endif; ?>
</contenedor-flex>
