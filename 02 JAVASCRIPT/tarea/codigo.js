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

let bloque3 = document.querySelector(".rpt3");

const nomb = {

    arrayNomb: ["Manuel", "Christian", "Carlos", "María", "Juan", "Erika", "David", "Luis", "Jenyfer", "Alex"],

    printNomb: function(etiqueta3){
        let plantilla3 = "";
        for(let i = 0; i < this.arrayNomb.length; i++){
            //console.log(this.arrayNomb[i]);
            plantilla3 = plantilla3 + `<h3>${this.arrayNomb[i]}</h3>`
        }
        console.log(plantilla3);
        etiqueta3.innerHTML = plantilla3
    }
}

nomb.printNomb(bloque3);

console.log("***************************************");

//RESPUESTA N°4
let bloque4a = document.querySelector(".rpt4a");
let bloque4b = document.querySelector(".rpt4b");
const cine = {
    nombre: "Cineplanet Primavera",
    ciudad: "Lima",
    costoFuncion: 20,
    direccion: "Av. Angamos Este 268",
    names: ["Star Wars", "El Padrino", "Avengers", "La lista de Schindler", "Forrest Gump", "Terminator", "Titanic", "Toy Story", "Spiderman", "Batman"],
    imprimirNames: function(etiqueta4){
        let plantilla4 = "";
        for(let i = 0; i < this.names.length; i++){
            //console.log(this.names[i]);
            plantilla4 = plantilla4 + `<h3>${this.names[i]}</h3>`
        }
        console.log(plantilla4);
        etiqueta4.innerHTML = plantilla4;
    },
    imprimirThis: function(){
        console.log(this);
    },

}
cine.imprimirNames(bloque4b);

cine.imprimirThis(bloque4a)

bloque4a.innerHTML = JSON.stringify(cine)




console.log("***************************************");

//RESPUESTA N°5

let boton = document.getElementById("btn");
boton.addEventListener("click",() => {
    boton.style.backgroundColor= "red";
})







