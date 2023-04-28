<ventana-emergente id='cerrar-sesion'>
  <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>Cerrar sesión</wc-texto>
  <boton-icono slot='cabecera-final' data-icono='close' data-color-texto='#ffffff'></boton-icono>
  <wc-texto data-tipo-fuente='cuerpo-m'>
    ¿Deseas salir y cerrar la sesión actual?
  </wc-texto>
  <boton-rellenado
      slot='pie-final'
      data-evento='cerrarsesion'
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-etiqueta='Sí'>
  </boton-rellenado>
  <boton-delineado
      slot='pie-final'
      data-color-texto='var(--clr-primario-40)'
      data-color-fondo="#ffffff"
      data-etiqueta='No'>
  </boton-delineado>
</ventana-emergente>

<script src='js/cerrar-sesion.js'></script>
