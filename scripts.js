const element = document.querySelector('.navbar-toggler');
const boton = document.querySelector('#botonmenu');
element.addEventListener('click', event => {
  if(boton.classList.contains("btn-close")){
    boton.classList.replace('btn-close','navbar-toggler-icon');
  }else{
    boton.classList.replace('navbar-toggler-icon', 'btn-close');
  }
  
});