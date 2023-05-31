const listaPedidosPendientes = document.getElementById('pedidos-pendientes');

addEventListener('DOMContentLoaded', () => {
  const pedidoId = localStorage.getItem('pedidoId');
  if (pedidoId) {
    localStorage.removeItem('pedidoId');
    listaPedidosPendientes.querySelector(`.id-pedido[value='${pedidoId}']`)
      .parentElement.dispatchEvent(new Event('click'));
  }
});

addEventListener('beforeunload', () => localStorage.removeItem('pedidoId'));
