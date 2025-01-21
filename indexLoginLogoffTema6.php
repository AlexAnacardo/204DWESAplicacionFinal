<?php
    //Incluimos el fichero de conexion a la base de datos
    require_once("config/confDBPDO.php");
    require_once("config/confAPP.php");    
    
    //Iniciamos la sesion
    session_start();
    
    $oFechaActual=new DateTime("now");
    
    if(!isset($_COOKIE['Idioma']) && isset($_SESSION['paginaEnCurso'])){        
        setcookie('Idioma', 'es', $oFechaActual->getTimestamp()+(3600), "/");         
        header('location:indexLoginLogoffTema6.php');
             
    }
             
    if(isset($_REQUEST['español'])){        
        setcookie('Idioma', 'es', $oFechaActual->getTimestamp()+(3600), "/");        
        header('location:indexLoginLogoffTema6.php');
    }
    
    if(isset($_REQUEST['ingles'])){       
       setcookie('Idioma', 'en', $oFechaActual->getTimestamp()+(3600), "/");      
       header('location:indexLoginLogoffTema6.php');       
    }
    
    if(!isset($_SESSION['paginaEnCurso'])){
        $_SESSION['paginaEnCurso'] = 'inicioPublico';
        $_SESSION['paginaAnterior'] = 'inicioPublico';
    }
    
    require_once $controller[$_SESSION['paginaEnCurso']];
?>