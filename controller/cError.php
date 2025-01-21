<?php

//Guardamos el objeto ErrorApp almacenado en la sesion en un objeto para que la vista trabaje con el
$oError=$_SESSION['error'];

//Si se pulsa volver, redirigimos a la ventana desde la que el usuario accedio al error
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso']=$oError->getPaginaSiguiente();
    header('Location: indexLoginLogoffTema6.php');
    exit();
}
//Cargamos el layout
require_once $view['layout'];
?>
