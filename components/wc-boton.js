import MDIcono from './md-icono.js';

export default class WCBoton extends HTMLElement {
  static observedAttributes = ['href', 'type', 'data-color-fondo', 'data-color-texto',
    'data-variante', 'data-evento', 'data-expandir', 'data-etiqueta', 'data-icono'];

  constructor () {
    if (new.target === WCBoton) {
      throw new Error('No puede ser instanciada una clase abstracta.');
    }

    super();

    this._CSS = new CSSStyleSheet();
    this._CSS.replaceSync(/*css*/`
      :host {
        --boton-alto: 2.5rem;
        --boton-radio-borde: calc(var(--boton-alto) / 2);
        --boton-justify-content: flex-start;

        --clr-hover: transparent;
        --clr-active: transparent;
        --clr-fondo: transparent;
        --clr-texto: #000000;
      
        display: inline-flex;
      }
      
      :host([data-etiqueta]) span {
        display: block;
      }

      :host([data-icono]) md-icono {
        display: inline-flex;
      }

      button, a {
        display: inline-flex;
        align-items: center;
        justify-content: var(--boton-justify-content);
      
        text-decoration: none;
        font-family: inherit;
        white-space: nowrap;
        text-overflow: ellipsis;
        color: var(--clr-texto);
        
        overflow: hidden;
        height: var(--boton-alto);
        box-sizing: border-box;
        padding: 0 1.5rem;
        cursor: pointer;
        position: relative;
      
        border: none;
        border-radius: var(--boton-radio-borde);
        background-color: var(--clr-fondo);
      
        transition: 
          box-shadow 0.2s ease 0s,
          background-color 0.2s ease 0s,
          color 0.2s ease 0s,
          padding 0.2s ease 0s,
          gap 0.2s ease 0s,
          max-width 0.2s ease 0s;
      }
      
      :host([data-variante='texto-icono']) button, :host([data-variante='texto-icono']) a {
        padding: 0 1.5rem 0 1rem;
        gap: var(--espaciado-mediano);
      }

      :host([data-variante='icono']) button, :host([data-variante='icono']) a {
        padding: 0 1rem;
        gap: 0;
        max-width: min-content;
      }

      :host([data-variante='icono']) span {
        width: 0;
        opacity: 0;
        font-size: 0;
      }

      :host([data-expandir]) button, :host([data-expandir]) a {
        flex: 1;
      }

      button::after, a::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: transparent;
      
        transition: background-color .2s ease 0s;
      }
      
      md-icono {
        display: none;
      }

      span {
        display: none;

        font-size: var(--fs-etiqueta-grande);
        line-height: var(--lh-etiqueta-grande);
        letter-spacing: var(--ls-etiqueta-grande);
        font-weight: var(--fw-medio);

        transition:
          width 0.2s ease 0s,
          font-size 0.25s ease 0s,
          opacity 0.2s ease 0s;
      }
    `);

    this._onClick = this._onClick.bind(this);
    this._reglaCSSHost = Array.from(this._CSS.cssRules).find(reglaCSS => {
      return reglaCSS.selectorText === ':host';
    });

    this._icono = new MDIcono();
    this._icono.setAttribute('data-opsz', '20');
    this._icono.setAttribute('data-escala', 'm');
    this._icono.setAttribute('data-icono', this.dataIcono);

    this._etiqueta = document.createElement('span');
    this._etiqueta.textContent = this.dataEtiqueta;

    this.attachShadow({ mode: 'open' }).adoptedStyleSheets = [this._CSS];

    this._determinarBotonSchrodinger();
    this.shadowRoot.appendChild(this._botonSchrodinger);
  }

  _crearEvento () {
    return new CustomEvent(this.dataEvento, {
      bubbles: true,
      composed: true
    });
  }

  _onClick () {
    if (this.dataEvento) this._botonSchrodinger.dispatchEvent(this._crearEvento());

    const formulario = this.closest('form');

    if ((!this.type || this.type === 'submit') && formulario) {
      formulario.submit();
    } else if (this.type === 'reset' && formulario) {
      formulario.reset();
    }
  }

