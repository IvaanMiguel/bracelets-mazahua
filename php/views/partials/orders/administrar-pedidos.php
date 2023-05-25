<?php
  use \controllers\orders\MostrarPedido;

  require_once AUTOLOADER;
  require_once UTILS;

  setlocale(LC_ALL, 'es_ES');

  $pedidos = new MostrarPedido();
  $pedidosPendientes = $pedidos->mostrarPedidosPendientes();
  $pedidosCompletados = $pedidos->mostrarPedidosCompletados();
?>

<lista-encabezada>
  <wc-texto id='pedidos-titulo' slot='titulo' data-tipo-fuente='titulo-l'>
    <span id='total-pedidos'>
      <?= count($pedidosPendientes) + count($pedidosCompletados) ?>
    </span>
    <?= 'pedido' . (count($pedidosPendientes) + count($pedidosCompletados) === 1 ? '' : 's') ?>
  </wc-texto>
  <wc-colapsable>
    <wc-texto id='pedidos-pendientes-titulo' slot='texto-cabecera' data-tipo-fuente='titulo-m'>
      <span id='total-pedidos-pendientes'>
        <?= count($pedidosPendientes) ?>
      </span> por entregar
    </wc-texto>
    <lista-controlador id='pedidos-pendientes'>
      <?php $i = 0; ?>
      <?php if (count($pedidosPendientes) > 0): ?>
        <?php foreach ($pedidosPendientes as $pedidoPendiente): ?>
          <item-divisor <?= ++$i === count($pedidosPendientes) ? 'data-no-divisor' : '' ?>>
            <lista-item>
              <wc-texto data-tipo-fuente='titulo-s'>
                <?= $pedidoPendiente['nombreCliente'] ?>
              </wc-texto>
              <wc-texto slot='info-extra' data-tipo-fuente='etiqueta-s'>
                <?= $pedidoPendiente['totalProductos'] ?> producto<?= $pedidoPendiente['totalProductos'] == 1 ? '' : 's' ?>
                en total. <span class='entrega-completado'>Entrega el <?= obtenerFecha($pedidoPendiente['fechaEntrega']) ?></span>.
              </wc-texto>
              <input class='id-pedido' type='hidden' value=<?= $pedidoPendiente['id'] ?>>
            </lista-item>
          </item-divisor>
        <?php endforeach; ?>
      <?php endif; ?>
    </lista-controlador>
  </wc-colapsable>
  <wc-colapsable>
    <wc-texto id='pedidos-completados-titulo' slot='texto-cabecera' data-tipo-fuente='titulo-m'>
      <span id='total-pedidos-completados'>
        <?= count($pedidosCompletados) ?>
      </span> entregados
    </wc-texto>
    <lista-controlador id='pedidos-completados'>
      <?php $i = 0; ?>
      <?php if (count($pedidosCompletados) > 0): ?>
        <?php foreach($pedidosCompletados as $pedidoCompletado): ?>
          <item-divisor <?= ++$i === count($pedidosCompletados) ? 'data-no-divisor' : '' ?>>
            <lista-item>
              <wc-texto data-tipo-fuente='titulo-s'>
                <?= $pedidoCompletado['nombreCliente'] ?>
              </wc-texto>
              <wc-texto slot='info-extra' data-tipo-fuente='etiqueta-s'>
                <?= $pedidoCompletado['totalProductos'] ?> producto<?= $pedidoCompletado['totalProductos'] == 1 ? '' : 's' ?>
                en total. <span class='entrega-completado'</span>Completado el <?= obtenerFecha($pedidoCompletado['fechaCompletado']) ?></span>.
              </wc-texto>
              <input class='id-pedido' type='hidden' value=<?= $pedidoCompletado['id'] ?>>
            </lista-item>
          </item-divisor>
        <?php endforeach; ?>
      <?php endif; ?>
    </lista-controlador>
  </wc-colapsable>
</lista-encabezada>
