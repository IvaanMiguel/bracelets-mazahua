<?php

namespace controllers\orders;

use \controllers\orders\PedidoAutenticacion;
use \controllers\Cliente;

require_once dirname(__DIR__) . '/../constantes.php';
require_once AUTOLOADER;

class Mensaje
{
  const PEDIDO_REGISTRADO = [
    'titulo' => 'Nuevo pedido registrado',
    'mensaje' => 'El pedido ha sido registrado con éxito.',
    'ambito' => 'notificacion'
  ];

  const CLIENTE_NO_SELECCIONADO = [
    'titulo' => 'Cliente no seleccionado',
    'mensaje' => 'No se ha seleccionado ningún cliente.',
    'ambito' => 'notificacion'
  ];

  const PRODUCTOS_NO_SELECCIONADOS = [
    'titulo' => 'Productos no seleccionados',
    'mensaje' => 'No se ha seleccionado ningún producto.',
    'ambito' => 'notificacion'
  ];

  const NOMBRE_DESTINATARIO_CORTO_NOTI = [
    'titulo' => 'Nombre del destinatario muy corto',
    'mensaje' => 'El nombre del destinatario debe tener como mínimo ' . PedidoAutenticacion::NOMBRE_DESTINATARIO_MIN_LONGITUD . ' caracteres.',
    'ambito' => 'notificacion'
  ];

  const NOMBRE_DESTINATARIO_LARGO_NOTI = [
    'titulo' => 'Nombre del destinatario muy largo',
    'mensaje' => 'El nombre del destinatario debe tener como máximo ' . PedidoAutenticacion::NOMBRE_DESTINATARIO_MAX_LONGITUD . ' caracteres.',
    'ambito' => 'notificacion'
  ];

  const NOMBRE_DESTINATARIO_CORTO = [
    'titulo' => 'Nombre del destinatario muy corto',
    'mensaje' => 'El nombre del destinatario debe tener como mínimo ' . PedidoAutenticacion::NOMBRE_DESTINATARIO_MIN_LONGITUD . ' caracteres.',
    'ambito' => 'nombreDestinatario'
  ];

  const NOMBRE_DESTINATARIO_LARGO = [
    'titulo' => 'Nombre del destinatario muy largo',
    'mensaje' => 'El nombre del destinatario debe tener como máximo ' . PedidoAutenticacion::NOMBRE_DESTINATARIO_MAX_LONGITUD . ' caracteres.',
    'ambito' => 'nombreDestinatario'
  ];

  const NOMBRE_DESTINATARIO_INVALIDO_NOTI = [
    'titulo' => 'Nombre del destinatario inváldo',
    'mensaje' => 'El nombre del destinatario solo debe contener letras y espacios.',
    'ambito' => 'notificacion'
  ];

  const NOMBRE_DESTINATARIO_INVALIDO = [
    'titulo' => 'Nombre del destinatario inváldo',
    'mensaje' => 'El nombre del destinatario solo debe contener letras y espacios.',
    'ambito' => 'nombreDestinatario'
  ];

  const CELULAR_LONGITUD_INVALIDA_NOTI = [
    'titulo' => 'Celular del destinatario inválido',
    'mensaje' => 'El celular debe tener como mínimo ' . Cliente::CELULAR_LONGITUD . ' números.',
    'ambito' => 'notificacion'
  ];

  const CELULAR_LONGITUD_INVALIDA = [
    'titulo' => 'Celular del destinatario inválido',
    'mensaje' => 'El celular debe tener como mínimo ' . Cliente::CELULAR_LONGITUD . ' números.',
    'ambito' => 'celularDestinatario'
  ];

  const CELULAR_INVALIDO_NOTI = [
    'titulo' => 'Celular del destinatario inválido',
    'mensaje' => 'El celular ingresado no es válido.',
    'ambito' => 'notificacion'
  ];

