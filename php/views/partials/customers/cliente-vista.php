<contenedor-flex flex-direction='column' gap='var(--espaciado-grande)' margin='0 0 var(--espaciado-grande)'>
  <contenedor-flex class='contenedor-borde' gap='var(--espaciado-grande)' padding='var(--espaciado-jumbo)'>
    <contenedor-flex flex-direction='row' align-items='center' gap='var(--espaciado-chico)'>
      <boton-icono
          data-icono='arrow_back'
          data-evento='regresarclientes'
          data-color-texto='var(--clr-secundario-40)'>
      </boton-icono>
      <wc-texto data-tipo-fuente='titulo-l'>Datos personales</wc-texto>
    </contenedor-flex>
    <info-detalles id='informacion-cliente'></info-detalles>
    <input id='id-cliente' type='hidden'>
    <boton-rellenado
        data-evento='editardatospersonales'
        data-color-fondo='var(--clr-secundario-90)'
        data-color-texto='var(--clr-secundario-10)'
        data-variante='texto-icono'
        data-etiqueta='Editar datos personales'
        data-icono='edit'>
    </boton-rellenado>
  </contenedor-flex>
  <contenedor-flex class='contenedor-borde' gap='var(--espaciado-grande)' padding='var(--espaciado-jumbo)'>
    <wc-texto data-tipo-fuente='titulo-l'>Ubicaciones</wc-texto>
    <lista-desplegable>
      <select id='ubicaciones-cliente'>
        <option selected hidden value=''>Cargando ubicaciones...</option>
      </select>
    </lista-desplegable>
    <info-detalles id='informacion-ubicacion'></info-detalles>
    <contenedor-flex flex-direction='row' gap='var(--espaciado-grande)'>
      <boton-rellenado
          data-evento='agregarnuevaubicacion'
          data-color-fondo='var(--clr-secundario-90)'
          data-color-texto='var(--clr-primario-10)'
          data-variante='texto-icono'
          data-etiqueta='Agregar ubicación'
          data-icono='add_location'>
      </boton-rellenado>
      <boton-delineado
          data-evento='editarubicacion'
          data-color-texto='var(--clr-primario-40)'
          data-variante='texto-icono'
          data-etiqueta='Editar ubicación'
          data-icono='edit'>
      </boton-delineado>
      <boton-texto
          data-evento='eliminarubicacion'
          data-color-texto='var(--clr-error-40)'
          data-variante='texto-icono'
          data-etiqueta='Eliminar ubicación'
          data-icono='delete_forever'>
      </boton-texto>
    </contenedor-flex>
  </contenedor-flex>
  <boton-delineado
      data-evento='eliminarcliente'
      data-color-texto='var(--clr-error-40)'
      data-variante='texto-icono'
      data-etiqueta='Eliminar cliente'
      data-icono='delete_forever'>
  </boton-delineado>
</contenedor-flex>
