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
  switch (formData.get('tipoEntrega')) {
    case 'Pick up':
      obtenerFormularioEntradas(formData, document.getElementById('entrega-pick-up'));
      break;

    case 'Domicilio':
      obtenerFormularioEntradas(formData, document.getElementById('entrega-domicilio'));
      break;

    case 'Aplicación':
      obtenerFormularioEntradas(formData, document.getElementById('entrega-aplicacion'));
      break;
  }
};

const obtenerFormData = () => {
  const formData = new FormData();
  formData.append('idCliente', document.getElementById('id-cliente').value);
  formData.append('productos', JSON.stringify(obtenerProductos()));

  obtenerFormularioEntradas(formData, document.getElementById('tipos-entrega'));
  obtenerTipoEntrega(formData);

  return formData;
};

export default obtenerFormData;
