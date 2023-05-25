<ventana-emergente id='completar-pedido'>
  <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
    ¿Completar pedido?
  </wc-texto>
  <boton-icono
      slot='cabecera-final'
      data-icono='close'
      data-color-texto='#ffffff'
      data-evento='cancelar'>
  </boton-icono>
  <wc-texto data-tipo-fuente='cuerpo-m'>
    El pedido actual será marcado como completado, una vez hecho esto su información no podrá ser eliminada ni modificada de ninguna manera, ¿deseas continuar?
  </wc-texto>
  <boton-rellenado
      slot='pie-final'
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-evento='confirmarcompletarpedido'
      data-etiqueta='Sí'>
  </boton-rellenado>
  <boton-delineado
      slot='pie-final'
      data-color-texto='var(--clr-primario-40)'
      data-color-fondo='#ffffff'
      data-evento='cancelar'
      data-etiqueta='No'>
  </boton-delineado>
</ventana-emergente>
