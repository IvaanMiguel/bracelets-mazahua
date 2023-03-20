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

  <script src='components/md-boton/md-boton.js' type='module' defer></script>
  <script src='components/md-enlace/md-enlace.js' type='module' defer></script>
  <script src='components/md-icono/md-icono.js' type='module' defer></script>
  <script src='components/icono-emergente/icono-emergente.js' type='module' defer></script>
  <script src='components/campo-texto/campo-texto.js' type='module' defer></script>
</head>

<body>
  <main class='contenedor'>
    <div class='contenido'>
      <img class='contenido__logo' src='images/logo.png' alt='Bracelets Mazahua'>
      <form class='formulario'>
        <h2 class='titulo--grande'>Crear cuenta</h2>
        <div class='campos'>
          <div class='campo'>
            <campo-texto data-clase-etiqueta='etiqueta'>
              <span class='cuerpo-mediano' slot='etiqueta-texto'>Nombre de usuario</span>
              <icono-emergente class='icono-chico' slot='etiqueta-icono' data-icono='help'
                data-mensaje='Debe tener mínimo 4 caracteres y máximo 15 caracteres.&#xa;Solo puede contener letras y números.'>
              </icono-emergente>
              <input class='fondo fondo-2-texto cuerpo-mediano' slot='campo' type='text' name='nombreUsuario'>
            </campo-texto>
          </div>
          <div class='campo'>
            <campo-texto data-clase-etiqueta='etiqueta'>
              <span class='cuerpo-mediano' slot='etiqueta-texto'>Dirección de email</span>
              <input class='fondo fondo-2-texto cuerpo-mediano' slot='campo' type='text' name='email'>
            </campo-texto>
          </div>
          <div class='campo'>
            <campo-texto data-clase-etiqueta='etiqueta' data-clase-campo='campo' data-tipo='clave'>
              <span class='cuerpo-mediano' slot='etiqueta-texto'>Contraseña</span>
              <icono-emergente class='icono-chico' slot='etiqueta-icono' data-icono='help'
                data-mensaje='Debe tener mínimo 8 caracteres y máximo 20 caracteres.&#xa;Debe contener al menos una letra mayúscula y un número.'>
              </icono-emergente>
              <input class='padding-derecho fondo fondo-2-texto cuerpo-mediano' slot='campo' type='password' name='clave'>
              <md-icono class='icono-mediano cursor-pointer' slot='icono-visibilidad' data-icono='visibility'></md-icono>
            </campo-texto>
          </div>
          <div class='campo'>
            <campo-texto data-clase-etiqueta='etiqueta'>
              <span class='cuerpo-mediano' slot='etiqueta-texto'>Vuelve a escribir la contraseña</span>
              <input class='fondo fondo-2-texto cuerpo-mediano' slot='campo' type='password' name='claveVerificacion'>
            </campo-texto>
          </div>
        </div>
        <button class='boton primario primario-2-texto boton--active-primario boton-registro' is='md-boton'>
          <span class='etiqueta-grande'>Crear cuenta</span>
        </button>
      </form>
    </div>
    <div class='divisor'>
      <div class='divisor__texto'>
        <div class='linea'></div>
        <span class='texto cuerpo-chico'>Ya tienes una cuenta?</span>
        <div class='linea'></div>
      </div>
      <a class='boton primario primario-2-texto boton--active-primario' href='inicio-sesion.php' is='md-enlace'>
        <span class='etiqueta-grande'>Iniciar sesión</span>
      </a>
    </div>
  </main>
  <script type='text/javascript' src='js/classes/notificacion.class.js'></script>
  <script type='text/javascript' src='js/registro.js'></script>
</body>

</html>