const btn = document.querySelector("button")
//console.log(btn)
const popupCaja = document.querySelector(".popup-caja");
// console.log(popupCaja);

const btnClose = document.querySelector(".popup-close")

btn.addEventListener("click", () => {
    // console.log("hiciste click")
    popupCaja.classList.add("mostrarCaja") 
    //cuando se hace click en boton a su classList agregar mostrarCaja
});

btnClose.addEventListener("click", () => {
    popupCaja.classList.remove("mostrarCaja")
    //cuando se hace click en X a su classList remover mostrarCaja
})

window.addEventListener("keyup", e => {  //keyup precionar tecla
    //console.log(e)
    if(e.key === "Escape"){ //key esta dentro del e
        popupCaja.classList.remove("mostrarCaja")
    //cuando se hace click en Escape a su classList remover mostrarCaja
    }
} )

popupCaja.addEventListener("click", e => {
    if (e.target.classList.contains("popup-caja")){ //contains es contiene dentro de sus propiedaess
        popupCaja.classList.remove("mostrarCaja");
    //cuando se hace click en fuera de imagen a su classList remover mostrarCaja
    }
})