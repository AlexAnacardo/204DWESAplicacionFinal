<?php
    //Guardamos la fecha y hora actual en una variable
    $oFechaActual=new DateTime("now");

    //Si se pulsa el boton "iniciar sesion", guardamos la pagina actual en la sesion cono "paginaAnterior" y redirigimos a la pagina "login"
    if (isset($_REQUEST['login'])) {
        $_SESSION['paginaEnCurso'] = 'login';
        $_SESSION['paginaAnterior'] = 'inicioPublico';
        header('Location: indexLoginLogoffTema6.php');
        exit();         
    }
    
    
    
    //Cargamos el layout
    require_once $view['layout'];    
?>
