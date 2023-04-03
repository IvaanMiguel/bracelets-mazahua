<?php
class Respuesta
{
    public const URL = 0;
    public const ARRAY = 1;

    public const BD_ERROR = [
        'titulo' => 'Error',
        'mensaje' => 'Algo ha salido mal.',
        'ambito' => 'general',
    ];
    public const INICIO_SESION_FALLIDO = [
        'titulo' => 'Usuario o contraseña incorrectos',
        'mensaje' => 'El usuario o la contraseña ingresados son incorrectos.',
        'ambito' => 'general',
    ];
    public const CAMPO_VACIO = [
        'titulo' => 'Campos vacíos',
        'mensaje' => 'No se permiten campos vacíos.',
        'ambito' => 'general',
    ];
    public const CLAVES_DIFERENTES = [
        'titulo' => 'Contraseñas no coincidentes',
        'mensaje' => 'Las contraseñas ingresadas no coinciden.',
        'ambito' => 'general',
    ];
    public const USUARIO_EXISTENTE = [
        'titulo' => 'Usuario existente',
        'mensaje' => 'El nombre de usuario ingresado ya existe.',
        'ambito' => 'nombreUsuario',
    ];
    public const USUARIO_MUY_CORTO = [
        'titulo' => 'Nombre de usuario muy corto',
        'mensaje' => 'El nombre de usuario debe tener al menos ' . RegistroControlador::USUARIO_LONGITUD_MINIMA . ' caracteres.',
        'ambito' => 'nombreUsuario',
    ];
    public const USUARIO_MUY_LARGO = [
        'titulo' => 'Nombre de usuario muy largo',
        'mensaje' => 'El nombre de usuario debe ser de máximo ' . RegistroControlador::USUARIO_LONGITUD_MAXIMA . ' caracteres.',
        'ambito' => 'nombreUsuario',
    ];
    public const USUARIO_INVALIDO = [
        'titulo' => 'Nombre de usuario inválido.',
        'mensaje' => 'El nombre de usuario solo puede contener letras y números.',
        'ambito' => 'nombreUsuario',
    ];
    public const EMAIL_EXISTENTE = [
        'titulo' => 'Email existente',
        'mensaje' => 'La dirección de email ingresada ya existe.',
        'ambito' => 'email',
    ];
    public const EMAIL_INVALIDO = [
        'titulo' => 'Dirección de email no válida',
        'mensaje' => 'La dirección de email ingresada no es válida.',
        'ambito' => 'email',
    ];
    public const CLAVE_MUY_CORTA = [
        'titulo' => 'Contraseña muy corta',
        'mensaje' => 'La longitud de la contraseña debe ser de al menos ' . RegistroControlador::CLAVE_LONGITUD_MINIMA .' caracteres.',
        'ambito' => 'clave',
    ];
    public const CLAVE_MUY_LARGA = [
        'titulo' => 'Contraseña muy larga',
        'mensaje' => 'La longitud de la contraseña debe ser de máximo ' . RegistroControlador::CLAVE_LONGITUD_MAXIMA . ' caracteres.',
        'ambito' => 'clave',
    ];
    public const MAYUSCULA_FALTANTE = [
        'titulo' => 'Contraseña sin mayúscula',
        'mensaje' => 'La contraseña debe tener al menos una letra mayúscula.',
        'ambito' => 'clave',
    ];
    public const NUMERO_FALTANTE = [
        'titulo' => 'Contraseña sin número',
        'mensaje' => 'La contraseña debe tener al menos un número.',
        'ambito' => 'clave',
    ];

    private int $tipo;
    private array|string $contenido;

    public function __construct(int $tipo, array|string $contenido)
    {
        $this->tipo = $tipo;
        $this->contenido = $contenido;
    }

    // public function setRespuesta(string $tipo, array|string $contenido): void
    // {
    //     $this->tipo = $tipo;
    //     $this->contenido = $contenido;
    // }

    public function Json(): bool|string
    {
        return json_encode(get_object_vars($this));
    }
}