  _determinarBotonSchrodinger () {
    if (this.href) {
      this._botonSchrodinger = document.createElement('a');
      this._botonSchrodinger.setAttribute('href', this.href);
    } else {
      this._botonSchrodinger = document.createElement('button');
    }

    this._botonSchrodinger.appendChild(this._icono);
    this._botonSchrodinger.appendChild(this._etiqueta);
  }

  _reconstruirBotonSchrodinger (esBoton) {
    const nuevoBotonSchrodinger = esBoton
      ? document.createElement('button')
      : document.createElement('a');

    [...this._botonSchrodinger.attributes].forEach(atributo => {
      nuevoBotonSchrodinger.setAttribute(atributo.nodeName, atributo.nodeValue);
    });

    this.shadowRoot.querySelector(this._botonSchrodinger.tagName).replaceWith(nuevoBotonSchrodinger);
    this._botonSchrodinger = nuevoBotonSchrodinger;
    this._botonSchrodinger.appendChild(this._icono);
    this._botonSchrodinger.appendChild(this._etiqueta);
  }

  get href () { return this.getAttribute('href'); }

  set href (link) { this.setAttribute('href', link); }

  get type () { return this.getAttribute('type'); }

  set type (tipoBoton) { this.setAttribute('type', tipoBoton); }

  get dataColorFondo () { return this.dataset.colorFondo; }

  set dataColorFondo (color) { this.dataset.color = color; }

  get dataColorTexto () { return this.dataset.colorTexto; }

  set dataColorTexto (color) { this.dataset.colorTexto = color; }

  get dataVariante () { return this.getAttribute('data-variante'); }

  set dataVariante (variante) { this.dataset.variante = variante; }

  get dataEvento () { return this.dataset.evento; }

  set dataEvento (evento) { this.dataset.evento = evento; }

  get dataExpandir () { return this.hasAttribute('data-expandir'); }

  set dataExpandir (bool) { this.toggleAttribute('data-expandir', Boolean(bool)); }

  get dataIcono () { return this.dataset.icono; }

  set dataIcono (icono) { this.dataset.icono = icono; }

  get dataEtiqueta () { return this.dataset.etiqueta; }

  set dataEtiqueta (etiqueta) { this.dataset.etiqueta = etiqueta; }

  connectedCallback () {
    this._botonSchrodinger.addEventListener('click', this._onClick);
  }

  disconnectedCallback () {
    this._botonSchrodinger.removeEventListener('click', this._onClick);
  }

  attributeChangedCallback (name, oldValue, newValue) {
    if (oldValue === newValue) return;

    !newValue
      ? this._botonSchrodinger.removeAttribute(name)
      : this._botonSchrodinger.setAttribute(name, newValue);

    switch (name) {
      case 'href':
        if (oldValue !== null && newValue !== null) return;

        const esBoton = oldValue !== null && newValue === null;
        this._reconstruirBotonSchrodinger(esBoton);
        break;

      case 'data-color-fondo':
        this._reglaCSSHost.style.setProperty('--clr-fondo', !newValue ? 'transparent' : newValue);
        break;

      case 'data-color-texto':
        this._reglaCSSHost.style.setProperty('--clr-texto', !newValue ? '#000000' : newValue);

        const colorHover = getComputedStyle(this).getPropertyValue('--clr-texto') + '14'; // .08
        this._reglaCSSHost.style.setProperty('--clr-hover', !newValue ? 'transparent' : colorHover);

        const colorActive = getComputedStyle(this).getPropertyValue('--clr-texto') + '1f'; // .12
        this._reglaCSSHost.style.setProperty('--clr-active', !newValue ? 'transparent' : colorActive);
        break;

      case 'data-etiqueta':
        this._etiqueta.textContent = newValue;
        break;

      case 'data-icono':
        this._icono.setAttribute('data-icono', newValue);
        break;
    }
  }
}
