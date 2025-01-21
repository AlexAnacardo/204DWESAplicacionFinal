<?php
//Guardamos el usuario que ha hecho login en una variable
$oUsuarioEnCurso=$_SESSION["usuarioDAW204LoginLogoffTema6"];

//Si se pulsa volver, guardamos la pagina actual en la sesion como "paginaAnterior" y redirigimos a la ventana "login"
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    $_SESSION['paginaAnterior'] = 'detalle';
    header('Location: indexLoginLogoffTema6.php');
    exit();             
}
//Si se pulsa la imagen del usuario, guardamos la pagina actual en la sesion como "paginaAnterior" y redirigimos a la ventana "work in progress"
if(isset($_REQUEST['perfilUser'])){
        $_SESSION['paginaEnCurso'] = 'wip';
        $_SESSION['paginaAnterior'] = 'detalle';
        header('Location: indexLoginLogoffTema6.php');
        exit();
}
//Cargamos el layout
require_once $view['layout'];
?>