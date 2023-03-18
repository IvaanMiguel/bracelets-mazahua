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
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200' />

    <link rel='stylesheet' href='css/global.css'>
    <link rel='stylesheet' href='css/estilos.css'>
    <link rel='stylesheet' href='css/formularios-usuario.css'>

    <script src='components/md-boton/md-boton.js' type='module' defer></script>
    <script src='components/md-enlace/md-enlace.js' type='module' defer></script>
    <script src='components/campo-texto/campo-texto.js' type='module' defer></script>

    <title>Bracelets Mazahua</title>
</head>
<body>
    <main class='contenedor'>
        <div class='contenido'>
            <img class='contenido__logo' src='images/logo.png' alt='Bracelets Mazahua'>
            <form class='formulario'>
                <h2 class='titulo-grande'>Iniciar sesión</h2>
                <div class='campos'>
                    <campo-texto data-clase-etiqueta='etiqueta'>
                        <span class='cuerpo-mediano' slot='etiqueta-texto'>Nombre de usuario o dirección de email</span>
                        <input
                            class='fondo fondo-2-texto cuerpo-mediano'
                            slot='campo'
                            type='text'
                            value='<?= ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nombreUsuario'])) ? $_GET['nombreUsuario'] : '' ?>'
                            name='idUsuario'>
                    </campo-texto>
                    <label class='input'>
                        <span class='cuerpo-mediano'>Contraseña</span>
                        <div class='input-clave'>
                            <input class='input__campo campo--clave cuerpo-mediano fondo fondo-2-texto' type='password' name='clave'>
                            <span class='material-symbols-outlined icono icono-visibilidad icono-mediano icono--absolute' title='Mostrar contraseña'>visibility</span>
                        </div>
                    </label>
                </div>
                <button class='boton boton-inicio-sesion primario primario-2-texto boton--active-primario' is='md-boton'>
                    <span class='etiqueta-grande'>Iniciar sesión</span>
                </button>
            </form>
        </div>
        <div class='divisor'>
            <div class='divisor__texto'>
                <div class='linea'></div>
                <span class='texto cuerpo-chico'>¿No tienes una cuenta?</span>
                <div class='linea'></div>
            </div>
            <a class='boton primario primario-2-texto boton--active-primario' is='md-enlace' href='registro.php'>
                <span class='etiqueta-grande'>Crear una cuenta</span>
            </a>
        </div>
    </main>
    <script src='js/classes/notificacion.class.js'></script>
    <script src='js/inicio-sesion.js'></script>
</body>
</html>
