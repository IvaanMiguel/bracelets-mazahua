<contenedor-flex class='pedido-contenedor' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-grande)'>
  <contenedor-flex id='tipos-entrega' flex-direction='row' gap='var(--espaciado-chico)'>
    <label>
      <input type='radio' name='tipo-entrega' checked>
      <wc-texto data-tipo-fuente='etiqueta-l'>Pick up</wc-texto>
    </label>
    <label>
      <input type='radio' name='tipo-entrega'>
      <wc-texto data-tipo-fuente='etiqueta-l'>A domicilio</wc-texto>
    </label>
    <label>
      <input type='radio' name='tipo-entrega'>
      <wc-texto data-tipo-fuente='etiqueta-l'>Por aplicación</wc-texto>
    </label>
  </contenedor-flex>
  <wc-tabs id='entrega-tabs' data-no-cabecera>
    <form id='entrega-pick-up'>
      <?php require DIR_PARCIALES . '/orders/add-order-steps/entrega-campos.php' ?>
    </form>
    <contenedor-flex id='entrega-domicilio' flex-direction='column' gap='var(--espaciado-grande)'>
      <?php require DIR_PARCIALES . '/orders/add-order-steps/lista-ubicaciones.php' ?>
      <form>
        <?php require DIR_PARCIALES . '/orders/add-order-steps/entrega-campos.php' ?>
      </form>
    </contenedor-flex>
    <contenedor-flex id='entrega-aplicacion' flex-direction='column' gap='var(--espaciado-grande)'>
      <contenedor-flex flex-direction='column' gap='var(--espaciado-chico)'>
        <wc-texto data-tipo-fuente='etiqueta-l'>Aplicación de entrega</wc-texto>
        <contenedor-flex id='aplicaciones' flex-direction='row' gap='var(--espaciado-chico)'>
          <label>
            <input type='radio' name='aplicacion'>
            <wc-texto data-tipo-fuente='etiqueta-l'>Uber</wc-texto>
          </label>
          <label>
            <input type='radio' name='aplicacion'>
            <wc-texto data-tipo-fuente='etiqueta-l'>Didi</wc-texto>
          </label>
        </contenedor-flex>
      </contenedor-flex>
      <?php require DIR_PARCIALES . '/orders/add-order-steps/lista-ubicaciones.php' ?>
      <form>
        <?php require DIR_PARCIALES . '/orders/add-order-steps/entrega-campos.php' ?>
      </form>
    </contenedor-flex>
  </wc-tabs>
</contenedor-flex>
