<?php

namespace controllers;

use \classes\Respuesta;

require_once dirname(__DIR__) . '/constantes.php';
require_once UTILS;

class Cliente extends \models\Cliente
{
  public const CAMPOS_VACIOS  = [
    'titulo' => 'Campos vacíos',
    'mensaje' => 'Aún hay campos obligatorios vacíos.',
    'id' => 'campos-datos-personales',
    'ambito' => ''
  ];

  public const NOMBRE_CORTO = [
    'titulo' => 'Nombre muy corto',
    'mensaje' => 'El nombre debe tener como mínimo ' . self::NOMBRE_MIN_LONGITUD . ' caracteres.',
    'ambito' => 'nombre'
  ];

  public const NOMBRE_LARGO = [
    'titulo' => 'Nombre muy largo',
    'mensaje' => 'El nombre debe tener como máximo ' . self::NOMBRE_MAX_LONGITUD . ' caracteres.',
    'ambito' => 'nombre'
  ];

  public const NOMBRE_INVALIDO = [
    'titulo' => 'Nombre del cliente inválido',
    'mensaje' => 'El nombre del cliente solo debe contener letras y espacios.',
    'ambito' => 'nombre'
  ];

  public const APELLIDOS_CORTOS = [
    'titulo' => 'Apellidos muy cortos',
    'mensaje' => 'Los apellidos deben tener como mínimo ' . self::APELLIDOS_MIN_LONGITUD . ' caracteres.',
    'ambito' => 'apellidos'
  ];

  public const APELLIDOS_LARGOS = [
    'titulo' => 'Apellidos muy largos',
    'mensaje' => 'Los apellidos deben tener como máximo ' . self::APELLIDOS_MAX_LONGITUD . ' caracteres.',
    'ambito' => 'apellidos'
  ];

  public const APELLIDOS_INVALIDOS = [
    'titulo' => 'Apellidos del cliente inválidos',
    'mensaje' => 'Los apellidos solo deben contener letras y espacios.',
    'ambito' => 'apellidos'
  ];

  public const CELULAR_LONGITUD_INVALIDA = [
    'titulo' => 'Celular del cliente inválido',
    'mensaje' => 'El celular debe tener como mínimo ' . self::CELULAR_LONGITUD . ' números.',
    'ambito' => 'celular'
  ];

  public const CELULAR_INVALIDO = [
    'titulo' => 'Celular del cliente inválido',
    'mensaje' => 'El celular ingresado no es válido.',
    'ambito' => 'celular'
  ];

  public const EDAD_MUY_JOVEN = [
    'titulo' => 'Edad no válida',
    'mensaje' => 'La edad no puede ser menor a ' . self::EDAD_MINIMA . ' año.',
    'ambito' => 'edad'
  ];

  public const EDAD_MUY_VIEJO = [
    'titulo' => 'Edad no válida',
    'mensaje' => 'La edad no puede ser mayor a ' . self::EDAD_MAXIMA . ' años.',
    'ambito' => 'edad'
  ];

  public const EDAD_INVALIDA = [
    'titulo' => 'Edad no válida',
    'mensaje' => 'La edad ingresada no es válida',
    'ambito' => 'edad'
  ];

  public const CLIENTE_REGISTRADO = [
    'titulo' => 'Nuevo cliente guardado',
    'mensaje' => 'La información del cliente ha sido guardada con éxito.',
    'ambito' => 'notificacion'
  ];

  private const NOMBRE_MIN_LONGITUD = 3;
  private const NOMBRE_MAX_LONGITUD = 50;
  private const APELLIDOS_MIN_LONGITUD = 4;
  private const APELLIDOS_MAX_LONGITUD = 80;
  private const CELULAR_LONGITUD = 10;
  private const EDAD_MINIMA = 1;
  private const EDAD_MAXIMA = 120;

  private array $errores = [];
  private int $id;
  private string $nombre;
  private string $apellidos;
  private string $edad;
  private string $celular;
  private ?string $email;
  private array $ubicaciones;

  private function __construct() { }

  public static function vistaClienteConstructor(): Cliente { return new self(); }

