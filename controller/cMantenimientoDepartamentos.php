<?php
//Guardamos el usuario que ha hecho login en una variable
$oUsuarioEnCurso=$_SESSION["usuarioDAW204LoginLogoffTema6"];
if(!isset($_SESSION['paginaTablaEnCurso'])){
    $_SESSION['paginaTablaEnCurso']=0;
}

if (!isset($_SESSION['opcionBusqueda'])) {
    // Asigna un valor predeterminado si no está definida
    $_SESSION['opcionBusqueda'] = 'todos';
}

$_SESSION['ultimaPaginaTabla']=[
    "todos"=>(floor(DepartamentoPDO::ContarDepartamentos("todos")/5))*5,
    "activos"=> (floor(DepartamentoPDO::ContarDepartamentos("activos")/5))*5,
    "inactivos"=> (floor(DepartamentoPDO::ContarDepartamentos("inactivos")/5))*5 
];


if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    $_SESSION['paginaAnterior'] = 'mantenimientoDepartamentos';
    header('Location: index.php');
    exit();             
}

//Si se pulsa la imagen del usuario, guardamos la pagina actual en la sesion como "paginaAnterior" y redirigimos a la ventana "work in progress"
if(isset($_REQUEST['perfilUser'])){
        $_SESSION['paginaEnCurso'] = 'wip';
        $_SESSION['paginaAnterior'] = 'mantenimientoDepartamentos';
        header('Location: index.php');
        exit();
}

if(isset($_REQUEST['buscar'])){
    if(isset($_REQUEST['opcionBusqueda'])){
        $_SESSION['opcionBusqueda']=$_REQUEST['opcionBusqueda'];
    }
    else{
        $_SESSION['opcionBusqueda']="todos";
    }
    
}

//Si el campo de texto "Descripcion" ha sido inicializado, se comprueba si contiene texto, si no lo tiene se inicializa a null, y si lo tiene, se carga su valor en la variable de sesion descripcionDepartamentoEnCurso
if(isset($_REQUEST['descripcion'])){
    if($_REQUEST['descripcion']==''){
        $_SESSION['descripcionDepartamentoSolicitada']=null;
    }
    else{
        $_SESSION['descripcionDepartamentoSolicitada']=$_REQUEST['descripcion'];
    }
}

if(isset($_REQUEST['añadir'])){
    $_SESSION['paginaEnCurso'] = 'añadirDepartamento';
    $_SESSION['paginaAnterior'] = 'mantenimientoDepartamentos';
    header('Location: index.php');
    exit();
}

if(isset($_REQUEST['editarDepartamento'])){
    if(isset($_REQUEST['descripcion'])){
        $_SESSION['descripcionDepartamentoSolicitada']=$_REQUEST['descripcion'];
    }
    $_SESSION['descripcionDepartamentoEnCurso']=$_REQUEST['editarDepartamento'];
    $_SESSION['paginaEnCurso'] = 'editarDepartamento';
    $_SESSION['paginaAnterior'] = 'mantenimientoDepartamentos';
    header('Location: index.php');
    exit();
}

if(isset($_REQUEST['mostrarDepartamento'])){
    $_SESSION['descripcionDepartamentoEnCurso']=$_REQUEST['mostrarDepartamento'];
    $_SESSION['paginaEnCurso'] = 'mostrarDepartamento';
    $_SESSION['paginaAnterior'] = 'mantenimientoDepartamentos';
    header('Location: index.php');
    exit();
}

if(isset($_REQUEST['borrarDepartamento'])){
    $_SESSION['descripcionDepartamentoEnCurso']=$_REQUEST['borrarDepartamento'];
    $_SESSION['paginaEnCurso'] = 'borrarDepartamento';
    $_SESSION['paginaAnterior'] = 'mantenimientoDepartamentos';
    header('Location: index.php');
    exit();
}

if(isset($_REQUEST['altaDepartamento'])){
    DepartamentoPDO::AltaDepartamento($_REQUEST['altaDepartamento']);
    header('Location: index.php');
    exit();
}

if(isset($_REQUEST['bajaDepartamento'])){
    DepartamentoPDO::BajaDepartamento($_REQUEST['bajaDepartamento']);
    header('Location: index.php');
    exit();
}

