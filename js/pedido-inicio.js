const pedidosPendientes = document.getElementById('pedidos-pendientes').children;

[...pedidosPendientes].forEach((pedidoPendiente) => {
  pedidoPendiente.addEventListener('click', () => {
    localStorage.setItem('pedidoId', pedidoPendiente.querySelector('.id-pedido').value);
    location.href = 'pedidos';
  });
});
