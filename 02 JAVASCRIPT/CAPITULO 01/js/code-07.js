//FUNCION DE EXPRESION
saludar();
function saludar(){
    console.log("hola a todos");
}
//ARROW FUNTIONS, FUNCIONES DE FLECHA

const saludar2 = () => {
    console.log("hola desde la funcion saludar2");
}

saludar2();

const sumar = (num1, num2) => {
    return num1 + num2;
}
const res1 = sumar (2,3);

console.log(res1);
console.log("*********************************************");

const multiPort2 = num => { //por ser un solo parametro sin parentesis
    return num * 2;
}
console.log(multiPort2(16)); //32

const multiPor3 = num => num * 3; //lo mismo q anterior pero sin{} ni palabra return
console.log(multiPor3(9));

const restaVarios = (a, b, c) => a - b - c //lo mismo pero sin{} ni palabra return
console.log(restaVarios(80,5,12));