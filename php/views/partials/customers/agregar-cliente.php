<form>
  <contenedor-flex class='formulario-contenedor' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-jumbo)'>
    <wc-texto data-tipo-fuente='titulo-l'>Datos personales</wc-texto>
    <contenedor-flex id='campos-datos-personales' class='campos' flex-direction='column' gap='var(--espaciado-grande)'>
      <contenedor-flex gap='var(--espaciado-chico)'>
        <campo-texto>
          <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Nombre(s)</wc-texto>
          <input type='text' name='nombre'>
        </campo-texto>
      </contenedor-flex>
      <contenedor-flex gap='var(--espaciado-chico)'>
        <campo-texto>
          <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Apellido(s)</wc-texto>
          <input type='text' name='apellidos'>
        </campo-texto>
      </contenedor-flex>
      <contenedor-flex gap='var(--espaciado-chico)'>
        <campo-texto>
          <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Dirección de email</wc-texto>
          <input type='text' name='email'>
        </campo-texto>
      </contenedor-flex>
      <contenedor-flex class='campos-horizontal' flex-direction='row' gap='var(--espaciado-grande)'>
        <contenedor-flex flex-direction='column' gap='var(--espaciado-chico)'>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Número de celular</wc-texto>
            <input type='text' name='celular'>
          </campo-texto>
        </contenedor-flex>
        <contenedor-flex flex-direction='column' gap='var(--espaciado-chico)'>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Edad</wc-texto>
            <input type='text' name='edad'>
          </campo-texto>
        </contenedor-flex>
      </contenedor-flex>
    </contenedor-flex>
  </contenedor-flex>
  <contenedor-flex class='formulario-contenedor' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-jumbo)'>
    <wc-texto data-tipo-fuente='titulo-l'>Ubicaciones</wc-texto>
    <contenedor-flex class='campos' flex-direction='column' gap='var(--espaciado-grande)'>
      <contenedor-flex id='campos-ubicaciones' gap='var(--espaciado-grande)'>
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
        <contenedor-flex id='multicampos' gap='var(--espaciado-chico)'>
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
      <wc-colapsable data-minicabecera>
        <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-s'>Ubicaciones añadidas</wc-texto>
        <lista-controlador id='lista-ubicaciones'>
        </lista-controlador>
      </wc-colapsable>
    </contenedor-flex>
    <boton-rellenado
        data-color-fondo='var(--clr-secundario-90)'
        data-color-texto='var(--clr-secundario-10)'
        data-evento='agregarubicacion'
        type='button'
        data-variante='texto-icono'
        data-icono='add_location'
        data-etiqueta='Agregar ubicación'>
    </boton-rellenado>
  </contenedor-flex>
  <boton-rellenado
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-evento='guardarcliente'
      type='button'
      data-variante='texto-icono'
      data-icono='save'
      data-etiqueta='Guardar cliente'>
  </boton-rellenado>
</form>
