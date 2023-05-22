import productosAgregados from './controllers/lista-productos-agregados.js';

const obtenerProductos = () => {
  const productos = [];
  const productosSeleccionados = productosAgregados.productos;

  for (const producto in productosSeleccionados) {
    productos.push({
      id: productosSeleccionados[producto].id,
      cantidad: +productosSeleccionados[producto].cantidad
    });
  }

  return productos;
};

/**
 * @param {FormData} formDataOrigen
 * @param {HTMLFormElement} formulario
 */
const obtenerFormularioEntradas = (formDataOrigen, formulario) => {
  const formData = new FormData(formulario);

  for (const [k, v] of formData) formDataOrigen.append(k, v);
};

/** @param {FormData} formData */
const obtenerTipoEntrega = (formData) => {
  let formulario;

  switch (formData.get('tipoEntrega')) {
    case 'Pick up':
      formulario = document.getElementById('entrega-pick-up');
      break;

    case 'Domicilio':
      formulario = document.getElementById('entrega-domicilio');
      break;

    case 'Aplicación':
      formulario = document.getElementById('entrega-aplicacion');
      break;
  }

  obtenerFormularioEntradas(formData, formulario);
};

/** @param {FormData} formData */
const obtenerTipoPago = (formData) => {
  switch (formData.get('tipoPago')) {
    case 'Depósito':
      formData.append('detallesPago', 'Depósito a cuenta bancaria.');
      break;

    case 'Tarjeta':
      formData.append('detallesPago', 'Pago con tarjeta que termina en...');
      break;
  }
};

const obtenerFormData = () => {
  const formData = new FormData();
  formData.append('idCliente', document.getElementById('id-cliente').value);
  formData.append('productos', JSON.stringify(obtenerProductos()));

  obtenerFormularioEntradas(formData, document.getElementById('tipos-entrega'));
  obtenerTipoEntrega(formData);

  obtenerFormularioEntradas(formData, document.getElementById('tipos-pago'));
  obtenerTipoPago(formData);

  return formData;
};

export default obtenerFormData;
