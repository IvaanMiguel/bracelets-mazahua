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
  
  <?php require_once DIR_PARCIALES . '/customers/lista-clientes.php' ?>
</lista-encabezada>
