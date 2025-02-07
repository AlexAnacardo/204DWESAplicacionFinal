<?php
if(!isset($arrayVista)){
    $arrayVista=[
        'Nasa' => [
            'Titulo' => '', 
            'Explicacion' => '',
            'UrlFoto' => ''        
        ],
        'Frankfurter' => [
            'Cambio' => '1',
            'DivisaInicio' => 'EUR',
            'DivisaDestino' => '',
            'CantidadInicio' => null
        ]
    ];
}

//Como estas 4 variabes siempre trabajan juntas, solo incluyo una de ellas en el comprobante del if porque si una no esta inicializada, las otras no lo  estaran
if(!isset($_SESSION['CambioDivisa'])){
    $_SESSION['CambioDivisa']=0;
    $_SESSION['DivisaInicio']= 0;
    $_SESSION['DivisaDestino']= "EUR";
    $_SESSION['CantidadInicio']= "EUR";
}

//Si se pulsa volver, guardamos la pagina actual en la sesion como "paginaAnterior" y redirigimos a la ventana "login"
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    $_SESSION['paginaAnterior'] = 'detalle';
    header('Location: index.php');
    exit();             
}

if(!isset($_SESSION['fechaFotoNasaSolicitada'])){
    //Inicializamos la variable de sesion con la fecha de hoy
    $_SESSION['fechaFotoNasaSolicitada']=date_format(new DateTime("now"), "Y-m-d");
}

//Si el usuario ha solicitado una fecha en concreto, esta se carga en la variable de sesion
if(isset($_REQUEST['solicitarFotoNasa']) && validacionFormularios::validarFecha($_REQUEST['solicitarFotoNasa'], strval(date_format(new DateTime("now"), "d/m/Y"))==null, "20/06/1995")){
    $fecha= $_REQUEST['fecha'];
    $_SESSION['fechaFotoNasaSolicitada']= $_REQUEST['fecha'];
}

//Se hace una peticion a la api de la nasa con la fecha que el usuario haya indicado, si no ha indicado ninguna, se usa la variable de hoy
$oImagenNasa=REST::recogerImagenNasa($_SESSION['fechaFotoNasaSolicitada']);

//Si la api devuelve algo que no sea la imagen, se crea un error y se redirige a la pestaña de error
if(!$oImagenNasa instanceof FotoNasa){
    // Si se produce un error, se crea un objeto de la clase ErrorApp
    $error = new ErrorApp(
            null,
            "Demasiadas peticiones a la API de la NASA",
            "REST.php",
            null,
            $_SESSION['paginaAnterior']
    );
    //Guardamos el objeto ErrorApp en la sesion
    $_SESSION['error'] = $error;
    $_SESSION['paginaEnCurso'] = 'error';
    unset($_SESSION['fechaFotoNasaSolicitada']);
    // Redirigir al usuario a la página de error
    header('Location: index.php');
    exit();
}
else{
    $arrayVista['Nasa']['Titulo']= $oImagenNasa->getTitulo();
    $arrayVista['Nasa']['Explicacion']= $oImagenNasa->getExplicacion();
    $arrayVista['Nasa']['UrlFoto']= $oImagenNasa->getUrl();
}

if(isset($_REQUEST['solicitarDivisa'])){
    if($_REQUEST['divisa1']!=$_REQUEST['divisa2']){
        $_SESSION['CambioDivisa']=REST::solicitarDivisaFrankfurter($_REQUEST['divisa1'], $_REQUEST['divisa2'], $_REQUEST['cantidad1']);
        $_SESSION['DivisaInicio']= $_REQUEST['divisa1'];
        $_SESSION['DivisaDestino']= $_REQUEST['divisa2'];
        $_SESSION['CantidadInicio']= $_REQUEST['cantidad1'];
    }  
}

//Cargamos la vista
require_once $view['layout'];
?>
