<ventana-emergente id='agregar-ubicacion' data-cierre-explicito>
  <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
    Nueva ubicación
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
          <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Calle principal</wc-texto>
          <input type='text' name='callePrincipal'>
        </campo-texto>
      </contenedor-flex>
      <contenedor-flex gap='var(--espaciado-chico)'>
        <campo-texto>
          <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Calle(s) adyacente(s)</wc-texto>
          <input type='text' name='callesAdyacentes'>
        </campo-texto>
      </contenedor-flex>
      <contenedor-flex gap='var(--espaciado-chico)'>
        <campo-texto>
          <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Colonia</wc-texto>
          <input type='text' name='colonia'>
        </campo-texto>
      </contenedor-flex>
      <contenedor-flex class='multicampos' gap='var(--espaciado-chico)'>
        <contenedor-flex class='campos-horizontal' flex-direction='row' gap='var(--espaciado-grande)'>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Número exterior</wc-texto>
            <input type='text' name='numeroExterior'>
          </campo-texto>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Número interior</wc-texto>
            <input type='text' name='numeroInterior'>
          </campo-texto>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Código postal</wc-texto>
            <input type='text' name='cp'>
          </campo-texto>
        </contenedor-flex>
      </contenedor-flex>
    </contenedor-flex>
  </form>
  <boton-rellenado
      slot='pie-inicio'
      data-evento='guardarubicacion'
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-etiqueta='Guardar ubicación'
      data-variante='texto-icono'
      data-icono='save'>
  </boton-rellenado>
  <boton-delineado
      slot='pie-inicio'
      data-evento='verificarcierre'
      data-color-texto='var(--clr-primario-40)'
      data-color-fondo='#ffffff'
      data-etiqueta='Cancelar'
      data-variante='texto-icono'
      data-icono='close'>
  </boton-delineado>
</ventana-emergente>

<ventana-emergente id='descartar-agregar-ubicacion'>
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
      data-evento='confirmardescarte'
      data-etiqueta='Sí'>
  </boton-rellenado>
  <boton-delineado
      slot='pie-final'
      data-color-texto='var(--clr-primario-40)'
      data-color-fondo='#ffffff'
      data-evento='cancelardescarte'
      data-etiqueta='No'>
  </boton-delineado>
</ventana-emergente>
