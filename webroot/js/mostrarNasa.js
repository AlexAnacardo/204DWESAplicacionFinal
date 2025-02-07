//La clave necesaria para acceder a la API de la NASA
const claveApiNasa = 'VsYbmhgR6eLeRLrMI8Ody4p5CrNLecqGqedsu46e';

//Obtengo la fecha de hoy
const fechaHoy = new Date();
//Obtengo el año actual y lo introduzco en una variable
año= fechaHoy.getFullYear();
//Obtengo el mes actual y lo introduzco en una variable
mes= fechaHoy.getMonth() +1;
//Obtengo el dia actual y lo introduzco en una variable
dia= fechaHoy.getDate();

//Hago una llamada a la api de la nasa aportandole los archivos necesarios
const url = "https://api.nasa.gov/planetary/apod?api_key=" + claveApiNasa + "&date="+año+"-"+mes+"-"+dia;

fetch(url)
    .then(response => response.json())
    .then(json => {
        //Introduzco la devolucion de la api  en un objeto
        const imagen = document.getElementById("imagenNasaJs");        
        //Obtengo el enlace a la imagen devuelta y la introduzco en el src de la etiqueta <img>
        imagen.src = json.url; 
    })
    .catch(error => {
        console.error('Error al obtener los datos de la API:', error);
    });
