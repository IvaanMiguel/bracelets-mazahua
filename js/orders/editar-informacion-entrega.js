import datosEntregaPopup from './controllers/popups/datos-entrega.js';

datosEntregaPopup.inicializar();
const ventana = datosEntregaPopup.ventana;

document.addEventListener('editardatosentrega', () => ventana.mostrarVentana());
ventana.addEventListener('cerrar', () => ventana.cerrarVentana());

ventana.addEventListener('actualizardatosentrega', () => {
  const formData = new FormData();
  console.log('Hola');
});
