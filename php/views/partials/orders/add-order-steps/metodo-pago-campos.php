<contenedor-flex flex-direction='row' gap='var(--espaciado-chico)'>
  <form class='tipos-pago'>
    <label>
      <input type='radio' name='tipoPago' value='Efectivo' checked>
      <wc-texto data-tipo-fuente='etiqueta-l'>Efectivo</wc-texto>
    </label>
    <label>
      <input type='radio' name='tipoPago' value='Depósito'>
      <wc-texto data-tipo-fuente='etiqueta-l'>Depósito</wc-texto>
    </label>
    <label>
      <input type='radio' name='tipoPago' value='Tarjeta'>
      <wc-texto data-tipo-fuente='etiqueta-l'>Tarjeta</wc-texto>
    </label>
  </form>
</contenedor-flex>
<wc-tabs class='pago-tabs' data-no-cabecera>
  <span></span>
  <contenedor-flex gap='var(--espaciado-chico)' margin='var(--espaciado-grande) 0 0'>
    <campo-texto>
      <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>CLABE de cuenta</wc-texto>
      <input type='text' name='clabeCuenta'>
    </campo-texto>
  </contenedor-flex>
  <contenedor-flex flex-direction='column' gap='var(--espaciado-grande)' margin='var(--espaciado-grande) 0 0'>
    <contenedor-flex gap='var(--espaciado-chico)'>
      <campo-texto>
        <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Número de tarjeta</wc-texto>
        <input type='text' name='numeroTarjeta'>
      </campo-texto>
    </contenedor-flex>
    <contenedor-flex gap='var(--espaciado-chico)'>
      <campo-texto>
        <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Nombre del titular</wc-texto>
        <input type='text' name='titular'>
      </campo-texto>
    </contenedor-flex>
  </contenedor-flex>
</wc-tabs>
