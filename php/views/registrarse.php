<?php require_once COMPROBAR_SESION ?>

<!DOCTYPE html>
<html lang='es'>
<head>
  <?php require_once HEAD_TAGS ?>

  <link rel='stylesheet' href='css/estilos.css'>
  <link rel='stylesheet' href='css/formularios-usuario.css'>

  <script type='module' src='components/campo-texto.js'></script>
  <script type='module' src='components/campo-clave.js'></script>
  <script type='module' src='components/wc-emergente.js'></script>
</head>
<body>
  <main class='contenedor'>
    <div class='contenido'>
      <img class='contenido__logo' src='images/logo.png' alt='Bracelets Mazahua'>
      <form class='formulario'>
        <h2 class='titulo-grande'>Crear cuenta</h2>
        <div class='campos'>
          <div class='campo'>
            <campo-texto>
              <span slot='etiqueta'>Nombre de usuario</span>
              <wc-emergente slot='etiqueta'
                  data-mensaje='Debe tener mínimo 4 caracteres y máximo 15 caracteres.&#xa;Solo puede contener letras y números.'>
                <md-icono data-icono='help' data-opsz='20' data-escala='m'></md-icono>
              </wc-emergente>
              <input slot='campo' type='text' name='nombreUsuario'>
            </campo-texto>
          </div>
          <div class='campo'>
            <campo-texto>
              <span slot='etiqueta'>Dirección de email</span>
              <input slot='campo' type='text' name='email'>
            </campo-texto>
          </div>
          <div class='campo'>
            <campo-clave>
              <span slot='etiqueta'>Contraseña</span>
              <wc-emergente slot='etiqueta'
                  data-mensaje='Debe tener mínimo 8 caracteres y máximo 20 caracteres.&#xa;Debe contener al menos una letra mayúscula y un número.'>
                <md-icono data-icono='help' data-opsz='20' data-escala='m'></md-icono>
              </wc-emergente>
              <input slot='campo' type='password' name='clave'>
              <md-icono slot='icono-visibilidad' data-icono='visibility' data-opsz='22' data-escala='l' data-cursor></md-icono>
            </campo-clave>
          </div>
          <div class='campo'>
            <campo-clave>
              <span slot='etiqueta'>Vuelve a escribir la contraseña</span>
              <input slot='campo' type='password' name='claveVerificacion'>
            </campo-clave>
          </div>
        </div>
        <boton-rellenado
            data-color-fondo='var(--clr-primario-40)'
            data-color-texto='#ffffff'
            data-etiqueta='Crear cuenta'
            type='button'
            data-evento='registrarusuario'>
        </boton-rellenado>
      </form>
    </div>
    <div class='divisor'>
      <div class='divisor__texto'>
        <div class='linea'></div>
        <span class='cuerpo-chico'>Ya tienes una cuenta?</span>
        <div class='linea'></div>
      </div>
      <boton-rellenado
          data-color-fondo='var(--clr-primario-40)'
          data-color-texto='#ffffff'
          href=<?= URL_INICIAR_SESION ?>
          data-etiqueta='Iniciar sesión'>
      </boton-rellenado>
    </div>
  </main>
  <script type='module' src='js/registrar-usuario.js'></script>
</body>
</html>
