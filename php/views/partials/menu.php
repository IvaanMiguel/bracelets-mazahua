<?php
$menuBotones = [
  [
    'etiqueta' => 'Inicio',
    'icono' => 'home',
    'href' => URL_INICIO
  ],
  [
    'etiqueta' => 'Clientes',
    'icono' => 'groups',
    'href' => URL_CLIENTES
  ],
  [
    'etiqueta' => 'Productos',
    'icono' => 'inventory_2',
    'href' => URL_PRODUCTOS
  ],
  [
    'etiqueta' => 'Categorías',
    'icono' => 'category',
    'href' => URL_CATEGORIAS
  ],
  [
    'etiqueta' => 'Pedidos',
    'icono' => 'inventory',
    'href' => URL_PEDIDOS
  ]
]
?>

<menu-lateral>
  <boton-rellenado
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-evento='alternarmenu'
      data-variante='icono'>
    <md-icono slot='icono' data-icono='menu' data-opsz='20' data-escala='m'></md-icono>
  </boton-rellenado>

  <?php foreach ($menuBotones as $boton): ?>
    <boton-rellenado
        data-color-fondo='var(--clr-primario-40)'
        data-color-texto='#ffffff'
        href=<?= $boton['href'] ?>
        data-variante='texto-icono'
        data-expandir>
      <md-icono slot='icono' data-icono=<?= $boton['icono'] ?> data-opsz='20' data-escala='m'></md-icono>
      <span slot='etiqueta'><?= $boton['etiqueta'] ?></span>
    </boton-rellenado>
  <?php endforeach; ?>

  <boton-rellenado
      slot='menu-final'
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-variante='texto-icono'
      data-evento='confirmarcierresesion'
      data-expandir>
    <md-icono slot='icono' data-icono='logout' data-opsz='20' data-escala='m'></md-icono>
    <span slot='etiqueta'>Cerrar sesión</span>
  </boton-rellenado>
</menu-lateral>
