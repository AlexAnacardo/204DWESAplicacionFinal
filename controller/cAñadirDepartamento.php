<?php
    define('MAX_CADENA', 3);
    define('MIN_CADENA', 1);
    define('MIN_VOLUMEN', 0);
    define('MIN_FLOAT', 0);
    define('OBLIGATORIO', 1);

$oUsuarioEnCurso=$_SESSION["usuarioDAW204LoginLogoffTema6"];
        
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso'] = 'mantenimientoDepartamentos';
        $_SESSION['paginaAnterior'] = 'añadirDepartamento';
        header('Location: index.php');
        exit();             
    }

   $entradaOK=true;
    
   $aErrores = [//Array de errores
        'codigo' => '',
        'descripcion' => '',
        'volumen' => ''
    ];    
    
    if (isset($_REQUEST['añadir'])) {

        $aErrores = [
            'codigo' => validacionFormularios::comprobarAlfabetico($_REQUEST['codigo'], MAX_CADENA, MIN_CADENA, OBLIGATORIO),
            'descripcion' => validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'], 1000, MIN_CADENA, OBLIGATORIO),
            'volumen' => validacionFormularios::comprobarFloat($_REQUEST['volumen'], PHP_FLOAT_MAX, MIN_FLOAT, OBLIGATORIO),
        ];

        //Recorremos el array de errores 
        foreach ($aErrores as $clave => $valor) {
            if ($valor == !null) {
                $entradaOK = false;
                //Limpiamos el campo si hay un error
                $_REQUEST[$clave] = '';
            }
        }
    } else {
        $entradaOK = false;
    }

    if ($entradaOK) {        

        DepartamentoPDO::AñadirDepartamento($_REQUEST['codigo'], $_REQUEST['descripcion'], $_REQUEST['volumen']);
        
        $_SESSION['paginaEnCurso'] = 'mantenimientoDepartamentos';
        $_SESSION['paginaAnterior'] = 'añadirDepartamento';
        header('Location: index.php');
        exit();
    }


require_once $view['layout'];
?>