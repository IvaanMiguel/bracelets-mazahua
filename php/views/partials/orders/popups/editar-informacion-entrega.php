<ventana-emergente id='editar-informacion-entrega' data-cierre-explicito>
  <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
    Editando información de entrega
  </wc-texto>
  <boton-icono
      slot='cabecera-final'
      data-icono='close'
      data-color-texto='#ffffff'
      data-evento='cerrar'>
  </boton-icono>
  <contenedor-flex id='popup-campos' flex-direction='column'>
    <contenedor-flex flex-direction='row' gap='var(--espaciado-chico)'>
      <form id='tipos-entrega-popup'>
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
    <contenedor-colapsable id='contenedor-ubicaciones' data-reducir>
      <?php require DIR_PARCIALES . '/orders/add-order-steps/lista-ubicaciones.php' ?>
    </contenedor-colapsable>
    <contenedor-colapsable id='contenedor-aplicaciones' data-reducir>
      <contenedor-flex flex-direction='column' gap='var(--espaciado-chico)'>
        <wc-texto data-tipo-fuente='etiqueta-l'>Aplicación de entrega</wc-texto>
        <contenedor-flex flex-direction='row' gap='var(--espaciado-chico)'>
          <label>
            <input type='radio' name='aplicacion' value='Uber' checked>
            <wc-texto data-tipo-fuente='etiqueta-l'>Uber</wc-texto>
          </label>
          <label>
            <input type='radio' name='aplicacion' value='Didi'>
            <wc-texto data-tipo-fuente='etiqueta-l'>Didi</wc-texto>
          </label>
        </contenedor-flex>
      </contenedor-flex>
    </contenedor-colapsable>
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
          <input type='time' name='horaEntrega' max='23:59'>
        </campo-texto>
      </contenedor-flex>
    </contenedor-flex>
  </contenedor-flex>
  <boton-rellenado
      slot='pie-inicio'
      data-evento='actualizardatosentrega'
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-etiqueta='Guardar cambios'
      data-variante='texto-icono'
      data-icono='save'>
  </boton-rellenado>
  <boton-delineado
      slot='pie-inicio'
      data-evento='cerrar'
      data-color-texto='var(--clr-primario-40)'
      data-color-fondo='#ffffff'
      data-etiqueta='Descartar cambios'
      data-variante='texto-icono'
      data-icono='close'>
  </boton-delineado>
</ventana-emergente>

<!-- <ventana-emergente id='descartar-editar-informacion-entrega'>
  <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
    ¿Descartar cambios?
  </wc-texto>
  <wc-texto data-tipo-fuente='cuerpo-m'>
    ¿Descartar los cambios realizados sin guardar?
  </wc-texto>
  <boton-rellenado
      slot='pie-final'
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-evento='cerrarventanas'
      data-etiqueta='Sí'>
  </boton-rellenado>
  <boton-delineado
      slot='pie-final'
      data-color-texto='var(--clr-primario-40)'
      data-color-fondo='#ffffff'
      data-evento='cancelarcierre'
      data-etiqueta='No'>
  </boton-delineado>
</ventana-emergente> -->
