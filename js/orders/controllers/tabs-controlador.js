const enlazarTabs = (radioContenedor, tabsId) => {
  const tabs = document.getElementById(tabsId);
  const contenedor = document.getElementById(radioContenedor);

  [...contenedor.children].forEach((item, i) => {
    item.querySelector('input').addEventListener('change', () => {
      tabs.seleccionarTab(i + 1);
    });
  });
};

enlazarTabs('tipos-entrega', 'entrega-tabs');
enlazarTabs('tipos-pago', 'pago-tabs');
