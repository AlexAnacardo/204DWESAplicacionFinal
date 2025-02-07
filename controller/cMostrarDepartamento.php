<?php
//Guardamos el usuario que ha hecho login en una variable
$oUsuarioEnCurso=$_SESSION["usuarioDAW204LoginLogoffTema6"];
$oDepartamentoEnCurso= DepartamentoPDO::ObtenerDepartamento($_SESSION['descripcionDepartamentoEnCurso']);

$aVista=[
    'nombreUsuario' => $oUsuarioEnCurso->getDescUsuario(),
    'codigo' => $oDepartamentoEnCurso->getCodDepartamento(),
    'descripcion' => $oDepartamentoEnCurso->getDescripcion(),
    'volumen' => $oDepartamentoEnCurso->getVolumen(),
    'fechaAlta' => $oDepartamentoEnCurso->getAlta(),
    'fechaBaja' => $oDepartamentoEnCurso->getBaja(),
];
        
if(isset($_REQUEST['aceptarMostrar'])){
    $_SESSION['descripcionDepartamentoEnCurso']='';
    $_SESSION['paginaEnCurso'] = 'mantenimientoDepartamentos';
    $_SESSION['paginaAnterior'] = 'editarDepartamento';
    header('Location: index.php');
    exit();             
}

//Cargamos el layout
require_once $view['layout'];
?>