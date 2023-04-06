<?php

namespace controllers;

use \classes\Respuesta;

require_once dirname(__DIR__) . '/constantes.php';

class RegistroUsuario extends \models\RegistroUsuario
{
  public const CLAVE_LONGITUD_MINIMA = 8;
  public const CLAVE_LONGITUD_MAXIMA = 20;
  public const USUARIO_LONGITUD_MINIMA = 4;
  public const USUARIO_LONGITUD_MAXIMA = 15;

  private string $nombreUsuario;
  private string $email;
  private string $clave;
  private string $claveVerificacion;
  private array $errores = [];

  public function __construct(string $nombreUsuario, string $email, string $clave, string $claveVerificacion)
  {
    $this->nombreUsuario = $nombreUsuario;
    $this->email = $email;
    $this->clave = $clave;
    $this->claveVerificacion = $claveVerificacion;
  }

  public function registrarUsuario(): void
  {
    if ($this->camposVacios()) {
      array_push($this->errores, Respuesta::CAMPO_VACIO);
    }

    $this->validarUsuario();

    $this->validarEmail();

    $this->validarClave();

    if (count($this->errores) > 0) {
      $respuesta = new Respuesta(Respuesta::ARRAY, $this->errores);
      exit($respuesta->Json());
    }

    $this->crearUsuario($this->nombreUsuario, $this->email, $this->clave);
    $nombreUsuarioUrl = "nombreUsuario={$this->nombreUsuario}";

    echo (new Respuesta(Respuesta::URL, URL_INICIAR_SESION . "?{$nombreUsuarioUrl}"))->Json();
  }

  private function camposVacios(): bool
  {
    return (empty($this->nombreUsuario) || empty($this->email) || empty($this->clave) || empty($this->claveVerificacion));
  }

  private function validarUsuario(): void
  {
    if (empty($this->nombreUsuario)) {
      return;
    }

    if (strlen($this->nombreUsuario) < self::USUARIO_LONGITUD_MINIMA) {
      array_push($this->errores, Respuesta::USUARIO_MUY_CORTO);
    } else if (strlen($this->nombreUsuario) > self::USUARIO_LONGITUD_MAXIMA) {
      array_push($this->errores, Respuesta::USUARIO_MUY_LARGO);
    }

    if (!ctype_alnum($this->nombreUsuario)) {
      array_push($this->errores, Respuesta::USUARIO_INVALIDO);
    }
    if ($this->nombreUsuarioExistente($this->nombreUsuario)) {
      array_push($this->errores, Respuesta::USUARIO_EXISTENTE);
    }
  }

  private function validarEmail(): void
  {
    if (empty($this->email)) {
      return;
    }

    if ($this->emailExistente($this->email)) {
      array_push($this->errores, Respuesta::EMAIL_EXISTENTE);
    }
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      array_push($this->errores, Respuesta::EMAIL_INVALIDO);
    }
  }

  private function validarClave(): void
  {
    if (empty($this->clave)) {
      return;
    }

    if (strlen($this->clave) < self::CLAVE_LONGITUD_MINIMA) {
      array_push($this->errores, Respuesta::CLAVE_MUY_CORTA);
    } else if (strlen($this->clave) > self::CLAVE_LONGITUD_MAXIMA) {
      array_push($this->errores, Respuesta::CLAVE_MUY_LARGA);
    }

    if (preg_match('/[A-Z]/', $this->clave) === 0) {
      array_push($this->errores, Respuesta::MAYUSCULA_FALTANTE);
    }
    if (preg_match('/[0-9]/', $this->clave) === 0) {
      array_push($this->errores, Respuesta::NUMERO_FALTANTE);
    }
    if (!empty($this->claveVerificacion) && strcmp($this->clave, $this->claveVerificacion) !== 0) {
      array_push($this->errores, Respuesta::CLAVES_DIFERENTES);
    }
  }
}
