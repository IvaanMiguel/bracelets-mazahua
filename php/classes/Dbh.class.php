<?php
class Dbh
{
    protected function conectar(): PDO
    {
        try {
            $config = parse_ini_file(dirname(__DIR__) . '/../php/config.ini');
            $nombreBd = $config['bd_nombre'];
            $usuario = $config['usuario'];
            $clave = $config['clave'];
            $host = $config['host'];
            $puerto = $config['puerto'];

            $dbh = new PDO("mysql:host={$host}:{$puerto};dbname={$nombreBd}", $usuario, $clave);
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $dbh;
        } catch (PDOException $error) {
            $respuesta = new Respuesta(Respuesta::ARRAY, array(Respuesta::BD_ERROR));
            exit($respuesta->Json());
        }
    }

    protected function ejecutarSentencia(PDOStatement $stmt, ?array $valores = null, ?Respuesta $respuesta = null): void
    {
        try {
            $stmt->execute($valores);
        } catch (PDOException $error) {
            $bd_error = $respuesta ?? new Respuesta(Respuesta::ARRAY, array(Respuesta::BD_ERROR));
            exit($bd_error->Json());
        }
    }
}