  public static function crearClienteConstructor(
      string $nombre,
      string $apellidos,
      string $email,
      string $celular,
      string $edad,
      array $ubicaciones
  )
  {
    $cliente = new self();
    $cliente->nombre = reemplazarEspacios($nombre);
    $cliente->apellidos = reemplazarEspacios($apellidos);
    $cliente->email = reemplazarEspacios($email);
    $cliente->celular = reemplazarEspacios($celular);
    $cliente->edad = reemplazarEspacios($edad);
    $cliente->ubicaciones = $ubicaciones;

    return $cliente;
  }

  public static function idClienteConstructor(
    int $id
  ): Cliente
  {
    $cliente = new self();
    $cliente->id = $id;

    return $cliente;
  }

  public function mostrarClientes(): array|false
  {
    return $this->obtenerClientes();
  }

  public function mostrarCliente(): void
  {
    $cliente =  $this->obtenerCliente($this->id);

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      $cliente
    ))->Json();
  }

  public function registrarCliente(): void
  {
    if ($this->cammposVacios()) {
      array_push($this->errores, self::CAMPOS_VACIOS);
    }

    $this->validarNombre();
    $this->validarApellidos();
    $this->validarEmail();
    $this->validarCelular();
    $this->validarEdad();

    if (count($this->errores) > 0) {
      $respuesta = new Respuesta(
        Respuesta::STATUS_ERROR,
        Respuesta::ARRAY,
        $this->errores
      );
      exit($respuesta->Json());
    }

    $id = $this->crearCliente(
        $this->nombre,
        $this->apellidos,
        $this->email,
        $this->celular,
        $this->edad,
        $this->ubicaciones
    );

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      array($id, self::CLIENTE_REGISTRADO)
    ))->Json();
  }

  private function caracteresInvalidos(string $string): bool
  {
    return !ctype_alpha(validarCaracteresEspeciales($string));
  }

  private function validarNombre()
  {
    if (empty($this->nombre)) return;

    $this->validarLongitudNombre();

    if ($this->caracteresInvalidos($this->nombre)) {
      array_push($this->errores, self::NOMBRE_INVALIDO);
    }
  }

  private function validarLongitudNombre()
  {
    validarLongitud(
      $this->nombre,
      self::NOMBRE_MIN_LONGITUD,
      self::NOMBRE_MAX_LONGITUD,
      self::NOMBRE_CORTO,
      self::NOMBRE_LARGO,
      $this->errores
    );
  }

  private function validarApellidos(): void
  {
    if (empty($this->apellidos)) return;

    $this->validarLongitudApellidos();

    if ($this->caracteresInvalidos($this->apellidos)) {
      array_push($this->errores, self::APELLIDOS_INVALIDOS);
    }
  }

  private function validarLongitudApellidos(): void
  {
    validarLongitud(
      $this->apellidos,
      self::APELLIDOS_MIN_LONGITUD,
      self::APELLIDOS_MAX_LONGITUD,
      self::APELLIDOS_CORTOS,
      self::APELLIDOS_LARGOS,
      $this->errores
    );
  }

  private function validarEmail(): void
  {
    if (empty($this->email)) {
      $this->email = null;
      return;
    }

    if ($this->emailExistente($this->email)) {
      array_push($this->errores, Respuesta::EMAIL_EXISTENTE);
    } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      array_push($this->errores, Respuesta::EMAIL_INVALIDO);
    }
  }

  private function validarCelular(): void
  {
    if (empty($this->celular)) return;

    if (!is_numeric($this->celular)) {
      array_push($this->errores, self::CELULAR_INVALIDO);
    } else if (strlen($this->celular) !== self::CELULAR_LONGITUD) {
      array_push($this->errores, self::CELULAR_LONGITUD_INVALIDA);
    }
  }

  private function validarEdad(): void
  {
    if ($this->edad != 0 && empty($this->edad)) return;

    if (!is_numeric($this->edad)) {
      array_push($this->errores, self::EDAD_INVALIDA);
      return;
    }

    $this->validarLongitudEdad();
  }

  private function validarLongitudEdad(): void
  {
    validarLongitud(
      intval($this->edad),
      self::EDAD_MINIMA,
      self::EDAD_MAXIMA,
      self::EDAD_MUY_JOVEN,
      self::EDAD_MUY_VIEJO,
      $this->errores
    );
  }

  private function cammposVacios(): bool
  {
    return (empty($this->nombre) || empty($this->apellidos) || empty($this->edad) || empty($this->celular));
  }
}
