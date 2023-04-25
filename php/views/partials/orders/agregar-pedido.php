<wc-colapsable slot='lista'>
  <span slot='texto-cabecera'>Cliente</span>
  <md-icono slot='icono-cabecera' data-icono='expand_less' data-opsz='24'></md-icono>
  <contenedor-flex class='pedido-contenedor' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-grande)'>
    <boton-rellenado
        data-color-fondo='var(--clr-secundario-90)'
        data-color-texto='var(--clr-secundario-10)'
        data-etiqueta='Buscar cliente'
        data-icono='search'
        data-variante='texto-icono'>
    </boton-rellenado>
    <info-detalles>
      <item-detalles>
        <wc-texto data-tipo-fuente='etiqueta-m'>Item 1</wc-texto>
        <wc-texto data-tipo-fuente='cuerpo-g'>Info 1</wc-texto>
      </item-detalles>
      <item-detalles>
        <wc-texto data-tipo-fuente='etiqueta-m'>Item 1</wc-texto>
        <wc-texto data-tipo-fuente='cuerpo-g'>Info 1</wc-texto>
      </item-detalles>
      <item-detalles>
        <wc-texto data-tipo-fuente='etiqueta-m'>Item 1</wc-texto>
        <wc-texto data-tipo-fuente='cuerpo-g'>Info 1</wc-texto>
      </item-detalles>
      <item-detalles>
        <wc-texto data-tipo-fuente='etiqueta-m'>Item 1</wc-texto>
        <wc-texto data-tipo-fuente='cuerpo-g'>Info 1</wc-texto>
      </item-detalles>
    </info-detalles>
  </contenedor-flex>
</wc-colapsable>
<wc-colapsable slot='lista'>
  <span slot='texto-cabecera'>Productos</span>
  <md-icono slot='icono-cabecera' data-icono='expand_less' data-opsz='24'></md-icono>
  <contenedor-flex class='pedido-contenedor' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-grande)'>
    <boton-rellenado
        data-color-fondo='var(--clr-secundario-90)'
        data-color-texto='var(--clr-secundario-10)'
        data-variante='texto-icono'
        data-icono='search'
        data-etiqueta='Buscar producto'>
    </boton-rellenado>
    <info-detalles>
      <item-detalles>
        <wc-texto data-tipo-fuente='etiqueta-m'>Item 1</wc-texto>
        <wc-texto data-tipo-fuente='cuerpo-g'>Info 1</wc-texto>
      </item-detalles>
    </info-detalles>
    <campo-texto>
      <span slot='etiqueta'>Cantidad</span>
      <input slot='campo' type='text' name='cantidadProducto'>
    </campo-texto>
    <boton-delineado
        data-color-texto='var(--clr-primario-40)'
        data-etiqueta='Añadir producto'
        data-icono='add'
        data-variante='texto-icono'>
    </boton-delineado>
    <wc-colapsable data-minicabecera>
      <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-s'>Productos añadidos</wc-texto>
      <lista-controlador>
        <item-divisor>
          <item-detalles>
            <wc-texto data-tipo-fuente='etiqueta-l'>5 × Producto 1 adsasdsdd adsa dasd asd</wc-texto>
            <wc-texto data-tipo-fuente='etiqueta-l'>$Mucha feria asdasd ada sdasd asd </wc-texto>
            <boton-icono slot='final' data-color-texto='var(--clr-error-40)' data-icono='delete'>
            </boton-icono>
          </item-detalles>
        </item-divisor>
        <item-divisor>
          <item-detalles>
            <wc-texto data-tipo-fuente='etiqueta-l'>5 × Producto 1 adsasdsdd adsa dasd asd</wc-texto>
            <wc-texto data-tipo-fuente='etiqueta-l'>$Mucha feria asdasd ada sdasd asd </wc-texto>
            <boton-icono slot='final' data-color-texto='var(--clr-error-40)' data-icono='delete'>
            </boton-icono>
          </item-detalles>
        </item-divisor>
        <item-divisor data-no-divisor>
          <item-detalles>
            <wc-texto data-tipo-fuente='etiqueta-l'>5 × Producto 1 adsasdsdd adsa dasd asd</wc-texto>
            <wc-texto data-tipo-fuente='etiqueta-l'>$Mucha feria asdasd ada sdasd asd </wc-texto>
            <boton-icono slot='final' data-color-texto='var(--clr-error-40)' data-icono='delete'>
            </boton-icono>
          </item-detalles>
        </item-divisor>
      </lista-controlador>
    </wc-colapsable>
    <div id='total'>
      <wc-texto data-tipo-fuente='etiqueta-m'>Total</wc-texto>
      <wc-texto data-tipo-fuente='cuerpo-l'>$500.00 MXN</wc-texto>
    </div>
