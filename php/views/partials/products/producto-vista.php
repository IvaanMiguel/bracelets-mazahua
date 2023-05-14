<contenedor-flex flex-direction='column' gap='var(--espaciado-grande)' margin='0 0 var(--espaciado-grande)'>
  <contenedor-flex class='contenedor-borde' gap='var(--espaciado-grande)' padding='var(--espaciado-jumbo)'>
    <contenedor-flex flex-direction='row' align-items='center' gap='var(--espaciado-chico)'>
      <boton-icono
          data-icono='arrow_back'
          data-evento='regresarproductos'
          data-color-texto='var(--clr-secundario-40)'>
      </boton-icono>
      <wc-texto data-tipo-fuente='titulo-l'>Datos del producto</wc-texto>
    </contenedor-flex>
    <info-detalles id='informacion-producto'></info-detalles>
    <input id='id-categoria' type='hidden'>
    <input id='id-producto' type='hidden'>
  </contenedor-flex>
  <contenedor-flex flex-direction='row' gap='var(--espaciado-grande)' margin='0 0 0 1px'>
    <boton-rellenado
        data-evento='editarproducto'
        data-color-fondo='var(--clr-primario-40)'
        data-color-texto='#ffffff'
        data-variante='texto-icono'
        data-etiqueta='Editar datos del producto'
        data-icono='edit'>
    </boton-rellenado>
    <boton-delineado
        data-evento='eliminarproducto'
        data-color-texto='var(--clr-error-40)'
        data-variante='texto-icono'
        data-etiqueta='Eliminar producto'
        data-icono='delete_forever'>
    </boton-delineado>
  </contenedor-flex>
</contenedor-flex>
