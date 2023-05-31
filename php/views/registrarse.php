<?php require_once COMPROBAR_SESION ?>

<!DOCTYPE html>
<html lang='es'>
<head>
  <?php require_once HEAD_TAGS ?>

  <link rel='stylesheet' href='css/formularios-usuario.css'>

  <script type='module' src='components/campo-texto.js'></script>
  <script type='module' src='components/campo-clave.js'></script>
  <script type='module' src='components/wc-emergente.js'></script>
</head>
<body>
  <main class='contenedor'>
    <div>
      <img class='contenido__logo' src='images/logo.png' alt='Bracelets Mazahua'>
      <form class='formulario'>
        <wc-texto data-tipo-fuente='titulo-l'>Crear cuenta</wc-texto>
        <contenedor-flex id='campos' flex-direction='column' gap='var(--espaciado-grande)'>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Nombre de usuario</wc-texto>
            <wc-emergente slot='etiqueta'
                data-mensaje='Debe tener mínimo 4 caracteres y máximo 15 caracteres.&#xa;Solo puede contener letras y números.'>
              <md-icono data-icono='help' data-opsz='20' data-escala='m'></md-icono>
            </wc-emergente>
            <input name='nombreUsuario'>
          </campo-texto>
          <campo-texto>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Dirección de email</wc-texto>
            <input name='email'>
          </campo-texto>
          <campo-clave>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Contraseña</wc-texto>
            <wc-emergente slot='etiqueta'
                data-mensaje='Debe tener mínimo 8 caracteres y máximo 20 caracteres.&#xa;Debe contener al menos una letra mayúscula y un número.'>
              <md-icono data-icono='help' data-opsz='20' data-escala='m'></md-icono>
            </wc-emergente>
            <input slot='campo' type='password' name='clave'>
          </campo-clave>
          <campo-clave data-no-icono>
            <wc-texto slot='etiqueta' data-tipo-fuente='etiqueta-l'>Vuelve a escribir la contraseña</wc-texto>
            <input slot='campo' type='password' name='claveVerificacion'>
          </campo-clave>
        </contenedor-flex>
        <boton-rellenado
            class='margin-auto'
            data-color-fondo='var(--clr-primario-40)'
            data-color-texto='#ffffff'
            data-etiqueta='Crear cuenta'
            type='button'
            data-evento='registrarusuario'>
        </boton-rellenado>
      </form>
    </div>
    <contenedor-flex flex-direction='column' gap='var(--espaciado-mediano)'>
      <contenedor-flex flex-direction='row' gap='var(--espaciado-chico)' align-items='center'>
        <div class='linea'></div>
        <wc-texto data-tipo-fuente='cuerpo-s'>¿Ya tienes una cuenta?</wc-texto>
        <div class='linea'></div>
      </contenedor-flex>
      <boton-rellenado
          class='margin-auto'
          data-color-fondo='var(--clr-primario-40)'
          data-color-texto='#ffffff'
          data-etiqueta='Iniciar sesión'
          href=<?= URL_INICIAR_SESION ?>>
      </boton-rellenado>
    </contenedor-flex>
  </main>
  <script type='module' src='js/registrar-usuario.js'></script>
</body>
</html>
