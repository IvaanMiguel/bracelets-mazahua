<contenedor-flex class='cabecera' align-items='center' justify-content='space-between' padding='var(--espaciado-jumbo)'>
  <wc-texto data-tipo-fuente='titulo-l'>Bracelets Mazahua</wc-texto>
  <wc-texto data-tipo-fuente='titulo-m'>
    <?= isset($_SESSION['nombreUsuario']) ? $_SESSION['nombreUsuario'] : ''; ?>
  </wc-texto>
</contenedor-flex>
