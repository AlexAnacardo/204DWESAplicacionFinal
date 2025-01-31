const claveApiNasa = 'VsYbmhgR6eLeRLrMI8Ody4p5CrNLecqGqedsu46e';
const fechaHoy = new Date();
año= fechaHoy.getFullYear();
mes= fechaHoy.getMonth() +1;
dia= fechaHoy.getDate();

const url = "https://api.nasa.gov/planetary/apod?api_key=" + claveApiNasa + "&date="+año+"-"+mes+"-"+dia;

fetch(url)
    .then(response => response.json())
    .then(json => {
        const imagen = document.getElementById("imagenNasaJs");        
        
        imagen.src = json.url; 
    })
    .catch(error => {
        console.error('Error al obtener los datos de la API:', error);
    });
