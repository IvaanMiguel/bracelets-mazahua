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
  _entregaCallePrincipal: document.getElementById('entrega-calle-principal'),
  _entregaCallesAdyacentes: document.getElementById('entrega-calles-adyacentes'),
  _entregaColonia: document.getElementById('entrega-colonia'),
  _entregaNumeroExterior: document.getElementById('entrega-numero-exterior'),
  _entregaNumeroInterior: document.getElementById('entrega-numero-interior'),
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

  /** @param {string} string */
  set tipoEntrega (string) {
    this._tipoEntrega.innerText = string;
  },

  get idPedido () { return this._idPedido.value; },

  /** @param {string} string */
  set entregaCallePrincipal (string) {
    this._entregaCallePrincipal.innerText = string;
  },

  /** @param {string} string */
  set entregaCallesAdyacentes (string) {
    this._entregaCallesAdyacentes.innerText = string;
  },

  /** @param {string} string */
  set entregaColonia (string) {
    this._entregaColonia.innerText = string;
  },

  /** @param {string} string */
  set entregaNumeroExterior (string) {
    this._entregaNumeroExterior.innerText = string;
  },

  /** @param {string} string */
  set entregaNumeroInterior (string) {
    this._entregaNumeroInterior.innerText = string;
  },

  /** @param {string} string */
  set codigoPostal (string) {
    this._codigoPostal.innerText = string;
  },

  /** @param {string} string */
  set fechaEntrega (string) {
    this._fechaEntrega.innerText = string;
  },

  /** @param {string} string */
  set horaEntrega (string) {
    this._horaEntrega.innerText = string;
  },

  get direccionEntrega () { return this._direccionEntrega; },

  get listaProductosPedidos () { return this._listaProductosPedidos; },

  get totalProductos () { return this._totalProductos.innerText; },

  /** @param {string} string */
  set totalProductos (string) {
    this._totalProductos.innerText = string;
  },

  get costoTotal () { return this._costoTotal.innerText; },

  set costoTotal (string) {
    this._costoTotal.innerText = string;
  },

  get anticipoRequerido () { return this._anticipoRequerido.innerText; },

  set anticipoRequerido (string) {
    this._anticipoRequerido.innerText = string;
  },

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
    this._entregaCallePrincipal.innerText = this._CARGANDO;
    this._entregaCallesAdyacentes.innerText = this._CARGANDO;
    this._entregaColonia.innerText = this._CARGANDO;
    this._entregaNumeroExterior.innerText = '';
    this._entregaNumeroInterior.innerText = this._CARGANDO;
    this._entregaColonia.innerText = this._CARGANDO;
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
    this._horaEntrega.innerText = `${pedido.horaEntrega.slice(0, 5)} hrs.`;

    this._entregaCallePrincipal.innerText = pedido.callePrincipal;
    this._entregaCallesAdyacentes.innerText = pedido.callesAdyacentes || 'Sin calles adyacentes';
    this._entregaColonia.innerText = pedido.colonia;
    this._entregaNumeroExterior.innerText = pedido.numeroExterior
      ? `#${pedido.numeroExterior}`
      : 'S.N.';
    this._entregaNumeroInterior.innerText = pedido.numeroInterior
      ? `int. ${pedido.numeroInterior}`
      : 'Sin número interior';
    this._codigoPostal.innerText = `C.P. ${pedido.cp}`;

    this._anticipoRequerido.innerText = pedido.anticipo;
    this._costoTotal.innerText = pedido.total;
    this._estadoAnticipo.innerText = pedido.estadoAnticipo ? 'Pagado' : 'No pagado';

    this.ocultarDireccion(pedido.tipoEntrega === 'Pick up');
    this.ocultarDetallesPago(pedido.tipoPago === 'Efectivo');

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
  },

  ocultarDireccion (ocultar = true) {
    this._direccionEntrega.style.display = ocultar ? 'none' : 'flex';
  },

  ocultarDetallesPago (ocultar = true) {
    this._itemDetallesPago.style.display = ocultar ? 'none' : 'flex';
  }
};

export default vistaPedidoFormulario;
