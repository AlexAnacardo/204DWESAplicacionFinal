<?php
    /*
     * @version 2024/12/19
     * @author Alex Asensio Sanchez                          
     */
    
    //Guardamos la fecha y hora actual en una variable
    $oFechaActual=new DateTime("now");
    
    //Si la cookie del idioma no esta configurada, se crea una con el valor del español por defecto
    if(!isset($_COOKIE['Idioma'])){
        setcookie('Idioma', 'es', $oFechaActual->getTimestamp()+(3600), "/");     
        header('location:indexLoginLogoffTema6.php');
    }
              
    //Si se selecciona el español como idioma, se cambia el valor de la cookie "idioma" al español
    if(isset($_REQUEST['español'])){        
        setcookie('Idioma', 'es', $oFechaActual->getTimestamp()+(3600), "/");
        header('location:indexLoginLogoffTema6.php');
    }
    
    //Si se selecciona el ingles como idioma, se cambia el valor de la cookie "idioma" al ingles
    if(isset($_REQUEST['ingles'])){       
       setcookie('Idioma', 'en', $oFechaActual->getTimestamp()+(3600), "/"); 
       header('location:indexLoginLogoffTema6.php');       
    }
?>

<html id="index">
     <head>
        <meta charset="UTF-8">               
        <meta name="author" content="Alex Asensio Sanchez">
        <meta name="application-name" content="indice">
        <meta name="description" content="Indice tema 3">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" href="webroot/css/loginLogoff.css">       
        <title>Alex Asensio Sanchez</title>
     </head>
     <body>
        <!--Cargamos los elementos visuales de la pagina que corresponda-->
        <?php require_once $view[$_SESSION['paginaEnCurso']]; ?>
        <footer>
            <p><a href="../index.html">Alex Asensio Sanchez</a></p>
            <p><a href="../204DWESProyectoDWES/indexProyectoDWES.php">DWES</a></p>
            <p><a target="blank" href="https://github.com/AlexAnacardo/204DWESLoginLogoffTema6.git">Repositorio del proyecto</a></p>
            <p><a target="blank" href="https://www.amazon.es">Pagina imitada</a></p>
            <p><a target="vlank" href="doc/phpdoc/index.html">Documentación (PhpDoc)</a></p>
        </footer>
     </body>
 </html>
