<header id="headerBorrarDepartamento">
    <img id="logo" src="webroot/images/logo.png">
    <h1>Borrar Departamento</h1>    
    <form method='post'>
        <p id="zonaUsuario"><button type="submit" id="perfilUser" name="perfilUser"><img src="webroot/images/LogoUsuario.png"></button><span><?php echo($oUsuarioEnCurso->getDescUsuario()); ?></span></p>               
    </form>
</header>  
<main id="borrarDepartamento"> 
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>                                                                                                  
        <p>Esta a punto de borrar el departamento con el código <?php echo($_SESSION['descripcionDepartamentoEnCurso']) ?>, ¿esta seguro de que quiere hacerlo?</p>
        <input type="submit" name="aceptarBorrar" id="aceptarBorrar" value="Aceptar">
        <input type="submit" name="cancelarBorrar" id="cancelarBorrar" value="Cancelar">
    </form>    
</main>