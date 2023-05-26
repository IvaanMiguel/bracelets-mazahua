<?php

namespace controllers\orders;

use \controllers\orders\Mensaje;
use \controllers\Cliente;

require_once dirname(__DIR__) . '/../constantes.php';
require_once UTILS;

class PedidoAutenticacion
{
  public const NOMBRE_DESTINATARIO_MIN_LONGITUD = 3;
  public const NOMBRE_DESTINATARIO_MAX_LONGITUD = 130;
  public const TITULAR_MIN_LONGITUD = 7;
  public const TITULAR_MAX_LONGITUD = 130;
  public const CLABE_LONGITUD = 18;
  public const NUMERO_TARJETA_LONGITUD = 16;
  public static array $errores = [];

  public static function validarCliente(int $idCliente): void
  {
    if (empty($idCliente)) {
      array_push(self::$errores, Mensaje::CLIENTE_NO_SELECCIONADO);
    }
  }

  public static function validarProductos(array $productos): void
  {
    if (count($productos) === 0) {
      array_push(self::$errores, Mensaje::PRODUCTOS_NO_SELECCIONADOS);
    }
  }

  public static function validarNombreDestinatario(string &$nombreDestinatario, int $idCliente): void
  {
    if (empty($nombreDestinatario)){ 
      if (empty($idCliente)) return;

      $cliente = Cliente::idClienteConstructor($idCliente);
      $infoCliente = $cliente->mostrarCliente(true)[0];

      $nombreDestinatario = "{$infoCliente['apellidos']} {$infoCliente['nombre']}";
    } else {
      self::validarNombreDestinatarioFormato($nombreDestinatario);
      // validarLongitud(
      //   $nombreDestinatario,
      //   self::NOMBRE_DESTINATARIO_MIN_LONGITUD,
      //   self::NOMBRE_DESTINATARIO_MAX_LONGITUD,
      //   Mensaje::NOMBRE_DESTINATARIO_CORTO,
      //   Mensaje::NOMBRE_DESTINATARIO_LARGO,
      //   self::$errores
      // );

      // if (!ctype_alpha(validarCaracteresEspeciales($nombreDestinatario))) {
      //   array_push(self::$errores, Mensaje::NOMBRE_DESTINATARIO_INVALIDO);
      // }
    }
  }

  public static function validarCelularDestinatario(string &$celularDestinatario, int $idCliente): void
  {
    if (empty($celularDestinatario)) {
      if (empty($idCliente)) return;

      $cliente = Cliente::idClienteConstructor($idCliente);
      $infoCliente = $cliente->mostrarCliente(true)[0];

      $celularDestinatario = "{$infoCliente['celular']}";
    } else {
      self::validarCelularDestinatarioFormato($celularDestinatario);
      // if (!is_numeric($celularDestinatario)){ 
      //   array_push(self::$errores, Mensaje::CELULAR_INVALIDO);
      // } else if (strlen($celularDestinatario) !== Cliente::CELULAR_LONGITUD) {
      //   array_push(self::$errores, Mensaje::CELULAR_LONGITUD_INVALIDA);
      // }
    }
  }

  public static function validarClabeCuenta(string $clabe): void
  {
    if (empty($clabe)) {
      array_push(self::$errores, Mensaje::CLABE_VACÍA);
      return;
    }
    
    if (!is_numeric($clabe)){ 
      array_push(self::$errores, Mensaje::CLABE_INVALIDA);
    } else if (strlen($clabe) !== self::CLABE_LONGITUD) {
      array_push(self::$errores, Mensaje::CLABE_LONGITUD_INVALIDA);
    }
  }

  public static function validarNombreTitular(string $titular)
  {
    if (empty($titular)) {
      array_push(self::$errores, Mensaje::TITULAR_VACÍO);
      return;
    }

    validarLongitud(
      $titular,
      self::TITULAR_MIN_LONGITUD,
      self::TITULAR_MAX_LONGITUD,
      Mensaje::TITULAR_CORTO,
      Mensaje::TITULAR_LARGO,
      self::$errores
    );

    if (!self::caracteresValidos($titular)) {
      array_push(self::$errores, Mensaje::NOMBRE_DESTINATARIO_INVALIDO);
    }
    // if (!ctype_alpha(validarCaracteresEspeciales($titular))) {
    //   array_push(self::$errores, Mensaje::NOMBRE_DESTINATARIO_INVALIDO);
    // }
  }

  public static function validarNumeroTarjeta(string $numeroTarjeta)
  {
    if (empty($numeroTarjeta)) {
      array_push(self::$errores, Mensaje::NUMERO_TARJETA_VACIO);
      return;
    }

    if (!is_numeric($numeroTarjeta)) {
      array_push(self::$errores, Mensaje::NUMERO_TARJETA_INVALIDO);
    } else if (strlen($numeroTarjeta) !== self::NUMERO_TARJETA_LONGITUD) {
      array_push(self::$errores, Mensaje::NUMERO_TARJETA_LONGITUD_INVALIDA);
    }
  }

  public static function validarNombreDestinatarioFormato(string $nombreDestinatario)
  {
    validarLongitud(
      $nombreDestinatario,
      self::NOMBRE_DESTINATARIO_MIN_LONGITUD,
      self::NOMBRE_DESTINATARIO_MAX_LONGITUD,
      Mensaje::NOMBRE_DESTINATARIO_CORTO_NOTI,
      Mensaje::NOMBRE_DESTINATARIO_LARGO_NOTI,
      self::$errores
    );

    if (!self::caracteresValidos($nombreDestinatario)) {
      array_push(self::$errores, Mensaje::NOMBRE_DESTINATARIO_INVALIDO_NOTI);
    }
    // if (!ctype_alpha(validarCaracteresEspeciales($nombreDestinatario))) {
    //   array_push(self::$errores, Mensaje::NOMBRE_DESTINATARIO_INVALIDO);
    // }
  }

  public static function validarCelularDestinatarioFormato(string $celularDestinatario)
  {
    if (!is_numeric($celularDestinatario)){ 
      array_push(self::$errores, Mensaje::CELULAR_INVALIDO_NOTI);
    } else if (strlen($celularDestinatario) !== Cliente::CELULAR_LONGITUD) {
      array_push(self::$errores, Mensaje::CELULAR_LONGITUD_INVALIDA_NOTI);
    }
  }

  public static function caracteresValidos(
    string $string
  ): bool
  {
    return ctype_alpha(validarCaracteresEspeciales($string));
  }
}
