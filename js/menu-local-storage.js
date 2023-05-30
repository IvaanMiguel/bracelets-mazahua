const menuLateral = document.body.querySelector('menu-lateral');
const menuColapsado = localStorage.getItem('menuColapsado');

if (menuColapsado) {
  menuLateral.dataRetraido = true;
} else {
  menuLateral.dataRetraido = false;
}

document.addEventListener('alternarmenu', () => {
  localStorage.setItem('menuColapsado', menuLateral.dataRetraido);
  menuLateral.dataRetraido = menuColapsado;
});
