import MDIcono from './md-icono.js';

export default class BotonIcono extends HTMLElement {
  static observedAttributes = ['href', 'type', 'data-color-fondo', 'data-color-texto',
    'data-evento', 'data-icono', 'data-delineado'];

  constructor () {
    super();

    this._CSS = new CSSStyleSheet();
    this._CSS.replaceSync(/*css*/`
      :host {
        --clr-hover: transparent;
        --clr-active: transparent;
        --clr-fondo: transparent;
        --clr-texto: #000000;
      
        display: inline-flex;
      }

      :host([data-delineado]) button, :host([data-delineado]) a {
        border: 1px solid var(--clr-borde);
      }

      button, a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
      
        color: var(--clr-texto);
        text-decoration: none;
        
        height: 2.5rem;
        box-sizing: border-box;
        cursor: pointer;
        position: relative;
        padding: var(--espaciado-mediano);
        overflow: hidden;
      
        border: none;
        border-radius: 1.25rem;
        background-color: var(--clr-fondo);
      
        transition: 
          box-shadow 0.2s ease 0s,
          background-color 0.2s ease 0s,
          color 0.2s ease 0s,
          padding 0.2s ease 0s,
          gap 0.2s ease 0s,
          max-width 0.2s ease 0s;
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

      button:hover::after, a:hover::after {
        background-color: var(--clr-hover);
      }
    
      button:active::after, a:active::after {
        background-color: var(--clr-active);
      }
    
      button:focus-visible, a:focus-visible {
        outline: none;
      }
    
      button:focus-visible::after, a:focus-visible::after {
        background-color: var(--clr-active);
      }
    `);

    this._onClick = this._onClick.bind(this);
    this._reglaCSSHost = Array.from(this._CSS.cssRules).find(reglaCSS => {
      return reglaCSS.selectorText === ':host';
    });

    this._icono = new MDIcono();
    this._icono.setAttribute('data-opsz', '24');

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
  }

  get href () { return this.getAttribute('href'); }

  set href (link) { this.setAttribute('href', link); }

  get type () { return this.getAttribute('type'); }

  set type (tipoBoton) { this.setAttribute('type', tipoBoton); }

  get dataColorFondo () { return this.dataset.colorFondo; }

  set dataColorFondo (color) { this.dataset.color = color; }

  get dataColorTexto () { return this.dataset.colorTexto; }

  set dataColorTexto (color) { this.dataset.colorTexto = color; }

  get dataEvento () { return this.dataset.evento; }

  set dataEvento (evento) { this.dataset.evento = evento; }

  get dataIcono () { return this.dataset.icono; }

  set dataIcono (icono) { this.dataset.icono = icono; }

  get dataDelineado () { return this.hasAttribute('data-delineado'); }

  set dataDelineado (bool) { this.toggleAttribute('data-delineado', Boolean(bool)); }

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

      case 'data-icono':
        this._icono.setAttribute(name, newValue);
        break;
    }
  }
}

customElements.define('boton-icono', BotonIcono);
