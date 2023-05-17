import { campoNumericoInvalido, caracteresInvalidos } from './validaciones-cliente.js';
import Mensajes, * as Constantes from './constantes-ubicaciones.js';

export const validarCallePrincipal = (input) => {
  const inputValor = input.value.trim();

  if (!inputValor.length) return { valido: true };

  const errores = [];

  if (caracteresInvalidos(inputValor)) {
    errores.push(Mensajes.CALLE_PRINCIPAL_CARACTERES_INVALIDOS);
  }

  if (inputValor.length < Constantes.CALLES_ADYACENTES_MIN_LONGITUD) {
    errores.push(Mensajes.CALLE_PRINCIPAL_CORTA);
  } else if (inputValor.length > Constantes.CALLE_PRINCIPAL_MAX_LONGITUD) {
    errores.push(Mensajes.CALLE_PRINCIPAL_LARGA);
  }

  return {
    valido: errores.length === 0,
    errores
  };
};

export const validarCallesAdyacentes = (input) => {
  const inputValor = input.value.trim();

  if (!inputValor.length) return { valido: true };

  const errores = [];

  if (caracteresInvalidos(inputValor)) {
    errores.push(Mensajes.CALLES_ADYACENTES_CARACTERES_INVALIDOS);
  }

  if (inputValor.length < Constantes.CALLES_ADYACENTES_MIN_LONGITUD) {
    errores.push(Mensajes.CALLES_ADYACENTES_CORTAS);
  } else if (inputValor.length > Constantes.CALLES_ADYACENTES_MAX_LONGITUD) {
    errores.push(Mensajes.CALLES_ADYACENTES_LARGAS);
  }

  return {
    valido: errores.length === 0,
    errores
  };
};

export const validarColonia = (input) => {
  const inputValor = input.value.trim();

  if (!inputValor.length) return { valido: true };

  const errores = [];

  if (caracteresInvalidos(inputValor)) {
    errores.push(Mensajes.COLONIA_CARACTERES_INVALIDOS);
  }

  if (inputValor.length < Constantes.COLONIA_MIN_LONGITUD) {
    errores.push(Mensajes.COLONIA_CORTA);
  } else if (inputValor.length > Constantes.COLONIA_MAX_LONGITUD) {
    errores.push(Mensajes.COLONIA_LARGA);
  }

  return {
    valido: errores.length === 0,
    errores
  };
};

export const validarNumeroExterior = (input) => {
  const inputValor = input.value.trim();

  if (!inputValor.length) return { valido: true };

  const errores = [];

  if (campoNumericoInvalido(inputValor)) {
    errores.push(Mensajes.NUMERO_EXTERIOR_NO_NUMERICO);
  }

  if (inputValor.length < Constantes.NUMERO_EXTERIOR_MIN_LONGITUD) {
    errores.push(Mensajes.NUMERO_EXTERIOR_CORTO);
  } else if (inputValor.length > Constantes.NUMERO_EXTERIOR_MAX_LONGITUD) {
    errores.push(Mensajes.NUMERO_EXTERIOR_LARGO);
  }

  return {
    valido: errores.length === 0,
    errores
  };
};

export const validarNumeroInterior = (input) => {
  const inputValor = input.value.trim();

  if (!inputValor.length) return { valido: true };

  const errores = [];

  if (campoNumericoInvalido(inputValor)) {
    errores.push(Mensajes.NUMERO_INTERIOR_NO_NUMERICO);
  }

  if (inputValor.length < Constantes.NUMERO_INTERIOR_MIN_LONGITUD) {
    errores.push(Mensajes.NUMERO_INTERIOR_CORTO);
  } else if (inputValor.length > Constantes.NUMERO_INTERIOR_MAX_LONGITUD) {
    errores.push(Mensajes.NUMERO_INTERIOR_LARGO);
  }

  return {
    valido: errores.length === 0,
    errores
  };
};

export const validarCodigoPostal = (input) => {
  const inputValor = input.value.trim();

  if (!inputValor.length) return { valido: true };

  const errores = [];

  if (campoNumericoInvalido(inputValor)) {
    errores.push(Mensajes.CP_NO_NUMERICO);
  }

  if (inputValor.length < Constantes.CP_MIN_LONGITUD) {
    errores.push(Mensajes.CP_CORTO);
  } else if (inputValor.length > Constantes.CP_MAX_LONGITUD) {
    errores.push(Mensajes.CP_LARGO);
  }

  return {
    valido: errores.length === 0,
    errores
  };
};
