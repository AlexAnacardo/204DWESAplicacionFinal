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

function cargarTabla(){
    //Lanzamos un query de consulta y lo guardamos en una variable
    
    $resultadoConsulta= DBPDO::ejecutaConsulta('select * from T02_Departamento');

    //Asignamos a la variable oDepartamento el 1er objeto de las respuestas recibidas del query, mientras el objeto contenga valores, se ejecutara el bucle                
    while ($oDepartamento = $resultadoConsulta->fetchObject()) {    
        echo("<tr>");
        
        $oFechaBaja = $oDepartamento->T02_FechaBajaDepartamento;
        $sVolumen = strval($oDepartamento->T02_VolumenDeNegocio);

        echo "<td>" . $oDepartamento->T02_CodDepartamento . "</td>";
        echo "<td>" . $oDepartamento->T02_DescDepartamento . "</td>";
        echo "<td>" . date_format(new DateTime($oDepartamento->T02_FechaCreacionDepartamento), "d/m/Y") . "</td>";
        echo "<td>" . str_replace(".", ",", $sVolumen) . "€</td>";
        echo is_null($oFechaBaja) ? '<td></td>' : "<td>" . date_format(new DateTime($oFechaBaja), "d/m/Y") . "</td>";
        
        echo("</tr>");        
    }
}


//Cargamos el layout
require_once $view['layout'];
?>