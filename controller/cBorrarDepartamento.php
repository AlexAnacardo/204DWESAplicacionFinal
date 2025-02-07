<?php
$oUsuarioEnCurso=$_SESSION["usuarioDAW204LoginLogoffTema6"];

if(isset($_REQUEST['cancelarBorrar'])){
    $_SESSION['descripcionDepartamentoEnCurso']='';
    $_SESSION['paginaEnCurso'] = 'mantenimientoDepartamentos';
    $_SESSION['paginaAnterior'] = 'borrarDepartamento';
    header('Location: index.php');
    exit();   
}

    require_once $view['layout'];
?>
