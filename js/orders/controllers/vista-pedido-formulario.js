import { obtenerTipoEntrega, obtenerFecha } from '../../vista-control.js';

const vistaPedidoFormulario = {
  _CARGANDO: 'Cargando...',
  /** @type {HTMLInputElement} */
  _idPedido: document.getElementById('id-pedido'),
  _pedidoCliente: document.getElementById('pedido-cliente'),
  _pedidoNombreDestinatario: document.getElementById('pedido-nombre-destinatario'),
  _pedidoCelularDestinatario: document.getElementById('pedido-celular-destinatario'),
  _listaProductosPedidos: document.getElementById('lista-productos-pedidos'),
  _totalProductos: document.getElementById('total-productos'),
  _anticipoRequerido: document.getElementById('anticipo-requerido'),
  _costoTotal: document.getElementById('costo-total'),
  _tipoEntrega: document.getElementById('tipo-entrega'),
  _entregaColonia: document.getElementById('entrega-colonia'),
  _entregaCalle: document.getElementById('entrega-calle'),
  _codigoPostal: document.getElementById('codigo-postal'),
  _fechaEntrega: document.getElementById('fecha-entrega'),
  _horaEntrega: document.getElementById('hora-entrega'),
  _estadoAnticipo: document.getElementById('estado-anticipo'),
  _metodoPago: document.getElementById('metodo-pago'),
  _detallesPago: document.getElementById('detalles-pago'),
  _pedidoEdicionItems: document.body.querySelectorAll('.pedido-edicion'),
  _direccionEntrega: document.getElementById('direccion-opcional'),
  _itemDetallesPago: document.getElementById('item-detalles-pago'),

  get pedidoNombreDestinatario () { return this._pedidoNombreDestinatario.innerText; },

  /** @param {string} string */
  set pedidoNombreDestinatario (string) {
    this._pedidoNombreDestinatario.innerText = string;
  },

  get pedidoCelularDestinatario () { return this._pedidoCelularDestinatario.innerText; },

  /** @param {string} string */
  set pedidoCelularDestinatario (string) {
    this._pedidoCelularDestinatario.innerText = string;
  },

  get idPedido () { return this._idPedido.value; },

  inicializar () {
    this.reiniciar();
  },

  reiniciar () {
    this.limpiarProductosPedidos();

    this._pedidoCliente.innerText = this._CARGANDO;
    this._pedidoNombreDestinatario.innerText = this._CARGANDO;
    this._pedidoCelularDestinatario.innerText = this._CARGANDO;
    this._totalProductos.innerText = this._CARGANDO;
    this._anticipoRequerido.innerText = this._CARGANDO;
    this._costoTotal.innerText = this._CARGANDO;
    this._tipoEntrega.innerText = this._CARGANDO;
    this._entregaColonia.innerText = this._CARGANDO;
    this._entregaCalle.innerText = this._CARGANDO;
    this._codigoPostal.innerText = this._CARGANDO;
    this._fechaEntrega.innerText = this._CARGANDO;
    this._horaEntrega.innerText = this._CARGANDO;
    this._estadoAnticipo.innerText = this._CARGANDO;
    this._metodoPago.innerText = this._CARGANDO;
    this._detallesPago.innerText = this._CARGANDO;
  },

  limpiarProductosPedidos () {
    this._listaProductosPedidos.replaceChildren();
  },

  /** @param {Object} pedido */
  mostrarInformacion (pedido) {
    this._pedidoCliente.innerText = pedido.nombreCliente;
    this._pedidoNombreDestinatario.innerText = pedido.nombreDestinatario;
    this._pedidoCelularDestinatario.innerText = pedido.telefonoDestinatario || pedido.celularDestinatario;
    this._tipoEntrega.innerText = obtenerTipoEntrega(pedido);
    this._fechaEntrega.innerText = obtenerFecha(pedido.fechaEntrega);
    this._horaEntrega.innerText = pedido.horaEntrega.slice(0, 5);
    this._entregaColonia.innerText = pedido.colonia;
    this._entregaCalle.innerText = pedido.callePrincipal;
    this._codigoPostal.innerText = pedido.cp;
    this._anticipoRequerido.innerText = `$${pedido.anticipo} MXN`;
    this._costoTotal.innerText = `$${pedido.total} MXN`;

    pedido.tipoEntrega === 'Pick up'
      ? this._direccionEntrega.style.display = 'none'
      : this._direccionEntrega.style.display = null;

    this._estadoAnticipo.innerText = pedido.estadoAnticipo ? 'Pagado' : 'No pagado';
    pedido.tipoPago === 'Efectivo'
      ? this._itemDetallesPago.style.display = 'none'
      : this._itemDetallesPago.style.display = null;

    this._metodoPago.innerText = pedido.tipoPago;
    this._detallesPago.innerText = pedido.detallesPago;
  },

  /** @param {string} estado  */
  alternarEdicionPedido (estado) {
    if (estado === 'mostrar') {
      this._pedidoEdicionItems.forEach((item) => (item.style.display = 'flex'));
    } else if (estado === 'ocultar') {
      this._pedidoEdicionItems.forEach((item) => (item.style.display = 'none'));
    }
  }
};

export default vistaPedidoFormulario;
