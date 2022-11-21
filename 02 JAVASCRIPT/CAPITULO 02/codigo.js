const tareaInput = document.querySelector("input");
const btn = document.querySelector("button");
const ul = document.querySelector("ul");
const alerta = document.querySelector(".alerta");

btn.addEventListener("click", () => {
    // console.log('hiciste click');
    //console.log(tareaInput.value);
    const textoLimpio = tareaInput.value.trim(); //trim elimina espacio en blanco
    if(textoLimpio === ""){
        alerta.innerHTML = "Debes ingresar una tarea en la casilla";
    }
    else {
        alerta.innerHTML = "";
        const li = `<li>${textoLimpio}</li>`;
        ul.insertAdjacentHTML("beforeend", li); //insertar al ultimo li dentro de ul
        tareaInput.value = "";
    }
})

const listaTareas = document.querySelectorAll("li"); //querySelectorAll busca todos los li

// for(let i = 0; i < listaTareas.length; i++){
//     listaTareas[i].addEventListener("click",function(){
//         listaTareas[i].remove();
//     })
// }

ul.addEventListener("click", function(evento){ //escuchamos en el ul y crea un objeto llamado "evento" y tiene varias propiedades dentro
    //console.log(evento.target.tagName) //tagName dentro del target y target esta dentro del objeto evento  
    if(evento.target.tagName === "LI") { //tagName nos da LI si es click adentro y UL si es afuera
        evento.target.remove();
    }
})