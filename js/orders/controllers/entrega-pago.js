// const clabeInput = document.querySelector('[name="clabeCuenta"]');
// clabeInput.addEventListener('keydown', function (e) {
//   let clabe = this.value;

//   if (e.keyCode === 8) return;

//   if (clabe.length === 3) {
//     clabe = this.value.replace(/\s/g, '');
//     clabe = agregarEspacio(3, clabe);
//   } else if (clabe.length === 7) {
//     clabe = this.value.replace(/\s/g, '');
//     clabe = agregarEspacio(3, clabe);
//     clabe = agregarEspacio(7, clabe);
//   } else if (clabe.length === 19) {
//     clabe = this.value.replace(/\s/g, '');
//     clabe = agregarEspacio(3, clabe);
//     clabe = agregarEspacio(7, clabe);
//     clabe = agregarEspacio(19, clabe);
//   }

//   this.value = clabe;
// });

// function insertarCaracteres(string, caracteres, posiciones) {
//   let resultado = string;
//   for (let i = 0; i < caracteres.length; i++) {
//     resultado = resultado.slice(0, posiciones[i]) + caracteres[i] + resultado.slice(posiciones[i]);
//   }
//   return resultado;
// }

// const tarjetaInput = document.querySelector('[name="numeroTarjeta"]');
// tarjetaInput.addEventListener('keydown', function (e) {
//   let numero = this.value;
//   const numeroFantasma = numero.replace(/\s/g, '');

//   if (e.keyCode === 8) return;

//   if (numero.length === 4) {
//     numero = this.value.replace(/\s/g, '');
//   }
// });
