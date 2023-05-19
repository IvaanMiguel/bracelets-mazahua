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