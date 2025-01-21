<?php

//Si se pulsa el boton volver, se redireciona al usuario a la pagina desde la que accedio a esta
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
    header('Location: indexLoginLogoffTema6.php');
    exit();
}

//Cargamos el layout
require_once $view['layout'];
?>