<ventana-emergente id='editar-productos-pedidos' data-cierre-explicito data-no-pie>
  <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
    Editando productos agregados
  </wc-texto>
  <boton-icono
      slot='cabecera-final'
      data-icono='close'
      data-color-texto='#ffffff'
      data-evento='verificarcierre'>
  </boton-icono>
  <wc-tabs class='tabs-productos-popup' data-no-cabecera>
    <contenedor-flex flex-direction='column' gap='var(--espaciado-grande)'>
      <boton-rellenado
          data-evento='buscarproductonuevo'
          data-color-fondo='var(--clr-fondo-hover)'
          data-color-texto='var(--clr-primario-10)'
          data-etiqueta='Buscar producto'
          data-icono='search'
          data-variante='texto-icono'>
      </boton-rellenado>
      <lista-controlador class='productos-comprados'></lista-controlador>
      <contenedor-flex flex-direction='row' gap='var(--espaciado-grande)' padding='3px 2px'>
        <boton-rellenado
            data-evento='actualizarproductospedidos'
            data-color-fondo='var(--clr-primario-40)'
            data-color-texto='#ffffff'
            data-etiqueta='Guardar cambios'
            data-variante='texto-icono'
            data-icono='save'>
        </boton-rellenado>
        <boton-delineado
            data-evento='verificarcierre'
            data-color-texto='var(--clr-primario-40)'
            data-color-fondo='#ffffff'
            data-etiqueta='Descartar cambios'
            data-variante='texto-icono'
            data-icono='close'>
        </boton-delineado>
      </contenedor-flex>
    </contenedor-flex>
    <contenedor-flex flex-direction='column' gap='var(--espaciado-grande)'>
      <boton-icono
          class='boton-regresar'
          data-icono='arrow_back'
          data-evento='regresar'
          data-color-texto='var(--clr-secundario-40)'>
      </boton-icono>
      <?php require DIR_PARCIALES . '/orders/popups/lista-productos.php' ?>
      <boton-elevado
          data-evento='seleccionarnuevosproductos'
          data-color-fondo='var(--clr-primario-40)'
          data-color-texto='#ffffff'
          data-etiqueta='Seleccionar producto(s)'
          data-variante='texto-icono'
          data-icono='done'>
      </boton-elevado>
    </contenedor-flex>
  </wc-tabs>
</ventana-emergente>

<ventana-emergente id='confirmar-remover-producto-pedido'>
  <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
    ¿Remover producto del pedido?
  </wc-texto>
  <wc-texto data-tipo-fuente='cuerpo-m'>
    El producto <strong class='nombre-producto'></strong> será eliminado del pedido, ¿deseas continuar?
  </wc-texto>
  <boton-rellenado
      slot='pie-final'
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-evento='removerproductopedido'
      data-etiqueta='Sí'>
  </boton-rellenado>
  <boton-delineado
      slot='pie-final'
      data-color-texto='var(--clr-primario-40)'
      data-color-fondo='#ffffff'
      data-evento='cancelar'
      data-etiqueta='No'>
  </boton-delineado>
</ventana-emergente>

<ventana-emergente id='descartar-editar-productos-pedidos'>
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
</ventana-emergente>
