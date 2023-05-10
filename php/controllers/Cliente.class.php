<?php

namespace controllers;

class Cliente extends \models\Cliente
{
  private array $errores = [];
  private int $id;
  private string $nombre;
  private string $primerApellido;
  private string $segundoApellido;
  private string $edad;
  private string $celular;
  private string $email;
  private array $ubicaciones;

  private function __construct() { }

  public static function vistaClienteConstructor(): Cliente { return new self(); }

  public static function crearClienteConstructor(
      string $nombre,
      string $primerApellido,
      string $segundoApellido,
      string $edad,
      string $celular,
      string $email,
      array $ubicaciones
  )
  {
    $cliente = new self();
    $cliente->nombre = $nombre;
    $cliente->primerApellido = $primerApellido;
    $cliente->segundoApellido = $segundoApellido;
    $cliente->edad = $edad;
    $cliente->celular = $celular;
    $cliente->email = $email;
    $cliente->ubicaciones = $ubicaciones;

    return $cliente;
  }

  public function mostrarClientes(): array|false
  {
    return $this->obtenerClientes();
  }

  public function registrarCliente(): void
  {
    $id = $this->crearCliente(
        $this->nombre,
        $this->primerApellido,
        $this->segundoApellido,
        $this->edad,
        $this->celular,
        $this->email,
        $this->ubicaciones
    );
  }
}
