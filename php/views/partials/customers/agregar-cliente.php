<link rel='stylesheet' href='css/sections/customers/agregar-cliente.css'>
<form>
  <div class='formulario-contenedor'>
    <h1 class='titulo-grande'>Datos personales</h1>
    <div class='campos'>
      <campo-texto>
        <span class='etiqueta-grande' slot='etiqueta-texto'>Nombre(s)</span>
        <input class='bg-fondo txt-fondo-alternativo cuerpo-mediano' type='text' slot='campo' name='nombre'>
      </campo-texto>
      <div class='campos-horizontal'>
        <campo-texto>
          <span class='etiqueta-grande' slot='etiqueta-texto'>Apellido paterno</span>
          <input class='bg-fondo txt-fondo-alternativo cuerpo-mediano' type='text' slot='campo' name='apellidoPaterno'>
        </campo-texto>
        <campo-texto>
          <span class='etiqueta-grande' slot='etiqueta-texto'>Apellido materno</span>
          <input class='bg-fondo txt-fondo-alternativo cuerpo-mediano' type='text' slot='campo' name='apellidoMaterno'>
        </campo-texto>
      </div>
      <campo-texto>
        <span class='etiqueta-grande' slot='etiqueta-texto'>Dirección de email</span>
        <input class='bg-fondo txt-fondo-alternativo cuerpo-mediano' type='text' slot='campo' name='email'>
      </campo-texto>
      <div class='campos-horizontal'>
        <campo-texto>
          <span class='etiqueta-grande' slot='etiqueta-texto'>Número de celular</span>
          <input class='bg-fondo txt-fondo-alternativo cuerpo-mediano' type='text' slot='campo' name='celular'>
        </campo-texto>
        <campo-texto>
          <span class='etiqueta-grande' slot='etiqueta-texto'>Edad</span>
          <input class='bg-fondo txt-fondo-alternativo cuerpo-mediano' type='number' slot='campo' name='edad'>
        </campo-texto>
      </div>
    </div>
  </div>
  <div class='formulario-contenedor'>
    <h1 class='titulo-grande'>Ubicaciones</h1>
    <div class='campos'>
      <campo-texto>
        <span class='etiqueta-grande' slot='etiqueta-texto'>Calle Principal</span>
        <input class='bg-fondo txt-fondo-alternativo cuerpo-mediano' type='text' slot='campo'>
      </campo-texto>
      <campo-texto>
        <span class='etiqueta-grande' slot='etiqueta-texto'>Calle(s) adyacente(s)</span>
        <input class='bg-fondo txt-fondo-alternativo cuerpo-mediano' type='text' slot='campo'>
      </campo-texto>
      <campo-texto>
        <span class='etiqueta-grande' slot='etiqueta-texto'>Colonia</span>
        <input class='bg-fondo txt-fondo-alternativo cuerpo-mediano' type='text' slot='campo'>
      </campo-texto>
      <div class='campos-horizontal'>
        <campo-texto>
          <span class='etiqueta-grande' slot='etiqueta-texto'>Número exterior</span>
          <input class='bg-fondo txt-fondo-alternativo cuerpo-mediano' type='number' slot='campo'>
        </campo-texto>
        <campo-texto>
          <span class='etiqueta-grande' slot='etiqueta-texto'>Número interior</span>
          <input class='bg-fondo txt-fondo-alternativo cuerpo-mediano' type='number' slot='campo'>
        </campo-texto>
        <campo-texto>
          <span class='etiqueta-grande' slot='etiqueta-texto'>Código postal</span>
          <input class='bg-fondo txt-fondo-alternativo cuerpo-mediano' type='number' slot='campo'>
        </campo-texto>
      </div>
      <wc-colapsable>
        <div class='bg-terciario-contenedor txt-terciario-contenedor-alternativo cabecera-pequeña' slot='cabecera'>
          <span class='titulo-mediano'>Ubicaciones añadidas</span>
          <md-icono data-icono='expand_less' data-opsz='24'></md-icono>
        </div>
        <lista-controlador slot='lista-elemento'>
          <item-divisor>
            <item-removible>
              <span slot='info'>Elemento 1</span>
              <span slot='info'>Item 1</span>
              <boton-texto slot='boton-remover' data-color-texto='var(--clr-error-40)' data-evento='confirmarremoverubicacion' type='button'>
                <md-icono slot='icono' data-icono='delete' data-opsz='24'></md-icono>
              </boton-texto>
            </item-removible>
          </item-divisor>
          <item-divisor>
            <item-removible>
              <span slot='info'>Elemento 1</span>
              <span slot='info'>Item 1</span>
              <boton-texto slot='boton-remover' data-color-texto='var(--clr-error-40)' data-evento='confirmarremoverubicacion' type='button'>
                <md-icono slot='icono' data-icono='delete' data-opsz='24'></md-icono>
              </boton-texto>
            </item-removible>
          </item-divisor>
          <item-divisor>
            <item-removible>
              <span slot='info'>Elemento 1</span>
              <span slot='info'>Item 1</span>
              <boton-texto slot='boton-remover' data-color-texto='var(--clr-error-40)' data-evento='confirmarremoverubicacion' type='button'>
                <md-icono slot='icono' data-icono='delete' data-opsz='24'></md-icono>
              </boton-texto>
            </item-removible>
          </item-divisor>
        </lista-controlador>
      </wc-colapsable>
    </div>
    <button class='boton boton--icono-texto boton-secundario-contenedor-tonal bg-secundario-contenedor txt-secundario-contenedor-alternativo' is='md-boton' type='button' style='width: min-content;'>
      <md-icono class='icono-chico' data-icono='add_location' data-opsz='20'></md-icono>
      <span class='etiqueta-grande'>Agregar ubicación</span>
    </button>
  </div>
  <button class='boton boton--icono-texto bg-primario txt-blanco boton-primario-rellenado' is='md-boton' style='width: min-content;'>
    <md-icono class='icono-chico' data-icono='save' data-opsz='20'></md-icono>
    <span class='etiqueta-grande'>Guardar cliente</span>
  </button>
</form>
