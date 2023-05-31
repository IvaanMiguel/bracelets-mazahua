<?php
  use classes\Respuesta;
  use \controllers\orders\MostrarPedido;

  require_once COMPROBAR_SESION;
  require_once AUTOLOADER;
?>

<!DOCTYPE html>
<html lang='es'>
<head>
  <?php require_once HEAD_TAGS ?>

  <link rel='stylesheet' href='css/principal.css'>
  <link rel='stylesheet' href='css/sections/inicio.css'>

  <script type='module' src='components/wc-boton.js'></script>
  <script type='module' src='components/wc-divisor.js'></script>
  <script type='module' src='components/boton-delineado.js'></script>
  <script type='module' src='components/boton-elevado.js'></script>
  <script type='module' src='components/boton-icono.js'></script>
  <script type='module' src='components/boton-texto.js'></script>
  <script type='module' src='components/item-error.js'></script>
  <script type='module' src='components/ventana-emergente.js'></script>
</head>
<body>
  <main class='contenedor'>
    <?php require_once MENU ?>

    <div class='contenido'>
      <?php require_once CABECERA ?>

      <div class='seccion'>
        <?php
          $pedido = new MostrarPedido();
          $resultado = $pedido->obtenerPedidosPendientes();
        ?>
          <div class='pedidos'>
            <wc-texto data-tipo-fuente='titulo-l'>Pedidos pendientes</wc-texto>
            <contenedor-flex id='pedidos-pendientes' class='pedidos-pendientes' gap='var(--espaciado-grande)' padding='var(--espaciado-grande)'>
              <?php switch ($resultado['tipo']):
                case Respuesta::ARRAY:

                  foreach ($resultado['contenido'] as $pedidoPendiente): ?>
                    <contenedor-flex class='pedido-info' flex-direction='column' title='Clic para más información'>
                      <?php foreach ($pedidoPendiente as $clave => $valor): ?>
                        <?php if ($clave === 'id') continue; ?>
                        <wc-texto class='texto-pedido' data-tipo-fuente='cuerpo-m'><?= $valor ?></wc-texto>
                      <?php endforeach; ?>
                      <input class='id-pedido' type='hidden' value=<?= $pedidoPendiente['id'] ?>>
                    </contenedor-flex>
                  <?php endforeach;

                  break;

                case Respuesta::MENSAJE: ?>
                  <contenedor-flex padding='var(--espaciado-jumbo)' margin='auto'>
                    <wc-texto data-tipo-fuente='titulo-m'>
                      <?= $resultado['contenido'] ?>
                    </wc-texto>
                  </contenedor-flex>
                  <?php break;

                default: ?>
                  <contenedor-flex padding='var(--espaciado-jumbo)' margin='auto'>
                    <wc-texto data-tipo-fuente='titulo-m'>
                      Ha habido un problema para recuperar los pedidos pendientes.
                    </wc-texto>
                  </contenedor-flex>
              <?php endswitch; ?>
            </contenedor-flex>
          </div>
      </div>
    </div>
  </main>

  <?php require_once PIE_PAGINA ?>
  <script src='js/pedido-inicio.js'></script>
</body>
</html>
