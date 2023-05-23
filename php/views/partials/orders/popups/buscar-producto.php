<?php
  require_once AUTOLOADER;

  use controllers\Producto;

  $vistaProducto = Producto::vistaProductoConstructor();
  $categoriasActivas = json_decode($vistaProducto->mostrarCategoriasActivas(), true)['contenido'];
  $productos = json_decode($vistaProducto->mostrarProductos(), true)['contenido'];
?>

<ventana-emergente id='buscar-producto' data-no-pie data-cierre-explicito>
  <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
    Seleccionando productos
  </wc-texto>
  <boton-icono
      slot='cabecera-final'
      data-icono='close'
      data-color-texto='#ffffff'
      data-evento='cerrar'>
  </boton-icono>
  <contenedor-flex flex-direction='column' gap='var(--espaciado-grande)'>
    <contenedor-flex id='productos-contenido' gap='var(--espaciado-chico)'>
      <?php if (count($categoriasActivas) > 0): ?>
        <?php foreach ($categoriasActivas as $categoriaActiva): ?>
          <wc-colapsable data-minicabecera>
            <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-s'>
              <?= $categoriaActiva['nombreCategoria'] ?>
            </wc-texto>
            <lista-controlador id='lista-productos'>
      
              <?php
                $productosFiltrados = array_filter($productos, function($producto) use ($categoriaActiva) {
                  return $producto['idCategoriaProducto'] === $categoriaActiva['idCategoriaProducto'];
                });
        
                $i = 0;
              ?>
      
              <?php foreach ($productosFiltrados as $producto): ?>
                <?php if ($producto['existencias'] <= 0) continue; ?>
                <item-divisor <?= ++$i === count($productosFiltrados) ? 'data-no-divisor' : '' ?>>
                  <lista-item data-no-final>
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
    <boton-elevado
        data-evento='seleccionarproductos'
        data-color-fondo='var(--clr-primario-40)'
        data-color-texto='#ffffff'
        data-etiqueta='Seleccionar producto(s)'
        data-variante='texto-icono'
        data-icono='done'>
    </boton-elevado>
  </contenedor-flex>
</ventana-emergente>

<ventana-emergente id='confirmar-remover-producto'>
  <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
    ¿Remover producto?
  </wc-texto>
  <wc-texto data-tipo-fuente='cuerpo-m'>
    El producto <strong><span class='cantidad'></span> × <span class='nombre'></span></strong> será removido del pedido, ¿deseas continuar?
  </wc-texto>
  <boton-rellenado
      slot='pie-final'
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-evento='confirmarremover'
      data-etiqueta='Sí'>
  </boton-rellenado>
  <boton-delineado
      slot='pie-final'
      data-color-texto='var(--clr-primario-40)'
      data-color-fondo='#ffffff'
      data-evento='cancelarremover'
      data-etiqueta='No'>
  </boton-delineado>
</ventana-emergente>
