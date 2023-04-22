<ventana-emergente data-id='cerrar-sesion'>
  <div class='contenido'>
    <span class='titulo-grande'>Cerrar sesión</span>
    <span class='cuerpo-mediano'>¿Deseas salir y cerrar la sesión actual?</span>
    <div class='botones-contenedor botones-contenedor--flex-end'>
      <boton-rellenado
          data-evento='cerrarsesion'
          data-color-fondo='var(--clr-primario-40)'
          data-color-texto='#ffffff'>
        <span slot='etiqueta'>Sí</span>
      </boton-rellenado>
      <boton-delineado
          data-evento='cerrarventana'
          data-color-texto='var(--clr-primario-40)'
          data-color-fondo="#ffffff">
        <span slot='etiqueta'>No</span>
      </boton-delineado>
    </div>
  </div>
</ventana-emergente>

<script src='js/cerrar-sesion.js'></script>
