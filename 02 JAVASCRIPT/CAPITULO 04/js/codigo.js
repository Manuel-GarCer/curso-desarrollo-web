// console.log('funciona');
// const quiz = document.querySelector('.quiz');
// quiz.style.backgroundColor = 'red';

const form = document.querySelector(".quiz-form");
const resultado = document.querySelector(".result"); //para manipular el %

const respCorrectas = ["A", "A", "A", "A"];

form.addEventListener("submit", (e) => { //submit = enviar evento q se manda al rellenar el formulario
  // console.log(e);
  e.preventDefault(); //metodo preventDefault para q no se ejecute y aparezca en url(direccion)
  // console.log(form.q1.value);
  // console.log(form.q2.value);
  // console.log(form.q3.value);
  // console.log(form.q4.value);
  const respUsuario = [
    form.q1.value, //con esto obtenemos el valor de respuesta 1 q puede ser A o B de los demás igual
    form.q2.value,
    form.q3.value,
    form.q4.value,
  ];

  let puntaje = 0; //por buena practica se le pone q inicie con valor 0

  respUsuario.forEach(function (valor, indice) { //metodo forEach para iterar,  funciona con arrays 
    if (valor === respCorrectas[indice]) { //el indice q empiece de 0 y aumenta
      console.log(`La respuesta de la pregunta ${indice + 1} es correcta ⭐`);//se le pone + 1 pues comienza en 0
      // puntaje = puntaje + 25;
      puntaje += 25; //nuevo valor de variable global puntaje (let puntaje)
    } else {
      console.log(`La respuesta de la pregunta ${indice + 1} es erronea 💥`);
    }
  });
  // console.log(puntaje);
//   resultado.querySelector("span").textContent = `${puntaje}%`;
  // resultado.classList.remove('d-none');

  let posicionEjeY = scrollY; // hacer un algoritmo para que suba el scroll a la parte superior
  // console.log(posicionEjeY);
  // setInterval(function(){ //setInterval funcion establecer intervalo q se ejecute cada 1000ms
  //     console.log('soy un mensaje');
  // }, 1000);
  let animacionTop = setInterval(function () {
    if (posicionEjeY <= 0) {
        clearInterval(animacionTop); // stop el intervalo para q no se haga infinito bucle
    } else {
      // x ,  y
    //   console.log(posicionEjeY);
        posicionEjeY -= 7;
        scrollTo(0, posicionEjeY);
    }
  }, 5);

  resultado.classList.remove('d-none'); //para animacion de % creciendo 

  let sumaPuntajeTotal = 0;
  let velocidad = 50;

  let animacionSuma = setInterval(() => {
    if(sumaPuntajeTotal === puntaje){
        clearInterval(animacionSuma);
    } else {
        sumaPuntajeTotal += 5;
    }

    resultado.querySelector('span').textContent = `${sumaPuntajeTotal}%`;

  }, velocidad);
});

// let c = 0;

// while (c < 10) { //while = mientras
//   console.log("hola");
//   c++;
// }