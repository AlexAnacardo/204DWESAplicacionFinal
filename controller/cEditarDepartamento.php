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

define('MAX_CADENA', 3);
define('MIN_CADENA', 1);
define('MIN_VOLUMEN', 0);
define('MIN_FLOAT', 0);
define('OBLIGATORIO', 1);

$entradaOK=true;

$aErrores = [
    'descripcion' => '',
    'volumen' => ''
];


if(isset($_REQUEST['cancelarEditar'])){
    
    $_SESSION['paginaEnCurso'] = 'mantenimientoDepartamentos';
    $_SESSION['paginaAnterior'] = 'editarDepartamento';
    header('Location: indexLoginLogoffTema6.php');
    exit();             
}

if(isset($_REQUEST['aceptarEditar'])){
    $aErrores = [    
        'descripcion' => validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'], 1000, MIN_CADENA, OBLIGATORIO),
        'volumen' => validacionFormularios::comprobarFloat($_REQUEST['volumen'], PHP_FLOAT_MAX, MIN_FLOAT, OBLIGATORIO),
    ];
    
    foreach ($aErrores as $clave => $valor) {
        if ($valor == !null) {
            $entradaOK = false;
        }
    }    
}
else{
    $entradaOK = false;
}

if ($entradaOK) {
    DepartamentoPDO::ActualizarDepartamento($_REQUEST['descripcion'], $_REQUEST['volumen'], $_SESSION['descripcionDepartamentoEnCurso']);    
    $_SESSION['paginaEnCurso'] = 'mantenimientoDepartamentos';
    $_SESSION['paginaAnterior'] = 'editarDepartamento';
    header('Location: indexLoginLogoffTema6.php');
}

//Cargamos el layout
require_once $view['layout'];
?>