<?php
//Guardamos el usuario que ha hecho login en una variable
$oUsuarioEnCurso=$_SESSION["usuarioDAW204LoginLogoffTema6"];
$oDepartamentoEnCurso= DepartamentoPDO::ObtenerDepartamento($_SESSION['descripcionDepartamentoEnCurso']);

if(isset($_REQUEST['cancelarEditar'])){
    $_SESSION['descripcionDepartamentoEnCurso']='';
    $_SESSION['paginaEnCurso'] = 'mantenimientoDepartamentos';
    $_SESSION['paginaAnterior'] = 'editarDepartamento';
    header('Location: indexLoginLogoffTema6.php');
    exit();             
}

if(isset($_REQUEST['aceptarEditar'])){
    if(validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'])!=null && validacionFormularios::comprobarFloat(floatval($_REQUEST['volumen']))!=null){
        DepartamentoPDO::ActualizarDepartamento($_REQUEST['descripcion'], $_REQUEST['volumen'], $_SESSION['descripcionDepartamentoEnCurso']);
        $_SESSION['paginaEnCurso'] = 'mantenimientoDepartamentos';
        $_SESSION['paginaAnterior'] = 'editarDepartamento';
        header('Location: indexLoginLogoffTema6.php');
    }    
}

//Cargamos el layout
require_once $view['layout'];
?>