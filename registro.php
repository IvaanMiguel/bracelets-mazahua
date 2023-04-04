<!DOCTYPE html>
<html lang='es'>

<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>

  <!-- Roboto Google Fonts -->
  <link rel='preconnect' href='https://fonts.googleapis.com'>
  <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
  <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap' rel='stylesheet'>

  <!-- Material Design Google Icons -->
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200' />

  <link rel='stylesheet' href='css/global.css'>
  <link rel='stylesheet' href='css/estilos.css'>
  <link rel='stylesheet' href='css/formularios-usuario.css'>

  
  <title>Bracelets Mazahua</title>

  <script defer type='module' src='components/md-boton/md-boton.js'></script>
  <script defer type='module' src='components/md-enlace/md-enlace.js'></script>
  <script defer type='module' src='components/md-icono/md-icono.js'></script>
  <script defer type='module' src='components/icono-emergente/icono-emergente.js'></script>
  <script defer type='module' src='components/campo-texto/campo-texto.js'></script>
  <script defer type='module' src='components/campo-clave/campo-clave.js'></script>
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
        <button class='boton bg-primario txt-blanco boton-primario-rellenado boton-registro' is='md-boton'>
          <span class='etiqueta-grande'>Crear cuenta</span>
        </button>
      </form>
    </div>
    <div class='divisor'>
      <div class='divisor__texto'>
        <div class='linea'></div>
        <span class='cuerpo-chico'>Ya tienes una cuenta?</span>
        <div class='linea'></div>
      </div>
      <a class='boton bg-primario txt-blanco boton-primario-rellenado' href='inicio-sesion.php' is='md-enlace'>
        <span class='etiqueta-grande'>Iniciar sesión</span>
      </a>
    </div>
  </main>
  <script type='module' src='js/registro.js'></script>
</body>

</html>