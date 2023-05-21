<contenedor-flex class='pedido-contenedor' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-grande)'>
  <contenedor-flex flex-direction='row' gap='var(--espaciado-chico)'>
    <form id='tipos-entrega'>
      <label>
        <input type='radio' name='tipoEntrega' value='Pick up' checked>
        <wc-texto data-tipo-fuente='etiqueta-l'>Pick up</wc-texto>
      </label>
      <label>
        <input type='radio' name='tipoEntrega' value='Domicilio'>
        <wc-texto data-tipo-fuente='etiqueta-l'>A domicilio</wc-texto>
      </label>
      <label>
        <input type='radio' name='tipoEntrega' value='Aplicación'>
        <wc-texto data-tipo-fuente='etiqueta-l'>Por aplicación</wc-texto>
      </label>
    </form>
  </contenedor-flex>
  <wc-tabs id='entrega-tabs' data-no-cabecera>
    <form id='entrega-pick-up'>
      <?php require DIR_PARCIALES . '/orders/add-order-steps/entrega-campos.php' ?>
    </form>
    <form id='entrega-domicilio'>
      <contenedor-flex flex-direction='column' gap='var(--espaciado-grande)'>
        <?php require DIR_PARCIALES . '/orders/add-order-steps/lista-ubicaciones.php' ?>
        <?php require DIR_PARCIALES . '/orders/add-order-steps/entrega-campos.php' ?>
      </contenedor-flex>
    </form>
    <contenedor-flex flex-direction='column' gap='var(--espaciado-grande)'>
      <form id='entrega-aplicacion'>
        <?php require DIR_PARCIALES . '/orders/add-order-steps/lista-ubicaciones.php' ?>
        <contenedor-flex flex-direction='column' gap='var(--espaciado-chico)'>
          <wc-texto data-tipo-fuente='etiqueta-l'>Aplicación de entrega</wc-texto>
          <contenedor-flex flex-direction='row' gap='var(--espaciado-chico)'>
            <label>
              <input type='radio' name='aplicacion' value='Uber'>
              <wc-texto data-tipo-fuente='etiqueta-l'>Uber</wc-texto>
            </label>
            <label>
              <input type='radio' name='aplicacion' value='Didi'>
              <wc-texto data-tipo-fuente='etiqueta-l'>Didi</wc-texto>
            </label>
          </contenedor-flex>
        </contenedor-flex>
        <?php require DIR_PARCIALES . '/orders/add-order-steps/entrega-campos.php' ?>
      </form>
    </contenedor-flex>
  </wc-tabs>
</contenedor-flex>
