<?php

namespace controllers;

use \classes\Respuesta;
use \messages\UbicacionMensaje;

require_once dirname(__DIR__) . '/constantes.php';
require_once UTILS;

class Ubicacion extends \models\Ubicacion
{
  public const CALLE_PRINCIPAL_MIN_LONGITUD = 3;
  public const CALLE_PRINCIPAL_MAX_LONGITUD = 30;
  public const CALLES_ADYACENTES_MIN_LONGITUD = 3;
  public const CALLES_ADYACENTES_MAX_LONGITUD = 60;
  public const COLONIA_MIN_LONGITUD = 6;
  public const COLONIA_MAX_LONGITUD = 60;
  public const NUMERO_EXTERIOR_MIN_LONGITUD = 3;
  public const NUMERO_EXTERIOR_MAX_LONGITUD = 6;
  public const NUMERO_INTERIOR_MIN_LONGITUD = 3;
  public const NUMERO_INTERIOR_MAX_LONGITUD = 6;
  public const CP_MIN_LONGITUD = 3;
  public const CP_MAX_LONGITUD = 6;

  private array $errores = [];
  private int $id;
  private string $callePrincipal;
  private ?string $callesAdyacentes;
  private string $colonia;
  private ?string $numeroExterior;
  private ?string $numeroInterior;
  private string $cp;
  private int $idCliente;

  private function __construct() { }

  public static function eliminarUbicacionConstructor(
    int $id,
    int $idCliente
  ): Ubicacion
  {
    $ubicacion = new self();
    $ubicacion->id = $id;
    $ubicacion->idCliente = $idCliente;

    return $ubicacion;
  }

  public static function idClienteConstructor(
    int $idCliente
  ): Ubicacion
  {
    $ubicacion = new self();
    $ubicacion->idCliente = $idCliente;

    return $ubicacion;
  }

  public static function crearUbicacionConstructor(
      string $callePrincipal,
      string $callesAdyacentes,
      string $colonia,
      string $numeroExterior,
      string $numeroInterior,
      string $cp,
      int $idCliente
  ): Ubicacion
  {
    $ubicacion = new self();
    $ubicacion->callePrincipal = reemplazarEspacios($callePrincipal);
    $ubicacion->callesAdyacentes = reemplazarEspacios($callesAdyacentes);
    $ubicacion->colonia = reemplazarEspacios($colonia);
    $ubicacion->numeroExterior = reemplazarEspacios($numeroExterior);
    $ubicacion->numeroInterior = reemplazarEspacios($numeroInterior);
    $ubicacion->cp = reemplazarEspacios($cp);
    $ubicacion->idCliente = $idCliente;

    return $ubicacion;
  }

  public static function editarUbicacionConstructor(
    string $callePrincipal,
    string $callesAdyacentes,
    string $colonia,
    string $numeroExterior,
    string $numeroInterior,
    string $cp,
    int $id
  ): Ubicacion
  {
    $ubicacion = new self();
    $ubicacion->callePrincipal = reemplazarEspacios($callePrincipal);
    $ubicacion->callesAdyacentes = reemplazarEspacios($callesAdyacentes);
    $ubicacion->colonia = reemplazarEspacios($colonia);
    $ubicacion->numeroExterior = reemplazarEspacios($numeroExterior);
    $ubicacion->numeroInterior = reemplazarEspacios($numeroInterior);
    $ubicacion->cp = reemplazarEspacios($cp);
    $ubicacion->id = $id;

    return $ubicacion;
  }

