const fs = require('fs');

// Valor inicial
const valorInicial = 0;

// Guardar el valor en un archivo llamado "contador.txt"
fs.writeFileSync('contador.txt', valorInicial.toString());

console.log('Valor inicial guardado en "contador.txt".');