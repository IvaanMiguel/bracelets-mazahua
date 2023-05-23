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

const clabe = document.body.querySelector('[name="clabeCuenta"]');
const tarjeta = document.body.querySelector('[name="numeroTarjeta"]');
const titular = document.body.querySelector('[name="titular"]');

/** @param {FormData} formData */
const obtenerTipoPago = (formData) => {
  switch (formData.get('tipoPago')) {
    case 'Depósito':
      formData.append('clabeCuenta', clabe.value);
      formData.append('detallesPago', `Cuenta que termina en ${clabe.value.replace(/\s/g, '').slice(-3, -1)}`);
      break;

    case 'Tarjeta':
      formData.append('numeroTarjeta', tarjeta.value);
      formData.append('titular', titular.value);

      formData.append('detallesPago', `Tarjeta que termina en ${tarjeta.value.replace(/\s/g, '').slice(-2)}`);
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
