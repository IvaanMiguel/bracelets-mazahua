<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <!-- Roboto Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Material Design Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel='stylesheet' href='css/global.css'>
    <link rel='stylesheet' href='css/estilos.css'>
    <link rel='stylesheet' href='css/formularios-usuario.css'>

    <script src='components/md-boton/md-boton.js' type='module' defer></script>
    <script src='components/md-enlace/md-enlace.js' type='module' defer></script>
    <!-- <script src='components/md-icono/md-icono.js' type='module' defer></script> -->
    <script src='components/icono-emergente/icono-emergente.js' type='module' defer></script>

    <title>Bracelets Mazahua</title>
</head>
<body>
    <main class='contenedor'>
        <div class='contenido'>
            <img class='contenido__logo' src='images/logo.png' alt='Bracelets Mazahua'>
            <form class='formulario'>
                <h2 class='titulo--grande'>Crear cuenta</h2>
                <div class='campos'>
                    <div class='campo'>
                        <label class='input'>
                            <div class='etiqueta'>
                                <span class='cuerpo-mediano'>Nombre de usuario</span>
                                <icono-emergente class='icono-chico' data-icono='help'>
                                    Debe tener mínimo 4 caracteres y máximo 15 caracteres.
                                    Solo puede contener letras y números.
                                </icono-emergente>
                                <!-- <span class="material-symbols-outlined ayuda ayuda-nombre icono icono-chico">help</span> -->
                                <!-- <md-icono data-icono='help'></md-icono> -->
                            </div>
                            <input class='input__campo fondo fondo-2-texto' type='text' name='nombreUsuario'>
                        </label>
                    </div>
                    <div class='campo'>
                        <label class='input'>
                            <span class='cuerpo-mediano'>Dirección de email</span>
                            <input class='input__campo fondo fondo-2-texto' type='text' name='email'>
                        </label>
                    </div>
                    <div class='campo'>
                        <label class='input'>
                            <div class='etiqueta'>
                                <span class='cuerpo-mediano'>Contraseña</span>
                                <span class="material-symbols-outlined ayuda ayuda-clave icono icono-chico">help</span>
                            </div>
                            <div class='input-clave'>
                                <input class='input__campo campo--clave fondo fondo-2-texto' type='password' name='clave'>
                                <span class="material-symbols-outlined icono icono-visibilidad icono-mediano icono--absolute" title='Mostrar contraseña'>visibility</span>
                            </div>
                        </label>
                    </div>
                    <div class='campo'>
                        <label class='input'>
                            <span class='cuerpo-mediano'>Vuelve a escribir la contraseña</span>
                            <input class='input__campo fondo fondo-2-texto' type='password' name='claveVerificacion'>
                        </label>
                    </div>
                </div>
                <button is='md-boton' class='boton-registro primario primario-2-texto boton--active-primario'>
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
            <a is='md-enlace' class='primario primario-2-texto boton--active-primario' href='inicio-sesion.php'>
                <span class='etiqueta-grande'>Iniciar sesión</span>
            </a>
        </div>
    </main>
    <script type='text/javascript' src='js/classes/notificacion.class.js'></script>
    <script type='text/javascript' src='js/classes/ayuda.class.js'></script>
    <script type='text/javascript' src='js/registro.js'></script>
</body>
</html>
