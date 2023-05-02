<?php require_once COMPROBAR_SESION ?>

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

      <div class='seccion' data-rol='secciones'>
        <?php
          require_once AUTOLOADER;

          use classes\Respuesta;
          use \controllers\Pedido;

          $pedido = new Pedido();
          $resultado = $pedido->obtenerPedidosPendientes();
        ?>
          <div class='pedidos'>
            <h1 class='titulo-grande txt-fondo-alternativo'>Pedidos pendientes</h1>
            <div class='pedidos-pendientes'>
              <?php switch ($resultado['tipo']):
                case Respuesta::ARRAY:
                  foreach ($resultado['contenido'] as $pedidoPendiente): ?>
                    <div class='pedido-info' title='Clic para más información'>
                      <span class='cuerpo-mediano'>
                        <?= $pedidoPendiente['nombreCliente'] ?>
                      </span>
                      <span class='cuerpo-mediano'>
                        <?= $pedidoPendiente['tipoEntrega']; ?>
                      </span>
                      <span class='cuerpo-mediano'>
                        <?= $pedidoPendiente['tipoPago']; ?>
                      </span>
                      <span class='cuerpo-mediano'>
                        <?= $pedidoPendiente['estadoPedido'] ?>
                      </span>
                    </div>
                  <?php endforeach;
                  break;

                case Respuesta::MENSAJE: ?>
                  <span class='titulo-mediano sin-pedidos'>
                    <?= $resultado['contenido'] ?>
                  </span>
                  <?php break;

                default: ?>
                  <span class='titulo-mediano sin-pedidos'>
                    Ha habido un problema para recuperar los pedidos pendientes.
                  </span>
              <?php endswitch; ?>
            </div>
          </div>
      </div>
    </div>
  </main>

  <?php require_once PIE_PAGINA ?>
</body>
</html>
