<?php require_once COMPROBAR_SESION ?>

<!DOCTYPE html>
<html lang='es'>
<head>
  <?php require_once HEAD_TAGS ?>

  <link rel='stylesheet' href='css/estilos.css'>
  <link rel='stylesheet' href='css/formularios-usuario.css'>

  <script defer type='module' src='components/md-boton/md-boton.js'></script>
  <script defer type='module' src='components/md-enlace/md-enlace.js'></script>
  <script defer type='module' src='components/md-icono/md-icono.js'></script>
  <script defer type='module' src='components/icono-emergente/icono-emergente.js'></script>
  <script defer type='module' src='components/campo-texto/campo-texto.js'></script>
  <script defer type='module' src='components/campo-clave/campo-clave.js'></script>
  <script type='module' src='components/boton-rellenado.js'></script>
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
              <span class='cuerpo-mediano' slot='etiqueta-texto'>Nombre de usuario</span>
              <icono-emergente class='icono-chico' slot='etiqueta-icono' data-icono='help'
                data-mensaje='Debe tener mínimo 4 caracteres y máximo 15 caracteres.&#xa;Solo puede contener letras y números.'>
              </icono-emergente>
              <input class='bg-fondo txt-fondo-alternativo cuerpo-mediano' slot='campo' type='text' name='nombreUsuario'>
            </campo-texto>
          </div>
          <div class='campo'>
            <campo-texto>
              <span class='cuerpo-mediano' slot='etiqueta-texto'>Dirección de email</span>
              <input class='bg-fondo txt-fondo-alternativo cuerpo-mediano' slot='campo' type='text' name='email'>
            </campo-texto>
          </div>
          <div class='campo'>
            <campo-clave>
              <span class='cuerpo-mediano' slot='etiqueta-texto'>Contraseña</span>
              <icono-emergente class='icono-chico' slot='etiqueta-icono' data-icono='help'
                data-mensaje='Debe tener mínimo 8 caracteres y máximo 20 caracteres.&#xa;Debe contener al menos una letra mayúscula y un número.'>
              </icono-emergente>
              <input class='padding-derecho bg-fondo txt-fondo-alternativo cuerpo-mediano' slot='campo' type='password' name='clave'>
              <md-icono class='icono-mediano cursor-pointer' slot='icono-visibilidad' data-icono='visibility'></md-icono>
            </campo-clave>
          </div>
          <div class='campo'>
            <campo-clave>
              <span class='cuerpo-mediano' slot='etiqueta-texto'>Vuelve a escribir la contraseña</span>
              <input class='bg-fondo txt-primario-alternativo cuerpo-mediano' slot='campo' type='password' name='claveVerificacion'>
            </campo-clave>
          </div>
        </div>
        <boton-rellenado data-color-fondo='var(--clr-primario-40)' data-color-texto='#ffffff' type='button' data-evento='registrarusuario'>
          <span slot='etiqueta'>Crear cuenta</span>
        </boton-rellenado>
      </form>
    </div>
    <div class='divisor'>
      <div class='divisor__texto'>
        <div class='linea'></div>
        <span class='cuerpo-chico'>Ya tienes una cuenta?</span>
        <div class='linea'></div>
      </div>
      <a class='boton bg-primario txt-blanco boton-primario-rellenado' href=<?= URL_INICIAR_SESION ?> is='md-enlace'>
        <span class='etiqueta-grande'>Iniciar sesión</span>
      </a>
    </div>
  </main>
  <script type='module' src='js/registrar-usuario.js'></script>
</body>
</html>
