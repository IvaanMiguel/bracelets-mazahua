<wc-colapsable slot='lista'>
  <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-m'>Cliente</wc-texto>
  <?php require_once DIR_PARCIALES . '/orders/add-order-steps/cliente.php' ?>
</wc-colapsable>
<wc-colapsable slot='lista'>
  <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-m'>Productos</wc-texto>
  <?php require_once DIR_PARCIALES . '/orders/add-order-steps/productos.php' ?>
</wc-colapsable>
<wc-colapsable slot='lista'>
  <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-m'>Entrega</wc-texto>
  <?php require_once DIR_PARCIALES . '/orders/add-order-steps/entrega.php' ?>
</wc-colapsable>
<wc-colapsable slot='lista'>
  <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-m'>Método de pago</wc-texto>
  <?php require_once DIR_PARCIALES . '/orders/add-order-steps/metodo-pago.php' ?>
</wc-colapsable>
<boton-rellenado
    data-evento='hacerpedido'
    data-color-fondo='var(--clr-secundario-90)'
    data-color-texto='var(--clr-primario-10)'
    data-etiqueta='Hacer pedido'
    data-variante='texto-icono'
    data-icono='task'>
</boton-rellenado>
