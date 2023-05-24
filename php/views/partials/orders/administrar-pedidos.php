<?php
  use \controllers\orders\MostrarPedido;

  require_once AUTOLOADER;
  require_once UTILS;

  setlocale(LC_ALL, 'es_ES');

  $pedidos = new MostrarPedido();
  $pedidosPendientes = $pedidos->mostrarPedidosPendientes();

?>

<lista-encabezada>
  <wc-texto id='pedidos-titulo' slot='titulo' data-tipo-fuente='titulo-l'>
    <span id='total-pedidos'>
      <?= count($pedidosPendientes) ?>
    </span>
    <?= 'pedido' . (count($pedidosPendientes) === 1 ? '' : 's') ?>
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
                en total. Entrega el <?= obtenerFecha($pedidoPendiente['fechaEntrega']) ?>.
              </wc-texto>
              <input class='id-pedido-pendiente' type='hidden' value=<?= $pedidoPendiente['id'] ?>>
            </lista-item>
          </item-divisor>
        <?php endforeach; ?>
      <?php endif; ?>
    </lista-controlador>
  </wc-colapsable>
  <wc-colapsable>
    <wc-texto slot='texto-cabecera' data-tipo-fuente='titulo-m'>
      7 entrgados
    </wc-texto>
    <md-icono slot='icono-cabecera' data-icono='expand_less' data-opsz='24'></md-icono>
    <lista-controlador>
      <!-- <item-divisor>
        <lista-item>
          <span slot='info-principal'>Item 1</span>
          <span slot='info-extra'>Elemento 1</span>
        </lista-item>
      </item-divisor> -->
    </lista-controlador>
  </wc-colapsable>
</lista-encabezada>
