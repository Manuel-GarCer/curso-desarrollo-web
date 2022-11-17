//FUNCIONES
saludar();

function saludar(){
    console.log("hola mundo")
}

saludar();

var num2 = 10;

let num = 10;

console.log("*********************************************");
const fechaNacimiento = 1756;
const nombre = "Juan"

function obtenerEdad(fechaNac, nom){
    let edad = 2022 - fechaNac;
    console.log(`Hola, soy ${nom} y tengo ${edad} años de edad`);
}

obtenerEdad(fechaNacimiento, nombre);

let apellido = "Arroyo"
console.log(apellido);

function saludar2(){
    apellido ="Marquez";
    console.log(`hola, mi apellido es ${apellido}`);
}
saludar2();
console.log(apellido);

function saludar3(ape){
    console.log(`hola soy ${ape}`)
}
saludar3(apellido)
console.log("*********************************************");

const arrayNums = [123,84,345,864,34578];

function printArray(array){
    for(let i = 0; i < array.length; i++){
        console.log(array[i]);
    }
}
printArray(arrayNums);

console.log("*********************************************");

function sumar(num1, num2){
    let res = num1 + num2;
    // console.log(`la suma de ${num1} y ${num2} es igual a: ${res}`);
    return res;
}

let respuesta = sumar(5, 3);
console.log(sumar(2,10));