<header id="headerMostrarEditarDepartamento">
    <img id="logo" src="webroot/images/logo.png">
    <h1>Mostrar Departamento</h1>    
    <form method='post'>
        <p id="zonaUsuario"><button type="submit" id="perfilUser" name="perfilUser"><img src="webroot/images/LogoUsuario.png"></button><span><?php echo($aVista['nombreUsuario']); ?></span></p>                       
    </form>
</header>  
<main id="mostrarEditarDepartamento"> 
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>                                                                                                  
        <div>
            <label for="codigo">Codigo del departamento: </label>
            <input type="text" id="codigo" name="codigo" style="background-color: #FFF990; border: 1px solid gray" disabled value="<?php echo($aVista['codigo']) ?>">            
        </div>                                
        <div>
            <label for="descripcion">Descripcion del departamento: </label>
            <input type="text" id="descripcion" name="descripcion" style="background-color: #FFF990; border: 1px solid gray" disabled value="<?php echo($aVista['descripcion']) ?>">
        </div>
        <div>
            <label for="volumen">Volumen de negocio: </label>
            <input type="text" id="volumen" name="volumen" style="background-color: #FFF990; border: 1px solid gray" disabled value="<?php echo($aVista['volumen']) ?>">
        </div>
        <div>
            <label for="volumen">Fecha de alta: </label>
            <input type="text" id="volumen" name="volumen" style="background-color: #FFF990; border: 1px solid gray" disabled value="<?php echo($aVista['fechaAlta']) ?>">
        </div>
        <div>
            <label for="volumen">Fecha de baja: </label>
            <input type="text" id="volumen" name="volumen" disabled value="<?php echo(isset($aVista['fechaBaja']) ? $aVista['fechaBaja'] : "Departamento activo") ?>">
        </div>
        <div>
            <input type="submit" id="aceptarMostrar" name="aceptarMostrar" value="Aceptar">
        </div>
    </form>    
</main>