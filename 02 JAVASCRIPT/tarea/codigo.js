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

const arrayFilms = {
    names: ["Star Wars", "El Padrino", "Avengers", "La lista de Schindler", "Forrest Gump", "Terminator", "Titanic", "Toy Story", "Spiderman", "Batman"];
    imprimirNames: function(etiqueta){
        let plantilla = "";
        for(let i = 0; i < this.names.length; i++){
            //console.log(this.names[i]);
            plantilla = plantilla + `<h2>${this.names[i]} </h2>`
        }
        console.log(plantilla);
        etiqueta.innerHTML = plantilla;
    }
}

const cine = {
    nombre: "Cineplanet Primavera",
    ciudad: "Lima",
    costoFuncion: 20,
    direccion: "Av. Angamos Este 268",
    imprimirThis: function(){
        console.log(this);
    },
}
cine.imprimirThis();
let rpt4 = document.querySelector(".rpt4");
personaje.imprimirThis(rpt4);


console.log("***************************************");

//RESPUESTA N°5
let boton = document.getElementById("btn");
boton.addEventListener("click",() => {
    boton.style.backgroundColor= "red";
})

// como Programar un boton para que cuando se haga "click" cambie de color de fondo?

%%javascript
(function() {
    let boton = document.getElementById("boton");
    boton.addEventListener("click", myf1);
    boton.addEventListener("mouseover", function(){boton.textContent="¡Hola!"});
    boton.addEventListener("mouseout", function(){boton.textContent="No te vayas"});

    let contador = 0;

    function myf1() {
      if (contador % 2 ==0) {
          boton.style.backgroundColor= "red";
      } else {
          boton.style.backgroundColor = "blue";
      }
      contador += 1;
    }
})();

// how to Program a button so that when it is "clicked" it changes its background color?







