<?php

namespace messages;

use \controllers\Ubicacion;

require_once dirname(__DIR__) . '/constantes.php';
require_once AUTOLOADER;

class UbicacionMensaje
{
  const UBICACION_REGISTRADA = [
    'titulo' => 'Nueva ubicación registrada',
    'mensaje' => 'La ubicación ha sido registrada con éxito.',
    'ambito' => 'notificacion'
  ];
  
  const UBICACION_ELIMINADA = [
    'titulo' => 'Ubicación eliminada',
    'mensaje' => 'La ubicación ha sido eliminada con éxito.',
    'ambito' => 'notificacion'
  ];
  
  const UBICACION_ACTUALIZADA = [
    'titulo' => 'Ubicación actualizado',
    'mensaje' => 'La ubicación ha sido actualizada con éxito.',
    'ambito' => 'notificacion'
  ];

  const UBICACION_UNICA_RESTANTE = [
    'titulo' => 'Error al eliminar la ubicación',
    'mensaje' => 'Única ubicación restante. El cliente debe tener al menos una ubicación siempre.',
    'ambito' => 'notificacion'
  ];
  
  const CAMPOS_OBLIGATORIOS_VACIOS = [
    'titulo' => 'Campos obligatorios vacíos',
    'mensaje' => 'Una ubicación debe contar con una calle principal, una colonia y un código postal.',
    'ambito' => 'general'
  ];
  
  const CALLE_PRINCIPAL_CORTA = [
    'titulo' => 'Calle principal muy corta',
    'mensaje' => 'La calle principal debe contener como mínimo ' . Ubicacion::CALLE_PRINCIPAL_MIN_LONGITUD . ' caracteres.',
    'ambito' => 'callePrincipal'
  ];
  
  const CALLE_PRINCIPAL_LARGA = [
    'titulo' => 'Calle principal muy larga',
    'mensaje' => 'La calle principal debe contener como máximo ' . Ubicacion::CALLE_PRINCIPAL_MAX_LONGITUD . ' caracteres.',
    'ambito' => 'callePrincipal'
  ];
  
  const CALLE_PRINCIPAL_INVALIDA = [
    'titulo' => 'Caracteres inválidos en calle principal',
    'mensaje' => 'La calle principal solo puede contener letras, números, espacios y puntos.',
    'ambito' => 'callePrincipal'
  ];
  
  const CALLES_ADYACENTES_CORTAS = [
    'titulo' => 'Calles adyacentes muy cortas',
    'mensaje' => 'Las calles adyacentes deben contener como mínimo ' . Ubicacion::CALLES_ADYACENTES_MIN_LONGITUD . ' caracteres.',
    'ambito' => 'callesAdyacentes'
  ];
  
  const CALLES_ADYACENTES_LARGAS = [
    'titulo' => 'Calles adyacentes muy largas',
    'mensaje' => 'Las calles adyacentes deben contener como máximo ' . Ubicacion::CALLES_ADYACENTES_MAX_LONGITUD . ' caracteres.',
    'ambito' => 'callesAdyacentes'
  ];
  
  const CALLES_ADYACENTES_INVALIDAS = [
    'titulo' => 'Caracteres inválidos en calles adyacentes',
    'mensaje' => 'Las calles adyacentes solo pueden contener letras, números, espacios y puntos.',
    'ambito' => 'callesAdyacentes'
  ];
  
  const COLONIA_CORTA = [
    'titulo' => 'Colonia muy corta',
    'mensaje' => 'La colonia debe contener como mínimo ' . Ubicacion::COLONIA_MIN_LONGITUD . ' caracteres.',
    'ambito' => 'colonia'
  ];
  
  const COLONIA_LARGA = [
    'titulo' => 'Colonia muy larga',
    'mensaje' => 'La colonia debe contener como máximo ' . Ubicacion::COLONIA_MAX_LONGITUD . ' caracteres.',
    'ambito' => 'colonia'
  ];
  
  const COLONIA_INVALIDA = [
    'titulo' => 'Caracteres inválidos en colonia',
    'mensaje' => 'La colonia solo puede contener letras, números, espacios y puntos.',
    'ambito' => 'colonia'
  ];
  
  const NUMERO_EXTERIOR_CORTO = [
    'titulo' => 'Número exterior muy corto',
    'mensaje' => 'El número exterior debe contener como mínimo ' . Ubicacion::NUMERO_EXTERIOR_MIN_LONGITUD . ' caracteres.',
    'ambito' => 'numeroExterior',
    'clase' => 'multicampos'
  ];
  
  const NUMERO_EXTERIOR_LARGO = [
    'titulo' => 'Número exterior muy largo',
    'mensaje' => 'El número exterior debe contener como máximo ' . Ubicacion::NUMERO_EXTERIOR_MAX_LONGITUD . ' caracteres.',
    'ambito' => 'numeroExterior',
    'clase' => 'multicampos'
  ];
  
  const NUMERO_EXTERIOR_INVALIDO = [
    'titulo' => 'Caracteres inválidos en número exterior',
    'mensaje' => 'El número exterior debe contener solo números.',
    'ambito' => 'numeroExterior',
    'clase' => 'multicampos'
  ];
  
  const NUMERO_INTERIOR_CORTO = [
    'titulo' => 'Número interior muy corto',
    'mensaje' => 'El número interior debe contener como mínimo ' . Ubicacion::NUMERO_INTERIOR_MIN_LONGITUD . ' caracteres.',
    'ambito' => 'numeroInterior',
    'clase' => 'multicampos'
  ];
  
  const NUMERO_INTERIOR_LARGO = [
    'titulo' => 'Número interior muy largo',
    'mensaje' => 'El número interior debe contener como máximo ' . Ubicacion::NUMERO_INTERIOR_MAX_LONGITUD . ' caracteres.',
    'ambito' => 'numeroInterior',
    'clase' => 'multicampos'
  ];
  
  const NUMERO_INTERIOR_INVALIDO = [
    'titulo' => 'Caracteres inválidos en número interior',
    'mensaje' => 'El número interior debe contener solo números.',
    'ambito' => 'numeroInterior',
    'clase' => 'multicampos'
  ];
  
  const CODIGO_POSTAL_CORTO = [
    'titulo' => 'Código postal muy corto',
    'mensaje' => 'El código postal debe contener como mínimo ' . Ubicacion::CP_MIN_LONGITUD . ' caracteres.',
    'ambito' => 'cp',
    'clase' => 'multicampos'
  ];
  
  const CODIGO_POSTAL_LARGO = [
    'titulo' => 'Código postal muy largo',
    'mensaje' => 'El Código postal debe contener como máximo ' . Ubicacion::CP_MAX_LONGITUD . ' caracteres.',
    'ambito' => 'cp',
    'clase' => 'multicampos'
  ];
  
  const CODIGO_POSTAL_INVALIDO = [
    'titulo' => 'Caracteres inválidos en código postal',
    'mensaje' => 'El código postal debe contener solo números.',
    'ambito' => 'cp',
    'clase' => 'multicampos'
  ];
}
