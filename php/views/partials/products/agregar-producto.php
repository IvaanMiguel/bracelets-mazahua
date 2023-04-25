<form>
  <contenedor-flex class='formulario-contenedor' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-jumbo)'>
    <h1 class='titulo-grande'>Datos del producto</h1>
    <contenedor-flex class='campos' flex-direction='column' gap='var(--espaciado-grande)'>
      <campo-texto>
        <span slot='etiqueta'>Nombre</span>
        <input slot='campo' type='text' name='nombre'>
      </campo-texto>
      <campo-texto>
        <span slot='etiqueta'>Categoría</span>
        <input slot='campo' type='text' name='categoria'>
      </campo-texto>
      <contenedor-flex id='producto-campos' flex-direction='row' gap='var(--espaciado-grande)'>
        <campo-texto>
          <span slot='etiqueta'>Precio</span>
          <input slot='campo' type='text' name='precio'>
        </campo-texto>
        <campo-texto>
          <span slot='etiqueta'>Existencias iniciales</span>
          <input slot='campo' type='text' name='existenciasIniciales'>
        </campo-texto>
      </contenedor-flex>
    </contenedor-flex>
  </contenedor-flex>
  <boton-rellenado
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      type='button'
      data-variante='texto-icono'
      data-icono='save'
      data-etiqueta='Guardar producto'>
  </boton-rellenado>
</form>
