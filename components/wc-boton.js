const template = document.createElement('template');
template.innerHTML = /*html*/`
<style>
  :host {
    --clr-after: transparent;

    display: flex;
  }

  button, a {
    display: inline-flex;
    align-items: center;

    text-align: left;
    text-decoration: none;
    font-family: inherit;
    white-space: nowrap;
    text-overflow: ellipsis;
    
    overflow: hidden;
    height: 2.5rem;
    box-sizing: border-box;
    padding: 0 1.5rem;
    cursor: pointer;
    position: relative;

    border: none;
    border-radius: 1.25rem;

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
    background-color: var(--clr-after);
  }

  ::slotted([slot='etiqueta']) {
    font-size: var(--fs-etiqueta-grande);
    line-height: var(--lh-etiqueta-grande);
    letter-spacing: var(--ls-etiqueta-grande);
    font-weight: var(--fw-medio);
  }
</style>
`;

class WCBoton extends HTMLElement {
  static observedAttributes = ['href', 'type'];

  constructor () {
    super();

    this._onClick = this._onClick.bind(this);

    this._etiquetaSlot = document.createElement('slot');
    this._etiquetaSlot.setAttribute('name', 'etiqueta');

    this._iconoSlot = document.createElement('slot');
    this._iconoSlot.setAttribute('name', 'icono');

    this.attachShadow({ mode: 'open' });
    this.shadowRoot.appendChild(template.content.cloneNode(true));

    this._determinarBotonSchrodinger();
    this.shadowRoot.appendChild(this._botonSchrodinger);
  }

  _onClick () {
    const formulario = this.closest('form');

    if (!this.type || this.type === 'submit') {
      formulario.submit();
    } else if (this.type === 'reset') {
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

    this._botonSchrodinger.appendChild(this._etiquetaSlot);
    this._botonSchrodinger.appendChild(this._iconoSlot);
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
    this._botonSchrodinger.appendChild(this._etiquetaSlot);
    this._botonSchrodinger.appendChild(this._iconoSlot);
  }

  get href () { return this.getAttribute('href'); }

  set href (link) { this.setAttribute('href', link); }

  get type () { return this.getAttribute('type'); }

  set type (tipoBoton) { this.setAttribute('type', tipoBoton); }

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
    }
  }
}

customElements.define('wc-boton', WCBoton);
