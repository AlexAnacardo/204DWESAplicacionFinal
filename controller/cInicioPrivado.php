<?php
    /*
     * @version 2024/11/27
     * @author Alex Asensio Sanchez                          
     */
    //Guardamos el usuario que ha hecho login en una variable
    $oUsuarioEnCurso=$_SESSION["usuarioDAW204LoginLogoffTema6"];
    
    //Si ya hay un usuario cargado en la sesion, pasamos a el inicio privado directamente
    if(!isset($_SESSION["usuarioDAW204LoginLogoffTema6"])){
        $_SESSION['paginaEnCurso'] = 'login';
        header('Location: indexLoginLogoffTema6.php');
        exit(); 
    }
    
    //Si pulsamos detalle guardamos la pagina actual en la sesion como "paginaAnterior" y redirigimos a la pagina detalle
    if(isset($_REQUEST['detalle'])){
        $_SESSION['paginaEnCurso'] = 'detalle';
        $_SESSION['paginaAnterior'] = 'inicioPrivado';
        header('Location: indexLoginLogoffTema6.php');
        exit(); 
    }
    
    //Si pulsamos "error" guardamos la pagina actual en la sesion como "paginaAnterior" y forzamos que se produzca un error de la clase DBPDO
    if(isset($_REQUEST['error'])){
        $_SESSION['paginaAnterior'] = 'inicioPrivado';
        DBPDO::ejecutaConsulta("Esto va a dar un error que flipas");
    }
    
    //Si pulsamos "mantenimiento departamentos" guardamos la pagina actual en la sesion como "paginaAnterior" y redirigimos a la pagina "mantenimiento departamentos"
    if(isset($_REQUEST['mantDep'])){
        $_SESSION['paginaEnCurso'] = 'wip';
        $_SESSION['paginaAnterior'] = 'inicioPrivado';
        header('Location: indexLoginLogoffTema6.php');
        exit();
    }
    
    //Si pulsamos "rest" guardamos la pagina actual en la sesion como "paginaAnterior" y redirigimos a la pagina "rest"
    if(isset($_REQUEST['rest'])){
        $_SESSION['paginaEnCurso'] = 'wip';
        $_SESSION['paginaAnterior'] = 'inicioPrivado';
        header('Location: indexLoginLogoffTema6.php');
        exit();
    }
    
    //Si pulsamos "el perfil del usuario" guardamos la pagina actual en la sesion como "paginaAnterior" y redirigimos a la pagina "work in progress"
    if(isset($_REQUEST['perfilUser'])){
        $_SESSION['paginaEnCurso'] = 'wip';
        $_SESSION['paginaAnterior'] = 'inicioPrivado';
        header('Location: indexLoginLogoffTema6.php');
        exit();
    }
    
    //Si pulsamos "cerrar sesion" destruimos la sesion y redirigimos a la pagina "inicio publico"
    if(isset($_REQUEST['logoff'])){
       session_destroy();       
       header('location: indexLoginLogoffTema6.php');       
       exit;
    }

    $avInicioPrivado = [
        'descUsuario' => $oUsuarioEnCurso->getDescUsuario(),
        'numConexiones' => $oUsuarioEnCurso->getNumAccesos(),
        'fechaHoraUltimaConexionAnterior' => $oUsuarioEnCurso->getFechaHoraUltimaConexion()
    ];
    
    require_once $view['layout'];
?>
