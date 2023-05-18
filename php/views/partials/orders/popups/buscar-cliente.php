<?php
  require_once AUTOLOADER;

  use \controllers\Cliente;

  $vistaCliente = Cliente::vistaClienteConstructor();
  $clientes = $vistaCliente->mostrarClientes();
?>

<ventana-emergente id='buscar-cliente' data-no-pie>
  <wc-texto slot='cabecera-inicio' data-tipo-fuente='titulo-l'>
    Buscando un cliente
  </wc-texto>
  <boton-icono
      slot='cabecera-final'
      data-icono='close'
      data-color-texto='#ffffff'
      data-evento='cerrar'>
  </boton-icono>
  <wc-tabs data-no-cabecera>
    <?php require_once DIR_PARCIALES . '/customers/lista-clientes.php' ?>
    <contenedor-flex flex-direction='column' gap='var(--espaciado-grande)'>
      <contenedor-flex id='contenedor-datos-personales' gap='var(--espaciado-grande)' padding='var(--espaciado-jumbo)'>
        <contenedor-flex flex-direction='row' gap='var(--espaciado-chico)'align-items='center'>
          <boton-icono
              data-icono='arrow_back'
              data-evento='regresar'
              data-color-texto='var(--clr-secundario-40)'>
          </boton-icono>
          <wc-texto data-tipo-fuente="titulo-l">Datos personales</wc-texto>
        </contenedor-flex>
        <info-detalles id='info-cliente-popup'></info-detalles>
        <input id='id-cliente-popup' type='hidden'>
      </contenedor-flex>
      <contenedor-flex flex-direction='row' justify-content='flex-end'>
        <boton-rellenado
            data-evento='seleccionarcliente'
            data-color-fondo='var(--clr-primario-40)'
            data-color-texto='#ffffff'
            data-etiqueta='Seleccionar cliente'
            data-variante='texto-icono'
            data-icono='done'>
        </boton-rellenado>
      </contenedor-flex>
    </contenedor-flex>
  </wc-tabs>
</ventana-emergente>
