let num1 = 10;
let num2 = 23532378;
console.log(num1, num2);
console.log("10")

const pi = 3.1416;
let radio = 11.5;

//como se consigue el area de un circulo ??
let areaCirculo = pi * radio ** 2;
console.log(areaCirculo);

// residuo
let num3 = 12;
console.log(num3 % 2);
if(num3 % 2 == 0){
    console.log("que el numero es par");
} else {
    console.log("el numero es impar")
}

//suma y resta
let num4 = "10";
let num5 = 5.5;
let res1 = parseInt(num4) + num5; //convertir texto en Numero
let res2 = Number(num4) + num5;    //lo mismo convertir de texto a numero
let res3 = +num4 + num5; //otro metodo de texto a numero
console.log(res1, res2, res3);
console.log("*****************************************");

//INCREMENTO Y DISMINUCION
let num6 = 4;
//incrementar 5 al num6
let num7 = num6 + 5;
console.log(num7);

num6 = num6 + 5;
console.log(num6);
num6 += 13; //num6 = num6 +13
console.log(num6);

num6 -= 2; //num6 = num6 - 2
console.log(num6);//num6 = num6 / 2
num6 *= 2; //num6 = num6 * 2
console.log(num6);
num6 /= 3 //num6 = num6 / 2
console.log(num6);
console.log("*****************************************");
//num6 = num6 - 1;
//num6 -= 1;
num6--;
console.log(num6);
num6++;
console.log(num6);
console.log("*****************************************");

// METODOS
let num8 = 100
let divi = num8 / 3;
console.log(divi.toFixed(2)); //numero de decimales

let num9 = 10.599;
console.log(num9.toFixed(2)); //numero de decimales y lo redondea pero es un texto
// y para convertirlo a numero seria:
console.log(parseFloat(num9.toFixed(2))); //una forma
console.log(Number(num9.toFixed(2))); //otra forma
console.log(+num9.toFixed(2)); // otra forma
console.log("*****************************************");
//OBJETO MATH
let num91 = 10.5;
let res4 = Math.floor(num91); //acerca al piso entero del numero
console.log(res4);
let res5 = Math.ceil(num91); //acerca al techo entero del numero
console.log(res5);
let res6 = Math.round(num91); //ahora si redondeo
console.log(res6);

let aleatorio = Math.random() ;
console.log(aleatorio); //devuelve numero estre 0 y 1 pero nunca ni 0 ni 1 solo entre ellos

let aleatorio1 = Math.random() * 10; 
console.log(Math.floor(aleatorio1)); //lo trasformamos a entero pero nunca 10 (por ser piso)
console.log(Math.ceil(aleatorio1)); //lo trasformamos a entero pero nunca 0 (por ser techo)
