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
      data-variante='icono'
      data-icono='menu'>
  </boton-rellenado>

  <?php foreach ($menuBotones as $boton): ?>
    <boton-rellenado
        data-color-fondo='var(--clr-primario-40)'
        data-color-texto='#ffffff'
        href=<?= $boton['href'] ?>
        data-variante='texto-icono'
        data-icono=<?= $boton['icono'] ?>
        data-etiqueta=<?= $boton['etiqueta'] ?>
        data-expandir>
    </boton-rellenado>
  <?php endforeach; ?>

  <boton-rellenado
      slot='menu-final'
      data-color-fondo='var(--clr-primario-40)'
      data-color-texto='#ffffff'
      data-variante='texto-icono'
      data-evento='confirmarcierresesion'
      data-icono='logout'
      data-etiqueta='Cerrar sesión'
      data-expandir>
  </boton-rellenado>
</menu-lateral>
