<header id="headerAñadirDepartamento">
    <img id="logo" src="webroot/images/logo.png">
    <h1>Añadir Departamento</h1>    
    <form method='post'>
        <p id="zonaUsuario"><button type="submit" id="perfilUser" name="perfilUser"><img src="webroot/images/LogoUsuario.png"></button><span><?php echo($oUsuarioEnCurso->getDescUsuario()); ?></span></p>
        <input type="submit" name='volver' id='volver' value='Volver'>               
    </form>
</header> 
<main id="añadirDepartamento">
    <form method="post" novalidate>                                                                  
        <div id="divCodigo">
            <label for="codigo">Codigo departamento: </label>
            <input type="text" name="codigo" id="codigo" value="<?php echo (isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : ''); ?>">            
        </div>
        <div id="divDescripcion">
            <label for="descripcion">Descripcion: </label>
            <textarea name="descripcion" id="descripcion" rows="2" cols="50"><?php echo (isset($_REQUEST['descripcion']) ? $_REQUEST['descripcion'] : ''); ?></textarea>            
        </div>
        <div id="divVolumen">
            <label for="volumen">Volumen negocio: </label>
            <input type="text" name="volumen" id="volumen" value="<?php echo (isset($_REQUEST['volumen']) ? $_REQUEST['volumen'] : ''); ?>">            
        </div>
        <div id="divEnviar">
            <input type="submit" name="añadir" id="añadir" value="Añadir">
        </div>                                
    </form>
</main>