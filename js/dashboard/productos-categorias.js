import { obtenerRespuesta } from '../vista-control.js';

fetch('php/includes/dashboard/mostrar_ventas_categorias.inc.php', {
  method: 'POST'
})
  .then((respuesta) => respuesta.json())
  .then((datos) => {
    obtenerRespuesta(datos);

    const ventasCategorias = datos.contenido;
    const nombresCategorias = ventasCategorias.map((ventas) => ventas.nombreCategoria);
    const totales = ventasCategorias.map((ventas) => ventas.total);

    console.log(totales);

    const ventaTotal = totales.reduce((sum, i) => sum + +i, 0);

    console.log(ventaTotal);

    const ctx = document.getElementById('productos-categorias');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: nombresCategorias,
        datasets: [{
          label: 'Ventas totales',
          data: totales,
          backgroundColor: [
            '#0496FF80', '#006BA680', '#b7007080',
            '#94407480', '#005ac180', '#74529680',
            '#7B082880'
          ]
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          title: {
            display: true,
            text: 'Ventas por Categoría de Productos',
            font: {
              size: 16,
              family: "'Roboto', sans-serif"
            }
          },
          legend: {
            display: false,
            labels: {
              font: {
                size: 12,
                family: "'Roboto', sans-serif"
              }
            }
          },
          tooltip: {
            position: 'nearest'
          },
          datalabels: {
            backgroundColor: 'white',
            borderRadius: 8,
            textAlign: 'center',
            font: {
              size: 11,
              family: "'Roboto', sans-serif",
              weight: '500'
            },
            formatter: function (value, ctx) {
              return `${ctx.chart.data.labels[ctx.dataIndex]}\n${(value / ventaTotal * 100).toFixed(0)}%`;
            }
          }
        },
        scale: {
          ticks: {
            precision: 0
          }
        }
      },
      plugins: [ChartDataLabels]
    });
  });
