<lista-controlador id='lista-clientes'>

  <?php $i = 0;
  if (count($clientes) > 0):

    foreach ($clientes as $cliente): ?>
      <item-divisor <?= ++$i === count($clientes) ? 'data-no-divisor' : '' ?>>
        <lista-item>
          <wc-texto class='nombre-cliente-lista' data-tipo-fuente='titulo-s'><?= $cliente['nombre'] ?></wc-texto>
          <input class='id-cliente' type='hidden' value=<?= $cliente['id'] ?>>
        </lista-item>
      </item-divisor>
    <?php endforeach; ?>

  <?php else: ?>
    <contenedor-flex margin='0 auto' padding='var(--espaciado-chico)'>
      <wc-texto data-tipo-fuente='etiqueta-l'>Sin clientes registrados.</wc-texto>
    </contenedor-flex>
  <?php endif; ?>

</lista-controlador>
