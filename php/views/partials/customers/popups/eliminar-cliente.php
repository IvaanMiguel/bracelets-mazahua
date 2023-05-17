<ventana-emergente id='eliminar-cliente'>
  <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
    ¿Eliminar la información de <span class='nombre-cliente'></span>?
  </wc-texto>
  <boton-icono
      slot='cabecera-final'
      data-icono='close'
      data-color-texto='#ffffff'
      data-evento='cancelar'>
  </boton-icono>
  <wc-texto data-tipo-fuente='cuerpo-m'>
    La información de <strong class='nombre-cliente'></strong> será eliminada de forma permanente, ¿deseas continuar?
  </wc-texto>
  <boton-rellenado
      slot='pie-final'
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-evento='confirmareliminarcliente'
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
