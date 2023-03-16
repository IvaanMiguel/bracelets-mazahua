export const componentsUtil = (function () {
    function cargarEstilos(elemento, ruta) {
        const link = document.createElement('link');
        link.setAttribute('rel', 'stylesheet');
        link.setAttribute('href', ruta);

        const htmlRaiz = elemento.getRootNode();
        switch (htmlRaiz.toString()) {
            case '[object ShadowRoot]':
                if (!htmlRaiz.querySelector(`link[href='${ruta}']`)) {
                    htmlRaiz.appendChild(link);
                }
                break;
            case '[object HTMLDocument]':
                const head = htmlRaiz.querySelector('head');

                if (!head.querySelector(`link[href='${ruta}']`)) {
                    head.appendChild(link);
                }

                break;
        }
    }

    return {
        cargarEstilos
    };
})();
