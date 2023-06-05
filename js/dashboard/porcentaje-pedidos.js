import { obtenerRespuesta } from '../vista-control.js';

fetch('php/includes/dashboard/mostrar_pedidos_relacion.inc.php', {
  method: 'POST'
})
  .then((respuesta) => respuesta.json())
  .then((datos) => {
    obtenerRespuesta(datos);

    const pedidosRelacion = datos.contenido[0];
    const pedidosCreados = pedidosRelacion.pedidosCreados;
    const pedidosCompletados = pedidosRelacion.pedidosCompletados;
    const porcentajePedidosCompletados = (pedidosCompletados / pedidosCreados * 100).toFixed(0);
    const ctx = document.getElementById('porcentaje-pedidos');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Pedidos creados', 'Pedidos completados'],
        datasets: [{
          data: [pedidosCreados, pedidosCompletados],
          categoryPercentage: 0.5
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          title: {
            display: true,
            text: 'Porcentaje de Pedidos Completados',
            font: {
              size: 16,
              family: "'Roboto', sans-serif"
            }
          },
          subtitle: {
            display: true,
            text: `El ${porcentajePedidosCompletados}% de los pedidos se han completado.`,
            padding: {
              bottom: 12
            }
          },
          legend: {
            display: false
            // labels: {
            //   font: {
            //     size: 12,
            //     family: "'Roboto', sans-serif"
            //   }
            // }
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
