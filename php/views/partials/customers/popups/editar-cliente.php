<ventana-emergente id='editar-cliente' data-cierre-explicito>
  <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
    Editando cliente: <span class='nombre-cliente'>Cargando...</span>
  </wc-texto>
  <boton-icono
      slot='cabecera-final'
      data-icono='close'
      data-color-texto='#ffffff'
      data-evento='verificarcierre'>
  </boton-icono>
  <form>
    <contenedor-flex flex-direction='column' gap='var(--espaciado-grande)'>
      <contenedor-flex gap='var(--espaciado-chico)'>
        <campo-texto>
          <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
            Nombre
          </wc-texto>
          <input name='nombre' placeholder='Cargando...'>
        </campo-texto>
      </contenedor-flex>
      <contenedor-flex gap='var(--espaciado-chico)'>
        <campo-texto>
          <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
            Apellidos
          </wc-texto>
          <input name='apellidos'>
        </campo-texto>
      </contenedor-flex>
      <contenedor-flex class='cliente-campos' flex-direction='row' gap='var(--espaciado-grande)'>
        <contenedor-flex flex-direction='column' gap='var(--espaciado-chico)'>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
              Edad
            </wc-texto>
            <input name='edad'>
          </campo-texto>
        </contenedor-flex>
        <contenedor-flex flex-direction='column' gap='var(--espaciado-chico)'>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
              Número de celular
            </wc-texto>
            <input name='celular'>
          </campo-texto>
        </contenedor-flex>
      </contenedor-flex>
      <contenedor-flex gap='var(--espaciado-chico)'>
        <campo-texto>
          <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
            Email
          </wc-texto>
          <input name='email'>
        </campo-texto>
      </contenedor-flex>
    </contenedor-flex>
  </form>
  <boton-rellenado
      slot='pie-inicio'
      data-evento='actualizarcliente'
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

<ventana-emergente id='descartar-editar-cliente'>
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
