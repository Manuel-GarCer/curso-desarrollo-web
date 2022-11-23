//EJECUCIONES SINCRONAS Y ASINCRONAS

//ASINCRONADA
// setInterval(function(){
//     console.log("ejecucion asincrona")
// },1000);

//SINCRONAS: se ejecutan con forme se llaman
let nombre = "Manuel"

let apellido = "Garcia"

const fullName = () => {
    return `${nombre} ${apellido}`
}

const nombreCompleto = fullName()
// console.log(nombreCompleto)

//PETICIONES Y RESPUESTA A APIS O BASE DE DATOS - JSON
//JSON: JAVASCRIP OBJECT NOTACION

//FETCH -> DEVOLVER UNA PROMESA

// console.log(fetch("data/personas.json"));
// fetch("data/personas.json")
//     .then(datos => console.log(datos.json()))
//     .catch(err => console.log(err));

fetch("https://api.discogs.com/database/search?q=Nirvana&token=SWnhKzvvwpUPeuiRLGlnTCSkJWuSEpspuSejiZpX")
    .then(data => console.log(data.json()));