  const CELULAR_INVALIDO = [
    'titulo' => 'Celular del destinatario inválido',
    'mensaje' => 'El celular ingresado no es válido.',
    'ambito' => 'celularDestinatario'
  ];

  const CLABE_VACÍA = [
    'titulo' => 'CLABE de cuenta vacía',
    'mensaje' => 'No se ha ingresado ninguna CLABE de cuenta.',
    'ambito' => 'notificacion'
  ];

  const CLABE_INVALIDA = [
    'titulo' => 'CLABE de cuenta inválida',
    'mensaje' => 'La CLABE de cuenta solo debe contener números.',
    'ambito' => 'notificacion'
  ];

  const CLABE_LONGITUD_INVALIDA = [
    'titulo' => 'CLABE de cuenta inválida',
    'mensaje' => 'La CLABE de cuenta debe contar con ' . PedidoAutenticacion::CLABE_LONGITUD . ' números.',
    'ambito' => 'notificacion'
  ];

  const TITULAR_VACÍO = [
    'titulo' => 'Nombre del titular vacío',
    'mensaje' => 'No se ha ingresado ningún nombre de titular.',
    'ambito' => 'notificacion'
  ];

  const TITULAR_CORTO = [
    'titulo' => 'Nombre del titular muy corto',
    'mensaje' => 'El nombre del titular debe contener como mínimo ' . PedidoAutenticacion::TITULAR_MIN_LONGITUD . ' caracteres.',
    'ambito' => 'notificacion'
  ];

  const TITULAR_LARGO = [
    'titulo' => 'Nombre del titular muy largo',
    'mensaje' => 'El nombre del titular debe contener como máximo ' . PedidoAutenticacion::TITULAR_MIN_LONGITUD . ' caracteres.',
    'ambito' => 'notificacion'
  ];

  const NUMERO_TARJETA_VACIO = [
    'titulo' => 'Número de tarjeta vacío',
    'mensaje' => 'No se ha ingresado ningún número de tarjeta.',
    'ambito' => 'notificacion'
  ];

  const NUMERO_TARJETA_INVALIDO = [
    'titulo' => 'Número de tarjeta inválido',
    'mensaje' => 'El número de tarjeta solo debe contener números.',
    'ambito' => 'notificacion'
  ];

  const NUMERO_TARJETA_LONGITUD_INVALIDA = [
    'titulo' => 'Número de tarjeta inválido',
    'mensaje' => 'El número de tarjeta debe contar con ' . PedidoAutenticacion::NUMERO_TARJETA_LONGITUD . ' números.',
    'ambito' => 'notificacion'
  ];

  const PEDIDO_ELIMINADO = [
    'titulo' => 'Pedido eliminado',
    'mensaje' => 'El pedido ha sido eliminado con éxito.',
    'ambito' => 'notificacion'
  ];

  const PEDIDO_COMPLETADO = [
    'titulo' => 'Pedido completado',
    'mensaje' => 'El pedido ha sido sido marcado como completado con éxito.',
    'ambito' => 'notificacion'
  ];

  const DATOS_DESTINATARIO_ACTUALIZADOS = [
    'titulo' => 'Datos de destinatario actualizados',
    'mensaje' => 'Los datos de destinatario han sido actualizados con éxito.',
    'ambito' => 'notificacion'
  ];

  const DATOS_ENTREGA_ACTUALIZADOS = [
    'titulo' => 'Datos de entrega actualizados',
    'mensaje' => 'Los datos de entrega han sido actualizados con éxito.',
    'ambito' => 'notificacion'
  ];

  const PRODUCTO_UNICO = [
    'titulo' => 'Producto único en el pedido',
    'mensaje' => 'Un pedido no puede quedarse sin productos.',
    'ambito' => 'notificacion'
  ];

  const PRODUCTO_ELIMINADO = [
    'titulo' => 'Producto eliminado del pedido',
    'mensaje' => 'El producto ha sido eliminado del pedido exitosamente.',
    'ambito' => 'notificacion'
  ];
}
