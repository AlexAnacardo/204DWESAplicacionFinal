<header id="headerEditarDepartamento">
    <img id="logo" src="webroot/images/logo.png">
    <h1>Editar Departamento</h1>    
    <form method='post'>
        <p id="zonaUsuario"><button type="submit" id="perfilUser" name="perfilUser"><img src="webroot/images/LogoUsuario.png"></button><span><?php echo($oUsuarioEnCurso->getDescUsuario()); ?></span></p>               
    </form>
</header>  
<main id="editarDepartamento"> 
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>                                                                                                  
        <div>
            <label for="codigo">Codigo del departamento: </label>
            <input type="text" id="codigo" name="codigo" disabled value="<?php echo($oDepartamentoEnCurso->getCodDepartamento()) ?>">
        </div>                                
        <div>
            <label for="descripcion">Descripcion del departamento: </label>
            <input type="text" id="descripcion" name="descripcion" value="<?php echo($oDepartamentoEnCurso->getDescripcion()) ?>">
        </div>
        <div>
            <label for="volumen">Volumen de negocio: </label>
            <input type="text" id="volumen" name="volumen" value="<?php echo($oDepartamentoEnCurso->getVolumen()) ?>">
        </div>  
        <div>
            <input type="submit" id="aceptarEditar" name="aceptarEditar" value="Actualizar">
            <input type="submit" id="cancelarEditar" name="cancelarEditar" value="Cancelar">
        </div>
    </form>    
</main>