<contenedor-flex class='ancho-fijo' flex-direction='column' padding='var(--espaciado-grande)'>
  <?php require DIR_PARCIALES . '/orders/add-order-steps/metodo-pago-campos.php' ?>
  <!-- <contenedor-flex flex-direction='row' gap='var(--espaciado-chico)'>
    <form id='tipos-pago'>
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
  <wc-tabs id='pago-tabs' data-no-cabecera>
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
      </contenedor-flex> -->
      <!-- <contenedor-flex id='tarjeta-campos' flex-direction='row' gap='var(--espaciado-grande)'>
        <contenedor-flex gap='var(--espaciado-chico)'>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Fecha de vencimiento</wc-texto>
            <input type='text' name='vencimiento'>
          </campo-texto>
        </contenedor-flex>
        <contenedor-flex gap='var(--espaciado-chico)'>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>CVC</wc-texto>
            <input type='text' name='cvc'>
          </campo-texto>
        </contenedor-flex>
      </contenedor-flex> -->
      <!-- <contenedor-flex gap='var(--espaciado-chico)'>
        <campo-texto>
          <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Nombre del titular</wc-texto>
          <input type='text' name='titular'>
        </campo-texto>
      </contenedor-flex>
    </contenedor-flex>
  </wc-tabs> -->
</contenedor-flex>