  public function mostrarUbicaciones(): void
  {
    $ubicaciones = $this->obtenerUbicaciones($this->idCliente);

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      $ubicaciones
    ))->Json();
  }

  public function registrarUbicacion(): void
  {
    if ($this->camposVacios()) {
      array_push($this->errores, UbicacionMensaje::CAMPOS_OBLIGATORIOS_VACIOS);
    }

    $this->validarCallePrincipal();
    $this->validarCallesAdyacentes();
    $this->validarColonia();
    $this->validarNumeroExterior();
    $this->validarNumeroInterior();
    $this->validarCodigoPostal();

    if (count($this->errores) > 0) {
      $respuesta = new Respuesta(
        Respuesta::STATUS_ERROR,
        Respuesta::ARRAY,
        $this->errores
      );
      exit($respuesta->Json());
    }

    $id = $this->crearUbicacion(
      $this->callePrincipal,
      $this->callesAdyacentes,
      $this->colonia,
      $this->numeroExterior,
      $this->numeroInterior,
      $this->cp,
      $this->idCliente
    );

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      array($id, UbicacionMensaje::UBICACION_REGISTRADA)
    ))->Json();
  }

  public function modificarUbicacion(): void
  {
    if (!empty($this->callePrincipal)) {
      $this->validarCallePrincipal();
    }
    if (!empty($this->callesAdyacentes)) {
      $this->validarCallesAdyacentes();
    }
    if (!empty($this->colonia)) {
      $this->validarColonia();
    }
    if (!empty($this->numeroExterior)) {
      $this->validarNumeroExterior();
    }
    if (!empty($this->numeroInterior)) {
      $this->validarNumeroInterior();
    }
    if (!empty($this->cp)) {
      $this->validarCodigoPostal();
    }

    if (count($this->errores) > 0) {
      $respuesta = new Respuesta(
        Respuesta::STATUS_ERROR,
        Respuesta::ARRAY,
        $this->errores
      );
      exit($respuesta->Json());
    }

    $this->actualizarUbicacion(
      $this->callePrincipal,
      $this->callesAdyacentes,
      $this->colonia,
      $this->numeroExterior,
      $this->numeroInterior,
      $this->cp,
      $this->id
    );

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      array(UbicacionMensaje::UBICACION_ACTUALIZADA)
    ))->Json();
  }

  public function removerUbicacion(): void
  {
    if ($this->ubicacionesRestantes() === 1) {
      echo (new Respuesta(
        Respuesta::STATUS_ERROR,
        Respuesta::ARRAY,
        array(UbicacionMensaje::UBICACION_UNICA_RESTANTE)
      ))->Json();

      return;
    }

    $this->eliminarUbicacion($this->id);

    echo (new Respuesta(
      Respuesta::STATUS_EXITO,
      Respuesta::ARRAY,
      array(UbicacionMensaje::UBICACION_ELIMINADA)
    ))->Json();
  }

  private function validarCallePrincipal(): void
  {
    if (empty($this->callePrincipal)) return;
    
    $this->validarLongitudCallePrincipal();

    if ($this->caracteresInvalidos($this->callePrincipal)) { 
      array_push($this->errores, UbicacionMensaje::CALLE_PRINCIPAL_INVALIDA);
    }
  }

  private function validarLongitudCallePrincipal(): void
  {
    validarLongitud(
      $this->callePrincipal,
      self::CALLE_PRINCIPAL_MIN_LONGITUD,
      self::CALLE_PRINCIPAL_MAX_LONGITUD,
      UbicacionMensaje::CALLE_PRINCIPAL_CORTA,
      UbicacionMensaje::CALLE_PRINCIPAL_LARGA,
      $this->errores
    );
  }

  private function validarCallesAdyacentes(): void
  {
    if (empty($this->callesAdyacentes)) {
      $this->callesAdyacentes = null;
      return;
    }

    $this->validarLongitudCallesAdyacentes();

    if ($this->caracteresInvalidos($this->callesAdyacentes)) {
      array_push($this->errores, UbicacionMensaje::CALLES_ADYACENTES_INVALIDAS);
    }
  }

  private function validarLongitudCallesAdyacentes(): void
  {
    validarLongitud(
      $this->callesAdyacentes,
      self::CALLES_ADYACENTES_MIN_LONGITUD,
      self::CALLES_ADYACENTES_MAX_LONGITUD,
      UbicacionMensaje::CALLES_ADYACENTES_CORTAS,
      UbicacionMensaje::CALLES_ADYACENTES_LARGAS,
      $this->errores
    );
  }

  private function validarColonia(): void
  {
    if (empty($this->colonia)) return;

    $this->validarLongitudColonia();

    if ($this->caracteresInvalidos($this->colonia)) {
      array_push($this->errores, UbicacionMensaje::COLONIA_INVALIDA);
    }
  }

  private function validarLongitudColonia(): void
  {
    validarLongitud(
      $this->colonia,
      self::COLONIA_MIN_LONGITUD,
      self::COLONIA_MAX_LONGITUD,
      UbicacionMensaje::COLONIA_CORTA,
      UbicacionMensaje::COLONIA_LARGA,
      $this->errores
    );
  }

  private function validarNumeroExterior(): void
  {
    if (empty($this->numeroExterior)) {
      $this->numeroExterior = null;
      return;
    };

    $this->validarLongitudNumeroExterior();

    if (!ctype_digit($this->numeroExterior)) {
      array_push($this->errores, UbicacionMensaje::NUMERO_EXTERIOR_INVALIDO);
    }
  }

  private function validarLongitudNumeroExterior(): void
  {
    validarLongitud(
      $this->numeroExterior,
      self::NUMERO_EXTERIOR_MIN_LONGITUD,
      self::NUMERO_EXTERIOR_MAX_LONGITUD,
      UbicacionMensaje::NUMERO_EXTERIOR_CORTO,
      UbicacionMensaje::NUMERO_EXTERIOR_LARGO,
      $this->errores
    );
  }

  private function validarNumeroInterior(): void
  {
    if (empty($this->numeroInterior)) {
      $this->numeroInterior = null;
      return;
    }

    $this->validarLongitudNumeroInterior();

    if (!ctype_digit($this->numeroInterior)) {
      array_push($this->errores, UbicacionMensaje::NUMERO_INTERIOR_INVALIDO);
    }
  }

  private function validarLongitudNumeroInterior(): void
  {
    validarLongitud(
      $this->numeroInterior,
      self::NUMERO_INTERIOR_MIN_LONGITUD,
      self::NUMERO_EXTERIOR_MAX_LONGITUD,
      UbicacionMensaje::NUMERO_INTERIOR_CORTO,
      UbicacionMensaje::NUMERO_INTERIOR_LARGO,
      $this->errores
    );
  }

  private function validarCodigoPostal(): void
  {
    if (empty($this->cp)) return;

    $this->validarLongitudCodigoPostal();

    if (!ctype_digit($this->cp)) {
      array_push($this->errores, UbicacionMensaje::CODIGO_POSTAL_INVALIDO);
    }
  }

  private function validarLongitudCodigoPostal(): void
  {
    validarLongitud(
      $this->cp,
      self::CP_MIN_LONGITUD,
      self::CP_MAX_LONGITUD,
      UbicacionMensaje::CODIGO_POSTAL_CORTO,
      UbicacionMensaje::CODIGO_POSTAL_LARGO,
      $this->errores
    );
  }

  private function caracteresInvalidos(string $string): bool
  {
    return !preg_match('/^[A-Za-z\d\s.]*$/', validarCaracteresEspeciales($string));
  }

  private function camposVacios(): bool
  {
    return (empty($this->callePrincipal) || empty($this->colonia) || empty($this->cp));
  }

  private function ubicacionesRestantes(): int
  {
    return count($this->obtenerUbicaciones($this->idCliente));
  }
}