if(isset($_REQUEST['exportar'])){
    try{
        $_SESSION['paginaEnCurso'] = 'mantenimientoDepartamentos';
        $_SESSION['paginaAnterior'] = 'mantenimientoDepartamentos';
        DepartamentoPDO::ExportarDepartamentos();
        header('Location: index.php');
        exit();
    } catch (Exception $ex) {
        
    } 
}

if(isset($_REQUEST['importar'])){
    if($_FILES['archivo_json']['size'] < 41943040){
        $_SESSION['paginaEnCurso'] = 'mantenimientoDepartamentos';
        $_SESSION['paginaAnterior'] = 'mantenimientoDepartamentos';
        DepartamentoPDO::ImportarDepartamentos();
        header('Location: index.php');
        exit();
    }
    else {
        // Si se produce un error, se crea un objeto de la clase ErrorApp
        $error = new ErrorApp(
                $ex->getCode(),
                $ex->getMessage(),
                $ex->getFile(),
                $ex->getLine(),
                'mantenimientoDepartamentos'
        );
        //Guardamos el objeto ErrorApp en la sesion
        $_SESSION['error'] = $error;
        $_SESSION['paginaEnCurso'] = 'error';

        // Redirigir al usuario a la página de error
        header('Location: index.php');
        exit();
    }
}


if(isset($_REQUEST['primeraPagina']) && $_SESSION['paginaTablaEnCurso']!=0){
    $_SESSION['opcionBusqueda']=$_REQUEST['opcionBusquedaOculto'];
    $_SESSION['paginaTablaEnCurso']=0;
}

if(isset($_REQUEST['anteriorPagina']) && $_SESSION['paginaTablaEnCurso']>=5){
    $_SESSION['opcionBusqueda']=$_REQUEST['opcionBusquedaOculto'];
    $_SESSION['paginaTablaEnCurso']-=5;
}

if(isset($_REQUEST['siguientePagina']) && $_SESSION['paginaTablaEnCurso']<$_SESSION['ultimaPaginaTabla'][$_SESSION['opcionBusqueda']]){
    $_SESSION['opcionBusqueda']=$_REQUEST['opcionBusquedaOculto'];
    $_SESSION['paginaTablaEnCurso']+=5;
}

if(isset($_REQUEST['ultimaPagina'])){
    $_SESSION['opcionBusqueda']=$_REQUEST['opcionBusquedaOculto'];
    $_SESSION['paginaTablaEnCurso']=$_SESSION['ultimaPaginaTabla'][$_SESSION['opcionBusqueda']];
}

function cargarTabla($descripcion=null){
    //Lanzamos un query de consulta y lo guardamos en una variable
    if($descripcion !== null && validacionFormularios::comprobarAlfabetico($descripcion)==null){        
        $aDepartamentos= DepartamentoPDO::BuscarDepartamentoPorDescripcion($descripcion, $_SESSION['opcionBusqueda'], $_SESSION['paginaTablaEnCurso']);
    }else{
        $aDepartamentos= DepartamentoPDO::ListarDepartamentos($_SESSION['opcionBusqueda'], $_SESSION['paginaTablaEnCurso']);
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
        echo '<td><form method="post"><input type="submit" class="borrarDepartamento" name="borrarDepartamento" value="'. $oDepartamento->getCodDepartamento() .'"></input></form></td>';
        echo '<td><form method="post"><input type="submit" class="editarDepartamento" name="editarDepartamento" value="'. $oDepartamento->getCodDepartamento() .'"></input></form></td>';
        echo '<td><form method="post"><input type="submit" class="mostrarDepartamento" name="mostrarDepartamento" value="'. $oDepartamento->getCodDepartamento() .'"></input></form></td>';
        if(is_null($oFechaBaja)){
            echo '<td><form method="post"><input type="submit" class="bajaDepartamento" name="bajaDepartamento" value="'. $oDepartamento->getCodDepartamento() .'"></input></form></td>';
        }
        else{
            echo '<td><form method="post"><input type="submit" class="altaDepartamento" name="altaDepartamento" value="'. $oDepartamento->getCodDepartamento() .'"></input></form></td>';
        }                
        echo("</tr>");        
    }
}

//Cargamos el layout
require_once $view['layout'];
?>