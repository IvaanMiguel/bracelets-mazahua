const enlazarTabs = (radioContenedor, tabsId) => {
  const tabs = document.body.querySelector(tabsId);
  const contenedor = document.body.querySelector(radioContenedor);

  [...contenedor.children].forEach((item, i) => {
    item.querySelector('input').addEventListener('change', () => {
      tabs.seleccionarTab(i + 1);
    });
  });
};

enlazarTabs('#tipos-entrega', '#entrega-tabs');
enlazarTabs('#agregar-pedido .tipos-pago', '#agregar-pedido .pago-tabs');
