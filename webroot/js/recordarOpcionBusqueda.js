radioTodos=document.getElementById("todos");
radioActivos=document.getElementById("activos");
radioInactivos=document.getElementById("inactivos");

inputOculto=document.getElementById("opcionBusquedaOculto");

radioTodos.addEventListener('click', function(event) {
    inputOculto.setAttribute("value", "todos");
});

radioActivos.addEventListener('click', function(event) {
    inputOculto.setAttribute("value", "activos");
});

radioInactivos.addEventListener('click', function(event) {
    inputOculto.setAttribute("value", "inactivos");
});

