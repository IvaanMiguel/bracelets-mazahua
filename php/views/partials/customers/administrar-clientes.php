<?php
  require_once AUTOLOADER;

  use \controllers\Cliente;

  $vistaCliente = Cliente::vistaClienteConstructor();
  $clientes = $vistaCliente->mostrarClientes();
?>

<lista-encabezada>
  <wc-texto id='clientes-titulo' slot='titulo' data-tipo-fuente='titulo-l'>
    <span id='total-clientes'><?= count($clientes)  ?></span>
    <?= 'cliente' . (count($clientes) === 1 ? '' : 's') ?>
  </wc-texto>
  <lista-controlador id='lista-clientes'>

    <?php $i = 0;
    foreach ($clientes as $cliente): ?>
      <item-divisor <?= ++$i === count($clientes) ? 'data-no-divisor' : '' ?>>
        <lista-item>
          <wc-texto data-tipo-fuente='titulo-s'><?= $cliente['nombre'] ?></wc-texto>
          <input class='id-cliente' type='hidden' value=<?= $cliente['id'] ?>>
        </lista-item>
      </item-divisor>
    <?php endforeach; ?>

  </lista-controlador>
</lista-encabezada>
