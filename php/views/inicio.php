<?php require_once COMPROBAR_SESION ?>

<!DOCTYPE html>
<html lang='es'>
<head>
  <?php require_once HEAD_TAGS ?>

  <link rel='stylesheet' href='css/principal.css'>
  <link rel='stylesheet' href='css/sections/inicio.css'>

  <script type='module' src='components/md-boton/md-boton.js'></script>
  <script type='module' src='components/wc-boton.js'></script>
  <script type='module' src='components/boton-delineado.js'></script>
  <script type='module' src='components/boton-elevado.js'></script>
  <script type='module' src='components/boton-texto.js'></script>
  <script type='module' src='components/ventana-emergente/ventana-emergente.js'></script>
</head>
<body>
  <main class='contenedor'>
    <?php require_once MENU ?>

    <div class='contenido'>
      <?php require_once CABECERA ?>

      <div class='seccion' data-rol='secciones'>
        <?php
          require_once AUTOLOADER;

          use \controllers\Pedido;

          $pedido = new Pedido();
          $resultado = $pedido->obtenerPedidosPendientes();
          ?>

          <div class='pedidos'>
            <h1 class='titulo-grande txt-fondo-alternativo'>Pedidos pendientes</h1>
            <div class='pedidos-pendientes'>
              <?php switch ($resultado['tipo']):
                case 1:
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

                case 2: ?>
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

  <ventana-emergente data-id='cerrar-sesion'>
    <div class='contenido'>
      <span class='titulo-grande'>Cerrar sesión</span>
      <span class='cuerpo-mediano'>¿Deseas salir y cerrar la sesión actual?</span>
      <div class='botones-contenedor botones-contenedor--flex-end'>
        <button
          class='boton bg-primario txt-blanco boton-primario-rellenado'
          is='md-boton'
          data-evento='cerrarsesion'>Sí
        </button>
        <button
          class='boton boton-delineado bg-transparente txt-primario boton-primario-delineado'
          is='md-boton'
          data-evento='cerrarventana'>No
        </button>
      </div>
    </div>
  </ventana-emergente>
  
  <script src='js/cerrar-sesion.js'></script>
</body>
</html>
