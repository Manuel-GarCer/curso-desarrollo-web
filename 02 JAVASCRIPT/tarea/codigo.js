//RESPUESTA N° 1 

const bloque1a = document.querySelector(".rpt1a");

let minus = "unversidad continental";
let minusAMayus = minus.toUpperCase();

console.log(minusAMayus);

bloque1a.innerHTML = minusAMayus;

const bloque1b = document.querySelector(".rpt1b");

let mayus = "DESARROLLO WEB";
let mayusAMinus = mayus.toLowerCase();

console.log(mayusAMinus);

bloque1b.innerHTML = mayusAMinus;

console.log("***************************************");

//RESPUESTA N° 2

const bloque2 = document.querySelector(".rpt2");

function sumar (numA, numB) {
    let rpt2 = numA + numB
    // console.log(`la suma de ${numA} y ${numB} es igual a: ${rpt2}`);
    return rpt2;
}

let rpt2 = sumar(4, 6);
// console.log(rpt2) 

bloque2.innerHTML = rpt2;

console.log("***************************************");

//RESPUESTA N° 3

const bloque3 = document.querySelector(".rpt3");

const arrayNomb = ["Manuel", "Christian", "Carlos", "María", "Juan", "Erika", "David", "Luis", "Jenyfer", "Alex"];

function printArray(array){
    for(let i = 0; i < array.length; i++){
        console.log(array[i]);
    }
}
printArray(arrayNomb);
document.write(arrayNomb) 

bloque3.innerHTML = printArray(arrayNomb);

// document.getElementById("prueba").innerHTML = printArray(arrayNomb);

console.log("***************************************");

//RESPUESTA N°4

const arrayFilms = ["Star Wars", "El Padrino", "Avengers", "La lista de Schindler", "Forrest Gump", "Terminator", "Titanic", "Toy Story", "Spiderman", "Batman"];

const cine = {
    nombre: "Cineplanet Primavera",
    ciudad: "Lima",
    costoFuncion: 20,
    direccion: "Av. Angamos Este 268"
}


