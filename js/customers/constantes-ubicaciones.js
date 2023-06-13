export const CALLE_PRINCIPAL_MIN_LONGITUD = 3;
export const CALLE_PRINCIPAL_MAX_LONGITUD = 100;
export const CALLES_ADYACENTES_MIN_LONGITUD = 3;
export const CALLES_ADYACENTES_MAX_LONGITUD = 150;
export const COLONIA_MIN_LONGITUD = 6;
export const COLONIA_MAX_LONGITUD = 60;
export const NUMERO_EXTERIOR_MIN_LONGITUD = 3;
export const NUMERO_EXTERIOR_MAX_LONGITUD = 6;
export const NUMERO_INTERIOR_MIN_LONGITUD = 3;
export const NUMERO_INTERIOR_MAX_LONGITUD = 6;
export const CP_MIN_LONGITUD = 3;
export const CP_MAX_LONGITUD = 6;

export default {
  CAMPOS_VACIOS_OBLIGATORIOS: 'Una ubicación debe contar con una calle principal, una colonia y un código postal.',
  CALLE_PRINCIPAL_CARACTERES_INVALIDOS: 'La calle principal solo puede contener letras, números, espacios y puntos.',
  CALLE_PRINCIPAL_CORTA: `La calle principal debe contener como mínimo ${CALLE_PRINCIPAL_MIN_LONGITUD} caracteres.`,
  CALLE_PRINCIPAL_LARGA: `La calle principal debe contener como máximo ${CALLE_PRINCIPAL_MAX_LONGITUD} caracteres.`,
  CALLES_ADYACENTES_CARACTERES_INVALIDOS: 'Las calles adyacentes solo pueden contener letras, números, espacios y puntos.',
  CALLES_ADYACENTES_CORTAS: `Las calles adyacentes deben contener como mínimo ${CALLES_ADYACENTES_MIN_LONGITUD} caracteres.`,
  CALLES_ADYACENTES_LARGAS: `Las calles adyacentes deben contener como máximo ${CALLES_ADYACENTES_MAX_LONGITUD} caracteres.`,
  COLONIA_CARACTERES_INVALIDOS: 'La colonia solo pueden contener letras, números, espacios y puntos.',
  COLONIA_CORTA: `La colonia debe contener como mínimo ${COLONIA_MIN_LONGITUD} caracteres.`,
  COLONIA_LARGA: `La colonia debe contener como máximo ${COLONIA_MAX_LONGITUD} caracteres.`,
  NUMERO_EXTERIOR_NO_NUMERICO: 'El número exterior debe contener solo números.',
  NUMERO_EXTERIOR_CORTO: `El número exterior debe contener como mínimo ${NUMERO_EXTERIOR_MIN_LONGITUD} caracteres.`,
  NUMERO_EXTERIOR_LARGO: `El número exterior debe contener como máximo ${NUMERO_EXTERIOR_MAX_LONGITUD} caracteres.`,
  NUMERO_INTERIOR_NO_NUMERICO: 'El número interior debe contener solo números.',
  NUMERO_INTERIOR_CORTO: `El número interior debe contener como mínimo ${NUMERO_EXTERIOR_MIN_LONGITUD} caracteres.`,
  NUMERO_INTERIOR_LARGO: `El número interior debe contener como máximo ${NUMERO_EXTERIOR_MAX_LONGITUD} caracteres.`,
  CP_NO_NUMERICO: 'El código postal debe contener solo números.',
  CP_CORTO: `El código postal debe contener como mínimo ${CP_MIN_LONGITUD} caracteres.`,
  CP_LARGO: `El código postal debe contener como máximo ${CP_MAX_LONGITUD} caracteres.`,
  UBICACION_AGERGADA_TITULO: 'Ubicación agregada',
  UBICACION_AGREGADA_MENSAJE: 'La ubicación ha sido agregada con éxito.',
  UBICACION_REMOVIDA_TITULO: 'Ubicación removida',
  UBICACION_REMOVIDA_MENSAJE: 'La ubicación ha sido removida con éxito.'
};
