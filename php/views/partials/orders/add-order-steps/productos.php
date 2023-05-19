<contenedor-flex class='pedido-contenedor' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-grande)'>
  <boton-rellenado
      data-evento='buscarproducto'
      data-color-fondo='var(--clr-secundario-90)'
      data-color-texto='var(--clr-secundario-10)'
      data-variante='texto-icono'
      data-icono='search'
      data-etiqueta='Buscar productos'>
  </boton-rellenado>
  <wc-colapsable data-minicabecera>
    <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-s'>Productos añadidos</wc-texto>
    <lista-controlador id='productos-agregados'></lista-controlador>
  </wc-colapsable>
  <item-detalles>
    <wc-texto data-tipo-fuente='etiqueta-m'>Total</wc-texto>
    <wc-texto data-tipo-fuente='cuerpo-l'>
      $<span id='total'>0.00</span> MXN
    </wc-texto>
  </item-detalles>
</contenedor-flex>