/**
 * Colección de utilidades utilizadas a través de todos los componentes.
 */
export const componentsUtil = (function () {
  /**
   * Carga los estilos del elemento en cuestión según
   * el DOM en el que se encuentre, ubicando dichos estilos dentro de la etiqueta
   * `head` del `DOM` o, si por el encontrario este se encuentra dentro de un `Shadow DOM`,
   * los agrega al inicio de este.
   * @param {HTMLElement} elemento Elemento del `DOM` que se usará como referencia para
   *     cargar los estilos.
   * @param {string} ruta  Directorio en el que se encuentran los estilos `CSS` que se
   *     añadirán.
   */
  const cargarEstilos = (elemento, ruta) => {
    const link = document.createElement('link');

    establecerAtributos(link, {
      rel: 'stylesheet',
      href: ruta,
    });

    const htmlRaiz = elemento.getRootNode();
    switch (htmlRaiz.toString()) {
      // Si este se encuentra dentro de un Shadow DOM.
      case '[object ShadowRoot]':
        if (!htmlRaiz.querySelector(`link[href='${ruta}']`)) {
          htmlRaiz.prepend(link);
        }
        break;

      // Si este se encuentra en un DOM normal.
      case '[object HTMLDocument]':
        const head = htmlRaiz.querySelector('head');

        if (!head.querySelector(`link[href='${ruta}']`)) {
          head.appendChild(link);
        }

        break;
    }
  };

  /**
   * Recibe un objeto con los atributos y sus respectivos valores para ser añadidos
   * a un elemento `HTML`. Su funcionamiento es similar al del método `setAttribute()`.
   * @param {HTMLElement} elemento Elemento del `DOM` al que se le agregarán los atributos.
   * @param {{atributo: valor}} atributos Colección de atributos emparejados por el atributo en
   *     cuestión y su valor.
   */
  const establecerAtributos = (elemento, atributos) => {
    for (let atributo in atributos) {
      elemento.setAttribute(atributo, atributos[atributo]);
    }
  };

  return {
    cargarEstilos,
    establecerAtributos,
  };
})();
