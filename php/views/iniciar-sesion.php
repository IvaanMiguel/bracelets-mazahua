<?php require_once COMPROBAR_SESION ?>

<!DOCTYPE html>
<html lang='es'>

<head>
  <?php  require_once HEAD_TAGS ?>

  <link rel='stylesheet' href='css/estilos.css'>
  <link rel='stylesheet' href='css/formularios-usuario.css'>

  <script defer type='module' src='components/md-icono/md-icono.js'></script>
  <script defer type='module' src='components/md-boton/md-boton.js'></script>
  <script defer type='module' src='components/md-enlace/md-enlace.js'></script>
  <script defer type='module' src='components/campo-texto/campo-texto.js'></script>
  <script defer type='module' src='components/campo-clave/campo-clave.js'></script>
</head>
<body>
  <main class='contenedor'>
    <div class='contenido'>
      <img class='contenido__logo' src='images/logo.png' alt='Logo de Bracelets Mazahua'>
      <form class='formulario'>
        <h2 class='titulo-grande'>Iniciar sesión</h2>
        <div class='campos'>
          <campo-texto>
            <span class='cuerpo-mediano' slot='etiqueta-texto'>Nombre de usuario o dirección de email</span>
            <input class='bg-fondo txt-fondo-alternativo cuerpo-mediano'
              slot='campo'
              type='text'
              value='<?= ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nombreUsuario'])) ? $_GET['nombreUsuario'] : '' ?>'
              name='idUsuario'>
          </campo-texto>
          <campo-clave>
            <span class='cuerpo-mediano' slot='etiqueta-texto'>Contraseña</span>
            <input class='bg-fondo txt-fondo-alternativo cuerpo-mediano padding-derecho' slot='campo' type='password' name='clave'>
            <md-icono class='icono-mediano cursor-pointer' slot='icono-visibilidad' data-icono='visibility'></md-icono>
          </campo-clave>
        </div>
        <boton-rellenado data-color-fondo='var(--clr-primario-40)' data-color-texto='#ffffff' data-evento='iniciarsesion' type='button'>
          <span slot='etiqueta'>Iniciar sesión</span>
        </boton-rellenado>
      </form>
    </div>
    <div class='divisor'>
      <div class='divisor__texto'>
        <div class='linea'></div>
        <span class='cuerpo-chico'>¿No tienes una cuenta?</span>
        <div class='linea'></div>
      </div>
      <a class='boton bg-primario txt-blanco boton-primario-rellenado' is='md-enlace' href=<?= URL_REGISTRARSE ?>>
        <span class='etiqueta-grande'>Crear una cuenta</span>
      </a>
    </div>
  </main>
  <script type='module' src='js/iniciar-sesion.js'></script>
</body>
</html>
