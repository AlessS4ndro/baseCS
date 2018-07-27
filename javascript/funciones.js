addEventListener('load',inicializarEventos,false);

var tipo;
var boton;
function inicializarEventos()
{

  boton=document.getElementsByName("botonEnviar")[0];
  //var botonIngresar=document.getElementById("botonIngresar");
  boton.addEventListener("click",presionarEnlace,false);
  //botonIngresar.addEventListener("click",presionarEnlace,false);
  var radios=document.getElementsByName("clave");
  for (var x=0;x<radios.length;x++){
    alert("entro al for");
    if(radios[x].checked){
      tipo=radios[x].value;
      alert("el tipo es: "+tipo);
    }
  }
}
function presionarEnlace(e)
{
  formulario = document.getElementById("formulario");
  e.preventDefault();
  var url=formulario.getAttribute("action");
  alert ("la url es: "+url);
  mostrarDatos(url);
}
var http;
function mostrarDatos(url)
{
  http = new XMLHttpRequest();
  http.onreadystatechange=procesarEventos;
  palabraMagica = document.getElementsByName("inputBuscar")[0];
  alert("palabramagica: "+palabraMagica.value);
  //alert("el tipo es: "+tipo.value);
  var params = "clave="+palabraMagica.value+"&tipo="+"nombre"+"&botonEnviar="+"enviar";
  alert("el parametro es: "+params);
  http.open('GET', url, true);
  http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  http.send(params);
}

function procesarEventos()
{
  var campoAjax = document.getElementById("campoBusqueda");
  if(http.readyState==4){
    campoAjax.innerHTML = http.responseText;
  }
  else{
    campoAjax.innerHTML= "cargando....";
  }

  //inicializarEventos();
  //alert(botonIngresar.value);
}
