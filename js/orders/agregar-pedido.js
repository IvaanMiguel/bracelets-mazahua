import obtenerFormData from './obtener-form-data.js';

document.addEventListener('hacerpedido', () => {
  fetch('php/includes/orders/agregar_pedido.inc.php', {
    method: 'POST',
    body: obtenerFormData()
  });
});
