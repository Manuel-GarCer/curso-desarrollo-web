// TEMPLATE STRING
const nombre = "Jaimito";
const apellido = "Rosales";
const fullName = nombre + " " + apellido;
console.log(fullName);

let edad = 999;

const fullDataTs = `hola soy ${fullName}, y tengo ${edad} años de edad`
console.log(fullDataTs);

const suma = +`${edad + 100}`;
console.log(suma);

console.log("*****************************************");
//MANIPULACION DEL DOM
const bloque = document.querySelector("#bloque");
console.log(bloque);
let html = `
    <h1>hola, soy ${fullName}</h1>
    <h4>y tengo ${edad} años de edad</h4>
`;

bloque.innerHTML = html;




