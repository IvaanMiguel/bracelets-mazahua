<?php require_once COMPROBAR_SESION ?>

<!DOCTYPE html>
<html lang='es'>

<head>
  <?php  require_once HEAD_TAGS ?>

  <link rel='stylesheet' href='css/formularios-usuario.css'>

  <script type='module' src='components/campo-texto.js'></script>
  <script type='module' src='components/campo-clave.js'></script>
  <script type='module' src='components/wc-emergente.js'></script>
  <script type='module' src='components/boton-icono.js'></script>
</head>
<body>
  <main class='contenedor'>
    <div>
      <img class='contenido__logo' src='images/logo.png' alt='Logo de Bracelets Mazahua'>
      <form class='formulario'>
        <wc-texto data-tipo-fuente='titulo-l'>Iniciar sesión</wc-texto>
        <contenedor-flex flex-direction='column' gap='var(--espaciado-grande)'>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>
              Nombre de usuario o dirección de email
            </wc-texto>
            <input
                name='idUsuario'
                value=<?= ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nombreUsuario'])) ? $_GET['nombreUsuario'] : '' ?>>
          </campo-texto>
          <campo-clave>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Contraseña</wc-texto>
            <input slot='campo' type='password' name='clave'>
          </campo-clave>
        </contenedor-flex>
        <boton-rellenado
            class='margin-auto'
            data-color-fondo='var(--clr-primario-40)'
            data-color-texto='#ffffff'
            data-etiqueta='Iniciar sesión'
            data-evento='iniciarsesion'
            type='button'>
        </boton-rellenado>
      </form>
    </div>
    <contenedor-flex flex-direction='column' gap='var(--espaciado-mediano)'>
      <contenedor-flex flex-direction='row' gap='var(--espaciado-chico)' align-items='center'>
        <div class='linea'></div>
        <wc-texto data-tipo-fuente='cuerpo-s'>¿No tienes una cuenta?</wc-texto>
        <div class='linea'></div>
      </contenedor-flex>
      <boton-rellenado
          class='margin-auto'
          data-color-fondo='var(--clr-primario-40)'
          data-color-texto='#ffffff'
          data-etiqueta='Crear una cuenta'
          href=<?= URL_REGISTRARSE ?>>
      </boton-rellenado>
    </contenedor-flex>
  </main>
  <script type='module' src='js/iniciar-sesion.js'></script>
</body>
</html>
