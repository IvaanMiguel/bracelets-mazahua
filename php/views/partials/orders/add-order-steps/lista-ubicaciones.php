<contenedor-flex flex-direction='column' gap='var(--espaciado-grande)'>
  <lista-desplegable>
    <select class='ubicaciones-cliente' name='ubicacion'>
      <option selected hidden value=''>Sin ubicaciones para mostrar.</option>
    </select>
  </lista-desplegable>
  <info-detalles class='info-ubicacion'>
    <contenedor-flex margin='auto' padding='var(--espaciado-chico)'>
     <wc-texto data-tipo-fuente='etiqueta-l'>Ninguna ubicación seleccionada.</wc-texto>
    </contenedor-flex>
  </info-detalles>
</contenedor-flex>
