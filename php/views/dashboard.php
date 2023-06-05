<?php
  use \controllers\Dashboard;

  require_once COMPROBAR_SESION;

  $dashboard = new Dashboard();
  $clienteEstrella = $dashboard->mostrarClienteEstrella()[0];
  $ingresosTotales = $dashboard->mostrarIngresosTotales();
  $productoMasVendido = $dashboard->mostrarProductoMasVendido()[0];
  $tipoPagoFrecuente = $dashboard->mostrarTipoPagoFrecuente();
?>

<!DOCTYPE html>
<html lang='es'>
<head>
  <?php require_once HEAD_TAGS ?>

  <link rel='stylesheet' href='css/principal.css'>
  <link rel='stylesheet' href='css/sections/dashboard.css'>

  <script type='module' src='components/wc-boton.js'></script>
  <script type='module' src='components/wc-divisor.js'></script>
  <script type='module' src='components/boton-delineado.js'></script>
  <script type='module' src='components/boton-elevado.js'></script>
  <script type='module' src='components/boton-icono.js'></script>
  <script type='module' src='components/boton-texto.js'></script>
  <script type='module' src='components/item-error.js'></script>
  <script type='module' src='components/ventana-emergente.js'></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
</head>
<body>
  <main class='contenedor'>
    <?php require_once MENU ?>

    <div class='contenido'>
      <?php require_once CABECERA ?>

      <contenedor-flex class='seccion' flex-direction='column' gap='var(--espaciado-grande)' padding='var(--espaciado-grande)'>
        <wc-texto data-tipo-fuente='titulo-l'>Estadísticas</wc-texto>
        <contenedor-flex class='dashboard'>
          <contenedor-flex class='porcentaje-pedidos' align-items='center'>
            <canvas id='porcentaje-pedidos'></canvas>
          </contenedor-flex>
          <contenedor-flex class='cliente-estrella' justify-content='center' align-items='center'>
            <wc-texto data-tipo-fuente='titulo-l'>
              Cliente estrella
            </wc-texto>
            <wc-texto data-tipo-fuente='cuerpo-l'><?= $clienteEstrella['nombreCliente'] ?></wc-texto>
            <wc-texto data-tipo-fuente='titulo-l'>
              Ingresos generados
            </wc-texto>
            <wc-texto data-tipo-fuente='cuerpo-l'>$<?= $clienteEstrella['total'] ?> MXN</wc-texto>
          </contenedor-flex>
          <contenedor-flex class='producto-frecuente' justify-content='center' align-items='center'>
            <wc-texto data-tipo-fuente='titulo-l'>
              Producto más vendido
            </wc-texto>
            <wc-texto data-tipo-fuente='cuerpo-l'>
              <?= $productoMasVendido['nombre'] ?>
            </wc-texto>
            <wc-texto data-tipo-fuente='titulo-m'>
              <?= $productoMasVendido['cantidad'] ?>
              <?= ($productoMasVendido['cantidad'] == 1 ? 'unidad vendida' : 'unidades vendidas') ?>
            </wc-texto>
            <wc-texto data-tipo-fuente='titulo-m'>
              Ingresos generados
            </wc-texto>
            <wc-texto data-tipo-fuente='cuerpo-m'>
              $<?= $productoMasVendido['total'] ?> MXN
            </wc-texto>
          </contenedor-flex>
          <contenedor-flex class='productos-categorias' align-items='center'>
            <canvas id='productos-categorias'></canvas>
          </contenedor-flex>
          <contenedor-flex class='pedidos-clientes' align-items='center'>
            <canvas id='pedidos-clientes'></canvas>
          </contenedor-flex>
          <contenedor-flex class='metodo-pago-frecuente' justify-content='center' align-items='center'>
            <wc-texto data-tipo-fuente='titulo-l'>Método de pago más utilizado</wc-texto>
            <wc-texto data-tipo-fuente='cuerpo-l'><?= $tipoPagoFrecuente ?></wc-texto>
          </contenedor-flex>
          <contenedor-flex class='ingresos-totales' justify-content='center' align-items='center'>
            <wc-texto data-tipo-fuente='titulo-l'>
              Ingresos totales
            </wc-texto>
            <wc-texto data-tipo-fuente='cuerpo-l'>
              $<?= $ingresosTotales ?> MXN
            </wc-texto>
          </contenedor-flex>
          <contenedor-flex class='ventas-meses'>
            <canvas id='ventas-meses'></canvas>
          </contenedor-flex>
        </contenedor-flex>
      </contenedor-flex>
    </div>
  </main>

  <?php require_once PIE_PAGINA ?>

  <script type='module' src='js/dashboard/productos-categorias.js'></script>
  <script type='module' src='js/dashboard/porcentaje-pedidos.js'></script>
  <script type='module' src='js/dashboard/pedidos-clientes.js'></script>
  <script type='module' src='js/dashboard/ventas-meses.js'></script>
</body>
</html>
