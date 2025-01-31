<?php
//Guardamos el usuario que ha hecho login en una variable
$oUsuarioEnCurso=$_SESSION["usuarioDAW204LoginLogoffTema6"];

if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    $_SESSION['paginaAnterior'] = 'detalle';
    header('Location: indexLoginLogoffTema6.php');
    exit();             
}

//Si se pulsa la imagen del usuario, guardamos la pagina actual en la sesion como "paginaAnterior" y redirigimos a la ventana "work in progress"
if(isset($_REQUEST['perfilUser'])){
        $_SESSION['paginaEnCurso'] = 'wip';
        $_SESSION['paginaAnterior'] = 'mantenimientoDepartamentos';
        header('Location: indexLoginLogoffTema6.php');
        exit();
}


if(isset($_REQUEST['descripcion'])){
    if($_REQUEST['descripcion']==''){
        $_SESSION['descripcionDepartamentoEnCurso']=null;
    }
    else{
        $_SESSION['descripcionDepartamentoEnCurso']=$_REQUEST['descripcion'];
    }
}


function cargarTabla($descripcion=null){
    //Lanzamos un query de consulta y lo guardamos en una variable
    if($descripcion !== null && validacionFormularios::comprobarAlfabetico($descripcion)==null){
        $aDepartamentos= DepartamentoPDO::BuscarDepartamentoPorDescripcion($descripcion);
    }else{
        $aDepartamentos= DepartamentoPDO::ListarDepartamentos();
    }
    

    //Asignamos a la variable oDepartamento el 1er objeto de las respuestas recibidas del query, mientras el objeto contenga valores, se ejecutara el bucle                
    foreach ($aDepartamentos as $oDepartamento) {    
        echo("<tr>");
        
        $oFechaBaja = $oDepartamento->getBaja();
        $sVolumen = strval($oDepartamento->getVolumen());

        echo "<td>" . $oDepartamento->getCodDepartamento() . "</td>";
        echo "<td>" . $oDepartamento->getDescripcion() . "</td>";
        echo "<td>" . date_format(new DateTime($oDepartamento->getAlta()), "d/m/Y") . "</td>";
        echo "<td>" . str_replace(".", ",", $sVolumen) . "€</td>";
        echo is_null($oFechaBaja) ? '<td></td>' : "<td>" . date_format(new DateTime($oFechaBaja), "d/m/Y") . "</td>";
        
        echo("</tr>");        
    }
}


//Cargamos el layout
require_once $view['layout'];
?>