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
    <?php require DIR_PARCIALES . '/orders/popups/lista-productos.php' ?>
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
