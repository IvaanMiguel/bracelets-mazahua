<?php
function reemplazarEspacios(
    ?string $string
): string
{
  return preg_replace('/\s+/', ' ', trim($string));
}

function validarCaracteresEspeciales(
  string $string
): string
{
  $caracteresEspeciales = array('á', 'é', 'í', 'ó', 'ú', 'ñ', 'ü', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'Ü', ' ');
  $caracteresNormalizados = array('a', 'e', 'i', 'o', 'u', 'n', 'u', 'A', 'E', 'I', 'O', 'U', 'N', 'U', '');

  return str_replace($caracteresEspeciales, $caracteresNormalizados, $string);
}

function validarLongitud(
  string $campo,
  int $minLongitud,
  int $maxLongitud,
  array $mensajeCorto,
  array $mensajeLargo,
  array &$array,
  bool $esNumerico = false
): void
{
  $longitud = $esNumerico ? $campo : strlen($campo);

  if ($longitud < $minLongitud) {
    array_push($array, $mensajeCorto);
  } else if ($longitud > $maxLongitud) {
    array_push($array, $mensajeLargo);
  }
}

function obtenerFecha(string $fecha): string
{
  $mes = [
    1 => 'enero',
    2 => 'febrero',
    3 => 'marzo',
    4 => 'abril',
    5 => 'mayo',
    6 => 'junio',
    7 => 'julio',
    8 => 'agosto',
    9 => 'septiembre',
    10 => 'octubre',
    11 => 'noviembre',
    12 => 'diciembre'
  ];

  $arrayFecha = explode('-', $fecha);

  if (intval($arrayFecha[0]) === 0 || intval($arrayFecha[1]) === 0 || intval($arrayFecha[2]) === 0) {
    return '';
  }

  return "{$arrayFecha[2]} de {$mes[intval($arrayFecha[1])]} de {$arrayFecha[0]}";
}
