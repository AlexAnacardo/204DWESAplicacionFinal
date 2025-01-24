<?php

//Si se pulsa volver, guardamos la pagina actual en la sesion como "paginaAnterior" y redirigimos a la ventana "login"
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    $_SESSION['paginaAnterior'] = 'detalle';
    header('Location: indexLoginLogoffTema6.php');
    exit();             
}

//Inicializamos la variable de sesion con la fecha de hoy
$_SESSION['fechaFotoNasaSolicitada']=date_format(new DateTime("now"), "Y-m-d");

//Si el usuario ha solicitado una fecha en concreto, esta se carga en la variable de sesion
if(isset($_REQUEST['solicitarFotoNasa'])){
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

    // Redirigir al usuario a la página de error
    header('Location: indexLoginLogoffTema6.php');
    exit();
}

//Cargamos la vista
require_once $view['layout'];
?>