</contenedor-flex>
</wc-colapsable>
<wc-colapsable slot='lista'>
  <span slot='texto-cabecera'>Entrega</span>
  <md-icono slot='icono-cabecera' data-icono='expand_less' data-opsz='24'></md-icono>
  <contenedor-flex class='pedido-contenedor' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-grande)'>
    <wc-tabs>
      <boton-texto
          slot='tab'
          data-color-texto='var(--clr-fondo-10)'
          data-etiqueta='Pick up'
          data-expandir>
      </boton-texto>
      <contenedor-flex flex-direction='column' gap='var(--espaciado-grande)'>
        <campo-texto>
          <span slot='etiqueta'>Nombre de destinatario</span>
          <input slot='campo' type='text' name='nombreDestinatario'>
        </campo-texto>
        <campo-texto>
          <span slot='etiqueta'>Número de celular de destinatario</span>
          <input slot='campo' type='text' name='nombreDestinatario'>
        </campo-texto>
        <campo-texto>
          <span slot='etiqueta'>Fecha de entrega</span>
          <input slot='campo' type='text' name='nombreDestinatario'>
        </campo-texto>
        <campo-texto>
          <span slot='etiqueta'>Hora de entrega</span>
          <input slot='campo' type='text' name='nombreDestinatario'>
        </campo-texto>
      </contenedor-flex>
      <boton-texto
          slot='tab'
          data-color-texto='var(--clr-fondo-10)'
          data-etiqueta='A domicilio'
          data-expandir>
      </boton-texto>
      <contenedor-flex flex-direction='column' gap='var(--espaciado-grande)'>
        <campo-texto>
          <span slot='etiqueta'>Ubicación</span>
          <input slot='campo' type='text' name='nombreDestinatario'>
        </campo-texto>
        <info-detalles>
          <item-detalles>
            <wc-texto data-tipo-fuente='etiqueta-m'>Item 1</wc-texto>
            <wc-texto data-tipo-fuente='cuerpo-g'>Info 1</wc-texto>
          </item-detalles>
          <item-detalles>
            <wc-texto data-tipo-fuente='etiqueta-m'>Item 1</wc-texto>
            <wc-texto data-tipo-fuente='cuerpo-g'>Info 1</wc-texto>
          </item-detalles>
          <item-detalles>
            <wc-texto data-tipo-fuente='etiqueta-m'>Item 1</wc-texto>
            <wc-texto data-tipo-fuente='cuerpo-g'>Info 1</wc-texto>
          </item-detalles>
          <item-detalles>
            <wc-texto data-tipo-fuente='etiqueta-m'>Item 1</wc-texto>
            <wc-texto data-tipo-fuente='cuerpo-g'>Info 1</wc-texto>
          </item-detalles>
        </info-detalles>
        <campo-texto>
          <span slot='etiqueta'>Nombre de destinatario</span>
          <input slot='campo' type='text' name='nombreDestinatario'>
        </campo-texto>
        <campo-texto>
          <span slot='etiqueta'>Número de celular de destinatario</span>
          <input slot='campo' type='text' name='nombreDestinatario'>
        </campo-texto>
        <campo-texto>
          <span slot='etiqueta'>Fecha de entrega</span>
          <input slot='campo' type='text' name='nombreDestinatario'>
        </campo-texto>
        <campo-texto>
          <span slot='etiqueta'>Hora de entrega</span>
          <input slot='campo' type='text' name='nombreDestinatario'>
        </campo-texto>
      </contenedor-flex>
      <boton-texto
          slot='tab'
          data-color-texto='var(--clr-fondo-10)'
          data-etiqueta='Por aplicación'
          data-expandir>
      </boton-texto>
      <contenedor-flex flex-direction='column' gap='var(--espaciado-grande)'>
        <contenedor-flex flex-direction='column' gap='var(--espaciado-chico)'>
          <wc-texto data-tipo-fuente='etiqueta-l'>Aplicación de entrega</wc-texto>
          <contenedor-flex flex-direction='row' gap='var(--espaciado-chico)'>
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
        <campo-texto>
          <span slot='etiqueta'>Ubicación</span>
          <input slot='campo' type='text' name='nombreDestinatario'>
        </campo-texto>
        <info-detalles>
          <item-detalles>
            <wc-texto data-tipo-fuente='etiqueta-m'>Item 1</wc-texto>
            <wc-texto data-tipo-fuente='cuerpo-g'>Info 1</wc-texto>
          </item-detalles>
          <item-detalles>
            <wc-texto data-tipo-fuente='etiqueta-m'>Item 1</wc-texto>
            <wc-texto data-tipo-fuente='cuerpo-g'>Info 1</wc-texto>
          </item-detalles>
          <item-detalles>
            <wc-texto data-tipo-fuente='etiqueta-m'>Item 1</wc-texto>
            <wc-texto data-tipo-fuente='cuerpo-g'>Info 1</wc-texto>
          </item-detalles>
          <item-detalles>
            <wc-texto data-tipo-fuente='etiqueta-m'>Item 1</wc-texto>
            <wc-texto data-tipo-fuente='cuerpo-g'>Info 1</wc-texto>
          </item-detalles>
        </info-detalles>
        <campo-texto>
          <span slot='etiqueta'>Nombre de destinatario</span>
          <input slot='campo' type='text' name='nombreDestinatario'>
        </campo-texto>
        <campo-texto>
          <span slot='etiqueta'>Número de celular de destinatario</span>
          <input slot='campo' type='text' name='nombreDestinatario'>
        </campo-texto>
        <campo-texto>
          <span slot='etiqueta'>Fecha de entrega</span>
          <input slot='campo' type='text' name='nombreDestinatario'>
        </campo-texto>
        <campo-texto>
          <span slot='etiqueta'>Hora de entrega</span>
          <input slot='campo' type='text' name='nombreDestinatario'>
        </campo-texto>
      </contenedor-flex>
    </wc-tabs>
  </contenedor-flex>
