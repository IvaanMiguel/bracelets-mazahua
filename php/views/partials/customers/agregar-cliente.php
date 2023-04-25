<form>
  <contenedor-flex class='formulario-contenedor' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-jumbo)'>
    <wc-texto data-tipo-fuente='titulo-l'>Datos personales</wc-texto>
    <contenedor-flex class='campos' flex-direction='column' gap='var(--espaciado-grande)'>
      <campo-texto>
        <span slot='etiqueta'>Nombre(s)</span>
        <input slot='campo' type='text' name='nombre'>
      </campo-texto>
      <contenedor-flex class='campos-horizontal' flex-direction='row' gap='var(--espaciado-grande)'>
        <campo-texto>
          <span slot='etiqueta'>Apellido paterno</span>
          <input slot='campo' type='text' name='apellidoPaterno'>
        </campo-texto>
        <campo-texto>
          <span slot='etiqueta'>Apellido materno</span>
          <input slot='campo' type='text' name='apellidoMaterno'>
        </campo-texto>
      </contenedor-flex>
      <campo-texto>
        <span slot='etiqueta'>Dirección de email</span>
        <input slot='campo' type='text' name='email'>
      </campo-texto>
      <contenedor-flex class='campos-horizontal' flex-direction='row' gap='var(--espaciado-grande)'>
        <campo-texto>
          <span slot='etiqueta'>Número de celular</span>
          <input slot='campo' type='text' name='celular'>
        </campo-texto>
        <campo-texto>
          <span slot='etiqueta'>Edad</span>
          <input slot='campo' type='text' name='edad'>
        </campo-texto>
      </contenedor-flex>
    </contenedor-flex>
  </contenedor-flex>
  <contenedor-flex class='formulario-contenedor' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-jumbo)'>
    <wc-texto data-tipo-fuente='titulo-l'>Ubicaciones</wc-texto>
    <contenedor-flex class='campos' flex-direction='column' gap='var(--espaciado-grande)'>
      <campo-texto>
        <span slot='etiqueta'>Calle principal</span>
        <input slot='campo' type='text' name='callePrincipal'>
      </campo-texto>
      <campo-texto>
        <span slot='etiqueta'>Calle(s) adyacente(s)</span>
        <input slot='campo' type='text' name='callesAdyacentes'>
      </campo-texto>
      <campo-texto>
        <span slot='etiqueta'>Colonia</span>
        <input slot='campo' type='text' name='colonia'>
      </campo-texto>
      <contenedor-flex class='campos-horizontal' flex-direction='row' gap='var(--espaciado-grande)'>
        <campo-texto>
          <span slot='etiqueta'>Número exterior</span>
          <input slot='campo' type='text' name='numeroExterior'>
        </campo-texto>
        <campo-texto>
          <span slot='etiqueta'>Número interior</span>
          <input slot='campo' type='text' name='numeroInterior'>
        </campo-texto>
        <campo-texto>
          <span slot='etiqueta'>Código postal</span>
          <input slot='campo' type='text' name='codigoPostal'>
        </campo-texto>
      </contenedor-flex>
      <wc-colapsable data-minicabecera>
        <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-s'>Ubicaciones añadidas</wc-texto>
        <md-icono slot='icono-cabecera' data-icono='expand_less' data-opsz='24'></md-icono>
        <lista-controlador>
          <item-divisor>
            <item-detalles>
              <span>Elemento 1</span>
              <span>Item 1</span>
              <boton-icono
                  slot='final'
                  type='button'
                  data-icono='delete'
                  data-color-texto='var(--clr-error-40)'
                  data-evento='confirmarremoverubicacion'>
              </boton-icono>
            </item-detalles>
          </item-divisor>
          <item-divisor>
            <item-detalles>
              <span>Elemento 1</span>
              <span>Item 1</span>
              <boton-icono
                  slot='final'
                  type='button'
                  data-icono='delete'
                  data-color-texto='var(--clr-error-40)'
                  data-evento='confirmarremoverubicacion'>
              </boton-icono>
            </item-detalles>
          </item-divisor>
          <item-divisor data-no-divisor>
            <item-detalles>
              <span>Elemento 1</span>
              <span>Item 1</span>
              <boton-icono
                  slot='final'
                  type='button'
                  data-icono='delete'
                  data-color-texto='var(--clr-error-40)'
                  data-evento='confirmarremoverubicacion'>
              </boton-icono>
            </item-detalles>
          </item-divisor>
        </lista-controlador>
      </wc-colapsable>
    </contenedor-flex>
    <boton-rellenado
        data-color-fondo='var(--clr-secundario-90)'
        data-color-texto='var(--clr-secundario-10)'
        type='button'
        data-variante='texto-icono'
        data-icono='add_location'
        data-etiqueta='Agregar ubicación'>
    </boton-rellenado>
  </contenedor-flex>
  <boton-rellenado
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      type='button'
      data-variante='texto-icono'
      data-icono='save'
      data-etiqueta='Guardar cliente'>
  </boton-rellenado>
</form>
