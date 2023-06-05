import { obtenerRespuesta } from '../vista-control.js';

fetch('php/includes/dashboard/mostrar_productos_categorias.inc.php', {
  method: 'POST'
})
  .then((respuesta) => respuesta.json())
  .then((datos) => {
    obtenerRespuesta(datos);

    const productosCategorias = datos.contenido;
    const nombresCategorias = [];
    const totalesProductos = [];

    productosCategorias.forEach((categoria) => {
      nombresCategorias.push(categoria.nombreCategoria);
      totalesProductos.push(categoria.totalProductos);
    });

    const ctx = document.getElementById('productos-categorias');
    new Chart(ctx, {
      type: 'polarArea',
      data: {
        labels: nombresCategorias,
        datasets: [{
          data: totalesProductos
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          title: {
            display: true,
            text: 'Tipos de Productos por Categoría',
            font: {
              size: 16,
              family: "'Roboto', sans-serif"
            }
          },
          legend: {
            display: true,
            labels: {
              font: {
                size: 12,
                family: "'Roboto', sans-serif"
              }
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