</wc-colapsable>
<wc-colapsable slot='lista'>
  <span slot='texto-cabecera'>Método de pago</span>
  <md-icono slot='icono-cabecera' data-icono='expand_less' data-opsz='24'></md-icono>
  <contenedor-flex class='pedido-contenedor' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-grande)'>
    <wc-tabs>
      <boton-texto
          slot='tab'
          data-color-texto='var(--clr-fondo-10)'
          data-etiqueta='Efectivo'
          data-expandir>
      </boton-texto>
      <span></span>
      <boton-texto
          slot='tab'
          data-color-texto='var(--clr-fondo-10)'
          data-etiqueta='Depósito'
          data-expandir>
      </boton-texto>
      <campo-texto>
        <span slot='etiqueta'>CLABE de cuenta</span>
        <input slot='campo' type='text' name='CLABECuenta'>
      </campo-texto>
      <boton-texto
          slot='tab'
          data-color-texto='var(--clr-fondo-10)'
          data-etiqueta='Tarjeta'
          data-expandir>
      </boton-texto>
      <contenedor-flex flex-direction='column' gap='var(--espaciado-grande)'>
        <campo-texto>
          <span slot='etiqueta'>Número de tarjeta</span>
          <input slot='campo' type='text' name='CLABECuenta'>
        </campo-texto>
        <contenedor-flex id='tarjeta-campos' flex-direction='row' gap='var(--espaciado-grande)'>
          <campo-texto>
            <span slot='etiqueta'>Fecha de vencimiento</span>
            <input slot='campo' type='text' name='CLABECuenta'>
          </campo-texto>
          <campo-texto>
            <span slot='etiqueta'>CVC</span>
            <input slot='campo' type='text' name='CLABECuenta'>
          </campo-texto>
        </contenedor-flex>
        <campo-texto>
          <span slot='etiqueta'>Nombre del titular</span>
          <input slot='campo' type='text' name='CLABECuenta'>
        </campo-texto>
      </contenedor-flex>
    </wc-tabs>
  </contenedor-flex>
</wc-colapsable>