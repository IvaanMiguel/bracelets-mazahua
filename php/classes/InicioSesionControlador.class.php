<?php
class InicioSesionControlador extends InicioSesion
{
    private string $idUsuario;
    private string $clave;
    private array $errores = [];

    public function __construct(string $idUsuario, string $clave)
    {
        $this->idUsuario = $idUsuario;
        $this->clave = $clave;
    }

    public function iniciarSesion(): void
    {
        if ($this->camposVacios()) {
            array_push($this->errores, Respuesta::CAMPO_VACIO);
        }

        if (count($this->errores) > 0) {
            $respuesta = new Respuesta(Respuesta::ARRAY, $this->errores);
            exit($respuesta->Json());
        }

        $this->obtenerUsuario($this->idUsuario, $this->clave);

        echo (new Respuesta(Respuesta::URL, 'index.php'))->Json();
    }

    private function camposVacios(): bool
    {
        return (empty($this->idUsuario) || empty($this->clave));
    }
}
