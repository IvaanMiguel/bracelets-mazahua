import { obtenerRespuesta } from '../vista-control.js';

fetch('php/includes/dashboard/mostrar_pedidos_clientes.inc.php', {
  method: 'POST'
})
  .then((respuesta) => respuesta.json())
  .then((datos) => {
    obtenerRespuesta(datos);

    const ctx = document.getElementById('pedidos-clientes');
    const nombres = [];
    const pedidosCreados = [];
    const pedidosCompletados = [];

    datos.contenido.forEach((cliente) => {
      // if (!cliente.pedidosCreados) return;

      nombres.push(cliente.nombre);
      pedidosCreados.push(cliente.pedidosCreados);
      pedidosCompletados.push(cliente.pedidosCompletados);
    });

    new Chart(ctx, {
      type: 'bar',
      data: {
        axis: 'y',
        labels: nombres,
        datasets: [{
          label: 'Pedidos creados',
          data: pedidosCreados,
          categoryPercentage: 0.5
        },
        {
          label: 'Pedidos completados',
          data: pedidosCompletados,
          categoryPercentage: 0.5
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        indexAxis: 'y',
        plugins: {
          title: {
            display: true,
            text: 'Pedidos Hechos por Cliente',
            font: {
              size: 16,
              family: "'Roboto', sans-serif"
            }
          }
        },
        scale: {
          ticks: {
            precision: 0
          }
        }
      }
    });
  });
