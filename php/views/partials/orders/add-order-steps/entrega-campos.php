<contenedor-flex flex-direction='column' gap='var(--espaciado-grande)'>
  <contenedor-flex gap='var(--espaciado-chico)'>
    <campo-texto>
      <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Nombre del destinatario</wc-texto>
      <input type='text' name='nombreDestinatario'>
    </campo-texto>
  </contenedor-flex>
  <contenedor-flex gap='var(--espaciado-chico)'>
    <campo-texto>
      <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Número de celular del destinatario</wc-texto>
      <input type='text' name='celularDestinatario'>
    </campo-texto>
  </contenedor-flex>
  <contenedor-flex class='campos-ubicacion' flex-direction='row' gap='var(--espaciado-grande)'>
    <contenedor-flex gap='var(--espaciado-chico)'>
      <campo-texto>
        <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Fecha de entrega</wc-texto>
        <input type='date' name='fechaEntrega'>
      </campo-texto>
    </contenedor-flex>
    <contenedor-flex gap='var(--espaciado-chico)'>
      <campo-texto>
        <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Hora de entrega</wc-texto>
        <input type='time' name='horaEntrega'>
      </campo-texto>
    </contenedor-flex>
  </contenedor-flex>
</contenedor-flex>
