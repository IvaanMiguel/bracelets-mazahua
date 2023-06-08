<contenedor-flex class='ancho-fijo' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-grande)'>
  <boton-rellenado
      data-evento='buscarproducto'
      data-color-fondo='var(--clr-fondo-hover)'
      data-color-texto='var(--clr-primario-40)'
      data-variante='texto-icono'
      data-icono='search'
      data-etiqueta='Buscar productos'>
  </boton-rellenado>
  <wc-colapsable data-minicabecera>
    <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-s'>Productos añadidos</wc-texto>
    <lista-controlador id='productos-agregados'></lista-controlador>
  </wc-colapsable>
  <contenedor-flex flex-direction='column'>
    <item-detalles>
      <wc-texto data-tipo-fuente='etiqueta-m'>Anticipo</wc-texto>
      <wc-texto data-tipo-fuente='cuerpo-l'>
        $<span id='anticipo'>0.00</span> MXN
      </wc-texto>
    </item-detalles>
    <item-detalles>
      <wc-texto data-tipo-fuente='etiqueta-m'>Total</wc-texto>
      <wc-texto data-tipo-fuente='cuerpo-l'>
        $<span id='total'>0.00</span> MXN
      </wc-texto>
    </item-detalles>
  </contenedor-flex>
</contenedor-flex>