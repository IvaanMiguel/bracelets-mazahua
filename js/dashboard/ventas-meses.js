import { obtenerRespuesta, mes } from '../vista-control.js';

const obtenerMes = (numMes) => {
  const mesNombre = mes[numMes - 1].charAt(0).toUpperCase() + mes[numMes - 1].slice(1);
  return mesNombre.substring(0, 3);
};

fetch('php/includes/dashboard/mostrar_ventas_meses.inc.php', {
  method: 'POST'
})
  .then((respuesta) => respuesta.json())
  .then((datos) => {
    obtenerRespuesta(datos);

    const periodosVentas = datos.contenido;

    const periodos = periodosVentas.map((ventas) => `${obtenerMes(ventas.mes)} ${ventas.anho}`);
    const totalesVentas = periodosVentas.map((ventas) => ventas.totalVentas);
    const totalesProductos = periodosVentas.map((ventas) => ventas.totalProductos);

    const ctxVentas = document.getElementById('ventas-meses');

    new Chart(ctxVentas, {
      type: 'line',
      data: {
        labels: periodos,
        datasets: [{
          label: 'Total de ventas',
          data: totalesVentas,
          fill: false,
          tension: 0.1,
          yAxisID: 'y'
        }, {
          label: 'Total de productos vendidos',
          data: totalesProductos,
          fill: false,
          tension: 0.1,
          yAxisID: 'y1'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          title: {
            display: true,
            text: 'Ganancias y Ventas de Productos Mensuales',
            font: {
              size: 16,
              family: "'Roboto', sans-serif"
            }
          },
          tooltip: {
            mode: 'index',
            intersect: false
          }
        },
        scale: {
          ticks: {
            precision: 0
          }
        },
        scales: {
          y: {
            type: 'linear',
            display: true,
            position: 'left'
          },
          y1: {
            type: 'linear',
            display: true,
            position: 'right',
            grid: {
              drawOnChartArea: false
            }
          }
        }
      }
    });
  });
