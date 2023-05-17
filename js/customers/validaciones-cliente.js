export const campoNumericoInvalido = (string) => {
  return !/^\d+$/.test(string.trim());
};

export const caracteresInvalidos = (string) => {
  return !/^[A-Za-z\d\s.áéíóúüñÁÉÍÓÚÜÑ]*$/.test(string.trim());
};

export const campoVacio = (string) => {
  return !string.trim();
};
