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
            <input
              class='bg-fondo txt-fondo-alternativo cuerpo-mediano'
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
        <button class='boton bg-primario txt-blanco boton-primario-rellenado boton-inicio-sesion' is='md-boton'>
          <span class='etiqueta-grande'>Iniciar sesión</span>
        </button>
      </form>
    </div>
    <div class='divisor'>
      <div class='divisor__texto'>
        <div class='linea'></div>
        <span class='cuerpo-chico'>¿No tienes una cuenta?</span>
        <div class='linea'></div>
      </div>
      <a class='boton bg-primario txt-blanco boton-primario-rellenado' is='md-enlace' href='registro.php'>
        <span class='etiqueta-grande'>Crear una cuenta</span>
      </a>
    </div>
  </main>
  <script type='module' src='js/inicio-sesion.js'></script>
</body>

</html>