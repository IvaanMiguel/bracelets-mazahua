import { crearItemError, removerErrores, debounceEvento, crearEventoValidacion } from '../vista-control.js';
import * as Validaciones from './validaciones-ubicacion.js';
import Mensajes from './constantes-ubicaciones.js';

const camposUbicaciones = document.getElementById('campos-ubicaciones');
const campoVacioCallback = (input) => {
  removerErrores(camposUbicaciones);

  if (!input.value) {
    camposUbicaciones.appendChild(crearItemError(Mensajes.CAMPOS_VACIOS_OBLIGATORIOS));
    input.dispatchEvent(crearEventoValidacion('campovacio', {
      campo: input.name,
      estaVacio: true
    }));

    return;
  }

  input.dispatchEvent(crearEventoValidacion('campovacio', {
    campo: input.name,
    estaVacio: false
  }));
};

// Validaciones para la calle principal.
const callePrincipalInput = document.body.querySelector('[name="callePrincipal"]');
debounceEvento(callePrincipalInput, 'input', (input) => {
  removerErrores(input.closest('contenedor-flex'));

  const campoEstado = Validaciones.validarCallePrincipal(input);

  if (campoEstado.valido) {
    input.dispatchEvent(crearEventoValidacion('campovalidacion', {
      campo: input.name,
      esValido: true
    }));

    return;
  }

  campoEstado.errores.forEach((mensaje) => input.parentElement.after(crearItemError(mensaje)));

  input.dispatchEvent(crearEventoValidacion('campovalidacion', {
    campo: input.name,
    esValido: false
  }));
}, 500);
callePrincipalInput.addEventListener('blur', () => campoVacioCallback(callePrincipalInput));

// Validaciones para las calles adyacentes.
const callesAdyacentesInput = document.body.querySelector('[name="callesAdyacentes"]');
debounceEvento(callesAdyacentesInput, 'input', (input) => {
  removerErrores(input.closest('contenedor-flex'));

  const campoEstado = Validaciones.validarCallesAdyacentes(input);

  if (campoEstado.valido) {
    input.dispatchEvent(crearEventoValidacion('campovalidacion', {
      campo: input.name,
      esValido: true
    }));

    return;
  }

  campoEstado.errores.forEach((mensaje) => input.parentElement.after(crearItemError(mensaje)));

  input.dispatchEvent(crearEventoValidacion('campovalidacion', {
    campo: input.name,
    esValido: false
  }));
}, 500);

// Validaciones para la colonia.
const coloniaInput = document.body.querySelector('[name="colonia"]');
debounceEvento(coloniaInput, 'input', (input) => {
  removerErrores(input.closest('contenedor-flex'));

  const campoEstado = Validaciones.validarColonia(input);

  if (campoEstado.valido) {
    input.dispatchEvent(crearEventoValidacion('campovalidacion', {
      campo: input.name,
      esValido: true
    }));

    return;
  }

  campoEstado.errores.forEach((mensaje) => input.parentElement.after(crearItemError(mensaje)));

  input.dispatchEvent(crearEventoValidacion('campovalidacion', {
    campo: input.name,
    esValido: false
  }));
}, 500);
coloniaInput.addEventListener('blur', () => campoVacioCallback(coloniaInput));

const multicamposContenedor = document.body.querySelector('.multicampos');

// Validaciones para el número exterior.
const numeroExteriorInput = document.body.querySelector('[name="numeroExterior"]');
debounceEvento(numeroExteriorInput, 'input', (input) => {
  multicamposContenedor.querySelectorAll('.numero-exterior').forEach((error) => error.remove());

  const campoEstado = Validaciones.validarNumeroExterior(input);

  if (campoEstado.valido) {
    input.dispatchEvent(crearEventoValidacion('campovalidacion', {
      campo: input.name,
      esValido: true
    }));

    return;
  }

  campoEstado.errores.forEach((mensaje) => {
    const itemError = crearItemError(mensaje);
    itemError.className = 'numero-exterior';
    multicamposContenedor.appendChild(itemError);
  });

  input.dispatchEvent(crearEventoValidacion('campovalidacion', {
    campo: input.name,
    esValido: false
  }));
}, 500);

// Validaciones para el número exterior.
const numeroInteriorInput = document.body.querySelector('[name="numeroInterior"]');
debounceEvento(numeroInteriorInput, 'input', (input) => {
  multicamposContenedor.querySelectorAll('.numero-interior').forEach((error) => error.remove());

  const campoEstado = Validaciones.validarNumeroInterior(input);

  if (campoEstado.valido) {
    input.dispatchEvent(crearEventoValidacion('campovalidacion', {
      campo: input.name,
      esValido: true
    }));

    return;
  }

  campoEstado.errores.forEach((mensaje) => {
    const itemError = crearItemError(mensaje);
    itemError.className = 'numero-interior';
    multicamposContenedor.appendChild(itemError);
  });

  input.dispatchEvent(crearEventoValidacion('campovalidacion', {
    campo: input.name,
    esValido: false
  }));
}, 500);

// Validaciones para el código postal.
const cpInput = document.body.querySelector('[name="cp"]');
debounceEvento(cpInput, 'input', (input) => {
  multicamposContenedor.querySelectorAll('.cp').forEach((error) => error.remove());

  const campoEstado = Validaciones.validarCodigoPostal(input);

  if (campoEstado.valido) {
    input.dispatchEvent(crearEventoValidacion('campovalidacion', {
      campo: input.name,
      esValido: true
    }));

    return;
  }

  campoEstado.errores.forEach((mensaje) => {
    const itemError = crearItemError(mensaje);
    itemError.className = 'cp';
    multicamposContenedor.appendChild(itemError);
  });

  input.dispatchEvent(crearEventoValidacion('campovalidacion', {
    campo: input.name,
    esValido: false
  }));
}, 500);
cpInput.addEventListener('blur', () => campoVacioCallback(cpInput));
