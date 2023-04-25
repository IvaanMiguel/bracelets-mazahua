<?php require_once COMPROBAR_SESION ?>

<!DOCTYPE html>
<html lang='es'>

<head>
  <?php  require_once HEAD_TAGS ?>

  <link rel='stylesheet' href='css/estilos.css'>
  <link rel='stylesheet' href='css/formularios-usuario.css'>

  <script type='module' src='components/campo-texto.js'></script>
  <script type='module' src='components/campo-clave.js'></script>
  <script type='module' src='components/wc-emergente.js'></script>
  <script type='module' src='components/boton-icono.js'></script>
</head>
<body>
  <main class='contenedor'>
    <div class='contenido'>
      <img class='contenido__logo' src='images/logo.png' alt='Logo de Bracelets Mazahua'>
      <form class='formulario'>
        <h2 class='titulo-grande'>Iniciar sesión</h2>
        <div class='campos'>
          <campo-texto>
            <span slot='etiqueta'>Nombre de usuario o dirección de email</span>
            <input
                slot='campo'
                type='text'
                name='idUsuario'
                value=<?= ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nombreUsuario'])) ? $_GET['nombreUsuario'] : '' ?>>
          </campo-texto>
          <campo-clave>
            <span slot='etiqueta'>Contraseña</span>
            <input slot='campo' type='password' name='clave'>
            <md-icono slot='icono-visibilidad' data-icono='visibility' data-opsz='22' data-escala='l' data-cursor></md-icono>
          </campo-clave>
        </div>
        <boton-rellenado
            data-color-fondo='var(--clr-primario-40)'
            data-color-texto='#ffffff'
            data-etiqueta='Iniciar sesión'
            data-evento='iniciarsesion'
            type='button'>
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
      <boton-rellenado
          data-color-fondo='var(--clr-primario-40)'
          data-color-texto='#ffffff'
          data-etiqueta='Crear una cuenta'
          href=<?= URL_REGISTRARSE ?>>
      </boton-rellenado>
    </div>
  </main>
  <script type='module' src='js/iniciar-sesion.js'></script>
</body>
</html>
