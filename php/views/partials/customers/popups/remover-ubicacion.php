<ventana-emergente id='remover-ubicacion'>
  <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>Remover ubicación</wc-texto>
  <boton-icono slot='cabecera-final' data-icono='close' data-color-texto='#ffffff'></boton-icono>
  <wc-texto>
    La información de dicha ubicación ya no se guardará junto con el cliente si es removida, ¿deseas continuar?
  </wc-texto>
  <boton-rellenado
      slot='pie-final'
      data-evento='removerubicacion'
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-etiqueta='Sí'>
  </boton-rellenado>
  <boton-delineado
      slot='pie-final'
      data-evento='cerrarventana'
      data-color-texto='var(--clr-primario-40)'
      data-color-fondo='#ffffff',
      data-etiqueta='No'>
  </boton-delineado>
</ventana-emergente>
