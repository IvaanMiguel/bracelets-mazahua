<contenedor-flex class='pedido-contenedor' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-grande)'>
  <boton-rellenado
      data-evento='buscarproducto'
      data-color-fondo='var(--clr-secundario-90)'
      data-color-texto='var(--clr-secundario-10)'
      data-variante='texto-icono'
      data-icono='search'
      data-etiqueta='Buscar producto'>
  </boton-rellenado>
  <info-detalles id='info-producto'></info-detalles>
  <contenedor-flex gap='var(--espaciado-chico)'>
    <campo-texto>
      <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Cantidad</wc-texto>
      <input type='text' name='cantidadProducto'>
    </campo-texto>
  </contenedor-flex>
  <boton-delineado
      data-color-texto='var(--clr-primario-40)'
      data-etiqueta='Añadir producto'
      data-icono='add'
      data-variante='texto-icono'>
  </boton-delineado>
  <wc-colapsable data-minicabecera>
    <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-s'>Productos añadidos</wc-texto>
    <lista-controlador></lista-controlador>
  </wc-colapsable>
  <item-detalles id='total'>
    <wc-texto data-tipo-fuente='etiqueta-m'>Total</wc-texto>
    <wc-texto data-tipo-fuente='cuerpo-l'>
      $<span id='cantidad'>0.00</span> MXN
    </wc-texto>
  </item-detalles>
</contenedor-flex>