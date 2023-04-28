<ventana-emergente id='cerrar-sesion'>
  <span slot='cabecera-inicio'>Cerrar sesión</span>
  <boton-icono slot='cabecera-final' data-icono='close' data-color-texto='#ffffff'></boton-icono>
  <span>¿Deseas salir y cerrar la sesión actual?</span>
  <boton-rellenado
      slot='pie-final'
      data-evento='cerrarsesion'
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-etiqueta='Sí'>
  </boton-rellenado>
  <boton-delineado
      slot='pie-final'
      data-evento='cerrarventana'
      data-color-texto='var(--clr-primario-40)'
      data-color-fondo="#ffffff"
      data-etiqueta='No'>
  </boton-delineado>
</ventana-emergente>

<script src='js/cerrar-sesion.js'></script>
