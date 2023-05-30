<ventana-emergente id='editar-informacion-pago' data-cierre-explicito>
  <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
    Editando información de pago
  </wc-texto>
  <boton-icono
      slot='cabecera-final'
      data-icono='close'
      data-color-texto='#ffffff'
      data-evento='verificarcierre'>
  </boton-icono>
  <contenedor-flex flex-direction='column' gap='var(--espaciado-grande)'>
    <?php require DIR_PARCIALES . '/orders/add-order-steps/metodo-pago-campos.php' ?> 
  </contenedor-flex>
  <boton-rellenado
      slot='pie-inicio'
      data-evento='actualizarinformacionpago'
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-etiqueta='Guardar cambios'
      data-variante='texto-icono'
      data-icono='save'>
  </boton-rellenado>
  <boton-delineado
      slot='pie-inicio'
      data-evento='verificarcierre'
      data-color-texto='var(--clr-primario-40)'
      data-color-fondo='#ffffff'
      data-etiqueta='Descartar cambios'
      data-variante='texto-icono'
      data-icono='close'>
  </boton-delineado>
</ventana-emergente>

<ventana-emergente id='descartar-editar-informacion-pago'>
  <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
    ¿Descartar cambios?
  </wc-texto>
  <wc-texto data-tipo-fuente='cuerpo-m'>
    ¿Descartar los cambios realizados sin guardar?
  </wc-texto>
  <boton-rellenado
      slot='pie-final'
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-evento='cerrarventanas'
      data-etiqueta='Sí'>
  </boton-rellenado>
  <boton-delineado
      slot='pie-final'
      data-color-texto='var(--clr-primario-40)'
      data-color-fondo='#ffffff'
      data-evento='cancelarcierre'
      data-etiqueta='No'>
  </boton-delineado>
</ventana-emergente>