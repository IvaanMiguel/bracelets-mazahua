<ventana-emergente id='eliminar-ubicacion'>
  <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
    ¿Eliminar ubicación?
  </wc-texto>
  <boton-icono
      slot='cabecera-final'
      data-icono='close'
      data-color-texto='#ffffff'
      data-evento='cancelar'>
  </boton-icono>
  <contenedor-flex id='contenedor-ventana' flex-direction='column' gap='var(--espaciado-grande)'>
    <wc-texto data-tipo-fuente='cuerpo-m'>
      La información de la siguiente ubicación perteneciente a <strong class='nombre-cliente'></strong> será eliminada permanentemente, ¿deseas continuar?
    </wc-texto>
    <info-detalles id='info-ubicacion-ventana'></info-detalles>
  </contenedor-flex>
  <boton-rellenado
      slot='pie-final'
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-evento='confirmareliminarubicacion'
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
