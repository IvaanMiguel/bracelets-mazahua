<contenedor-flex class='pedido-contenedor' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-grande)'>
  <boton-rellenado
      data-evento='buscarcliente'
      data-color-fondo='var(--clr-secundario-90)'
      data-color-texto='var(--clr-secundario-10)'
      data-etiqueta='Buscar cliente'
      data-icono='search'
      data-variante='texto-icono'>
  </boton-rellenado>
  <info-detalles id='info-cliente'>
    <contenedor-flex margin='auto' padding='var(--espaciado-chico)'>
      <wc-texto data-tipo-fuente='etiqueta-l'>Ningún cliente selccionado</wc-texto>
    </contenedor-flex>
  </info-detalles>
  <input id='id-cliente' type='hidden'>
</contenedor-flex>
