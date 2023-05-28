<contenedor-flex flex-direction='column' gap='var(--espaciado-grande)' margin='0 0 var(--espaciado-grande)'>
  <!-- Contenedor datos del cliente -->
  <contenedor-flex class='contenedor-borde' gap='var(--espaciado-grande)' padding='var(--espaciado-jumbo)'>
    <contenedor-flex flex-direction='row' align-items='center' gap='var(--espaciado-chico)'>
      <boton-icono
          data-icono='arrow_back'
          data-evento='regresarpedidos'
          data-color-texto='var(--clr-secundario-40)'>
      </boton-icono>
      <wc-texto data-tipo-fuente='titulo-l'>Datos del cliente</wc-texto>
    </contenedor-flex>
    <contenedor-flex class='ancho-fijo'>
      <item-detalles>
        <wc-texto data-tipo-fuente='etiqueta-m'>
          Pedido por
        </wc-texto>
        <wc-texto id='pedido-cliente' data-tipo-fuente='cuerpo-l'></wc-texto>
      </item-detalles>
      <item-detalles>
        <wc-texto data-tipo-fuente='etiqueta-m'>
          Nombre de destinatario
        </wc-texto>
        <wc-texto id='pedido-nombre-destinatario' data-tipo-fuente='cuerpo-l'></wc-texto>
      </item-detalles>
      <item-detalles>
        <wc-texto data-tipo-fuente='etiqueta-m'>
          Celular de destinatario
        </wc-texto>
        <wc-texto id='pedido-celular-destinatario' data-tipo-fuente='cuerpo-l'></wc-texto>
      </item-detalles>
    </contenedor-flex>
    <input id='id-pedido' type='hidden'>
    <boton-rellenado
        class='pedido-edicion'
        data-evento='editardatosdestinatario'
        data-color-fondo='var(--clr-secundario-90)'
        data-color-texto='var(--clr-secundario-10)'
        data-variante='texto-icono'
        data-etiqueta='Editar datos de destinatario'
        data-icono='edit'>
    </boton-rellenado>
  </contenedor-flex>
  <!-- Contenedor productos pedidos -->
  <contenedor-flex class='contenedor-borde' gap='var(--espaciado-grande)' padding='var(--espaciado-jumbo)'>
    <wc-texto data-tipo-fuente='titulo-l'>Productos pedidos</wc-texto>
    <wc-colapsable class='ancho-fijo' data-minicabecera>
      <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-s'>Productos</wc-texto>
      <lista-controlador id='lista-productos-pedidos'></lista-controlador>
    </wc-colapsable>
    <contenedor-flex class='ancho-fijo'>
      <item-detalles>
        <wc-texto data-tipo-fuente='etiqueta-m'>
          Cantidad total de productos
        </wc-texto>
        <wc-texto id='total-productos' data-tipo-fuente='cuerpo-l'></wc-texto>
      </item-detalles>
      <item-detalles>
        <wc-texto data-tipo-fuente='etiqueta-m'>
          Anticipo requerido
        </wc-texto>
        <wc-texto data-tipo-fuente='cuerpo-l'>
          $<span id='anticipo-requerido'></span> MXN
        </wc-texto>
      </item-detalles>
      <item-detalles>
        <wc-texto data-tipo-fuente='etiqueta-m'>
          Costo total
        </wc-texto>
        <wc-texto data-tipo-fuente='cuerpo-l'>
          $<span id='costo-total'></span> MXN
        </wc-texto>
      </item-detalles>
    </contenedor-flex>
    <boton-rellenado
        class='pedido-edicion'
        data-evento='editarproductospedidos'
        data-color-fondo='var(--clr-secundario-90)'
        data-color-texto='var(--clr-secundario-10)'
        data-variante='texto-icono'
        data-etiqueta='Editar productos pedidos'
        data-icono='edit'>
    </boton-rellenado>
  </contenedor-flex>
  <!-- Contenedor datos entrega -->
  <contenedor-flex class='contenedor-borde' gap='var(--espaciado-grande)' padding='var(--espaciado-jumbo)'>
    <wc-texto data-tipo-fuente='titulo-l'>Datos de entrega</wc-texto>
    <contenedor-flex class='ancho-fijo'>
      <item-detalles>
        <wc-texto data-tipo-fuente='etiqueta-m'>
          Tipo de entrega
        </wc-texto>
        <wc-texto id='tipo-entrega' data-tipo-fuente='cuerpo-l'></wc-texto>
      </item-detalles>
      <item-detalles id='direccion-opcional' class='flex-start'>
        <wc-texto data-tipo-fuente='etiqueta-m'>
          Dirección de entrega
        </wc-texto>
        <contenedor-flex>
          <wc-texto data-tipo-fuente='cuerpo-l'>
            <span id='entrega-calle-principal' title='Calle principal'></span>
            <span id='entrega-numero-exterior' title='Número exterior'></span>
          </wc-texto>
          <wc-texto id='entrega-numero-interior' data-tipo-fuente='cuerpo-l' title='Número interior'></wc-texto>
          <wc-texto id='entrega-calles-adyacentes' data-tipo-fuente='cuerpo-l' title='Calles adyacentes'></wc-texto>
          <wc-texto id='entrega-colonia' data-tipo-fuente='cuerpo-l' title='Colonia'></wc-texto>
          <wc-texto id='codigo-postal' data-tipo-fuente='cuerpo-l' title='Código postal'></wc-texto>
        </contenedor-flex>
      </item-detalles>
      <item-detalles>
        <wc-texto data-tipo-fuente='etiqueta-m'>
          Fecha de entrega
        </wc-texto>
        <wc-texto id='fecha-entrega' data-tipo-fuente='cuerpo-l'></wc-texto>
      </item-detalles>
      <item-detalles>
        <wc-texto data-tipo-fuente='etiqueta-m'>
          Hora de entrega
        </wc-texto>
        <wc-texto id='hora-entrega' data-tipo-fuente='cuerpo-l'></wc-texto>
      </item-detalles>
    </contenedor-flex>
    <boton-rellenado
        class='pedido-edicion'
        data-evento='editardatosentrega'
        data-color-fondo='var(--clr-secundario-90)'
        data-color-texto='var(--clr-secundario-10)'
        data-variante='texto-icono'
        data-etiqueta='Editar datos de entrega'
        data-icono='edit'>
    </boton-rellenado>
  </contenedor-flex>
  <!-- Contenedor información pago -->
  <contenedor-flex class='contenedor-borde' gap='var(--espaciado-grande)' padding='var(--espaciado-jumbo)'>
    <wc-texto data-tipo-fuente='titulo-l'>Información de pago</wc-texto>
    <contenedor-flex class='ancho-fijo'>
      <item-detalles class='pedido-edicion'>
        <wc-texto data-tipo-fuente='etiqueta-m'>
          Anticipo
        </wc-texto>
        <wc-texto id='estado-anticipo' data-tipo-fuente='cuerpo-l'></wc-texto>
      </item-detalles>
      <item-detalles>
        <wc-texto data-tipo-fuente='etiqueta-m'>
          Método de pago
        </wc-texto>
        <wc-texto id='metodo-pago' data-tipo-fuente='cuerpo-l'></wc-texto>
      </item-detalles>
      <item-detalles id='item-detalles-pago'>
        <wc-texto data-tipo-fuente='etiqueta-m'>
          Detalles de pago
        </wc-texto>
        <wc-texto id='detalles-pago' data-tipo-fuente='cuerpo-l'></wc-texto>
      </item-detalles>
    </contenedor-flex>
    <!-- <boton-rellenado
        class='pedido-edicion'
        data-evento='editarinformacionpago'
        data-color-fondo='var(--clr-secundario-90)'
        data-color-texto='var(--clr-secundario-10)'
        data-variante='texto-icono'
        data-etiqueta='Editar información de pago'
        data-icono='edit'>
    </boton-rellenado> -->
  </contenedor-flex>
  <contenedor-flex flex-direction='row' gap='var(--espaciado-grande)'>
    <boton-rellenado
        class='pedido-edicion'
        data-evento='completarpedido'
        data-color-fondo='var(--clr-primario-40)'
        data-color-texto='#ffffff'
        data-variante='texto-icono'
        data-etiqueta='Completar pedido'
        data-icono='check'>
    </boton-rellenado>
    <boton-delineado
        class='pedido-edicion'
        data-evento='eliminarpedido'
        data-color-texto='var(--clr-error-40)'
        data-variante='texto-icono'
        data-etiqueta='Eliminar pedido'
        data-icono='delete_forever'>
    </boton-delineado>
  </contenedor-flex>
</contenedor-flex>
