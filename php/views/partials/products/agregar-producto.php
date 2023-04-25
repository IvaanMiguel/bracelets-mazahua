<form>
  <div class='formulario-contenedor'>
    <h1 class='titulo-grande'>Datos del producto</h1>
    <div class='campos'>
      <campo-texto>
        <span slot='etiqueta'>Nombre</span>
        <input slot='campo' type='text' name='nombre'>
      </campo-texto>
      <campo-texto>
        <span slot='etiqueta'>Categoría</span>
        <input slot='campo' type='text' name='categoria'>
      </campo-texto>
      <div class='campos-horizontal'>
        <campo-texto>
          <span slot='etiqueta'>Precio</span>
          <input slot='campo' type='text' name='precio'>
        </campo-texto>
        <campo-texto>
          <span slot='etiqueta'>Existencias iniciales</span>
          <input slot='campo' type='text' name='existenciasIniciales'>
        </campo-texto>
      </div>
    </div>
  </div>
  <boton-rellenado
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      type='button'
      data-variante='texto-icono'
      data-icono='save'
      data-etiqueta='Guardar producto'>
  </boton-rellenado>
</form>
