<form>
  <contenedor-flex id='formulario-producto' class='contenedor-borde' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-jumbo)'>
    <wc-texto data-tipo-fuente='titulo-l'>Datos del producto</wc-texto>
    <contenedor-flex class='campos' flex-direction='column' gap='var(--espaciado-grande)'>
      <contenedor-flex gap='var(--espaciado-chico)'>
        <campo-texto>
          <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
            Nombre
          </wc-texto>
          <input name='nombre'>
        </campo-texto>
      </contenedor-flex>
      <contenedor-flex gap='var(--espaciado-chico)'>
        <?php require 'lista-categorias.php' ?>
      </contenedor-flex>
      <contenedor-flex class='producto-campos' flex-direction='row' gap='var(--espaciado-grande)'>
        <contenedor-flex flex-direction='column' gap='var(--espaciado-chico)'>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
              Precio
            </wc-texto>
            <input name='precio'>
          </campo-texto>
        </contenedor-flex>
        <contenedor-flex flex-direction='column' gap='var(--espaciado-chico)'>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
              Existencias iniciales
            </wc-texto>
            <input name='existenciasIniciales'>
          </campo-texto>
        </contenedor-flex>
      </contenedor-flex>
    </contenedor-flex>
  </contenedor-flex>
  <boton-rellenado
      type='button'
      data-evento='agregarproducto'
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-variante='texto-icono'
      data-icono='save'
      data-etiqueta='Guardar producto'>
  </boton-rellenado>
</form>
