const menuLateral = document.body.querySelector('menu-lateral');
const menuBotones = menuLateral.querySelectorAll('[href], [data-evento="confirmarcierresesion"]');
const menuColapsado = localStorage.getItem('menuColapsado');

menuLateral.toggleAttribute('data-retraido', menuColapsado === 'true');

document.addEventListener('alternarmenu', () => {
  localStorage.setItem('menuColapsado', menuLateral.hasAttribute('data-retraido'));
  actualizarBotones();
});

const actualizarBotones = () => {
  menuBotones.forEach((boton) => {
    boton.setAttribute('data-variante', menuLateral.hasAttribute('data-retraido') ? 'icono' : 'texto-icono');
  });
};

actualizarBotones();
