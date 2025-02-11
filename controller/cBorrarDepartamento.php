<?php
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

if(isset($_REQUEST['cancelarBorrar'])){
    $_SESSION['descripcionDepartamentoEnCurso']='';
    $_SESSION['paginaEnCurso'] = 'mantenimientoDepartamentos';
    $_SESSION['paginaAnterior'] = 'borrarDepartamento';
    header('Location: index.php');
    exit();   
}

if(isset($_REQUEST['aceptarBorrar'])){
    DepartamentoPDO::BorrarDepartamento($_SESSION['descripcionDepartamentoEnCurso']);
    $_SESSION['paginaEnCurso'] = 'mantenimientoDepartamentos';
    $_SESSION['paginaAnterior'] = 'borrarDepartamento';
    header('Location: index.php');
    exit(); 
}

    require_once $view['layout'];
?>
