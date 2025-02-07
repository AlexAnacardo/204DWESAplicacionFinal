<header id="headerMostrarEditarDepartamento">
    <img id="logo" src="webroot/images/logo.png">
    <h1>Editar Departamento</h1>    
    <form method='post'>
        <p id="zonaUsuario"><button type="submit" id="perfilUser" name="perfilUser"><img src="webroot/images/LogoUsuario.png"></button><span><?php echo($aVista['nombreUsuario']); ?></span></p>               
    </form>
</header>  
<main id="mostrarEditarDepartamento"> 
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>                                                                                                  
        <div>
            <label for="codigo">Codigo del departamento: </label>
            <input type="text" id="codigo" name="codigo" disabled value="<?php echo($aVista['codigo']) ?>">            
        </div>                                
        <div>
            <label for="descripcion">Descripcion del departamento: </label>
            <input type="text" id="descripcion" name="descripcion" style="background-color: #FFF990; border: 1px solid gray" value="<?php echo($aVista['descripcion']) ?>">
            <?php 
                if(!empty($aErrores['descripcion'])){
                    echo('<p style="color: red">'.$aErrores["descripcion"].'</p>');
                }
            ?>
        </div>
        <div>
            <label for="volumen">Volumen de negocio: </label>
            <input type="text" id="volumen" name="volumen" style="background-color: #FFF990; border: 1px solid gray" value="<?php echo($aVista['volumen']) ?>">
            <?php 
                if(!empty($aErrores['volumen'])){
                    echo('<p style="color: red">'.$aErrores["volumen"].'</p>');
                }
            ?>
        </div>
        <div>
            <label for="volumen">Fecha de alta: </label>
            <input type="text" id="volumen" name="volumen" disabled value="<?php echo($aVista['fechaAlta']) ?>">
        </div>
        <div>
            <label for="volumen">Fecha de baja: </label>
            <input type="text" id="volumen" name="volumen" disabled value="<?php echo(isset($aVista['fechaBaja']) ? $aVista['fechaBaja'] : "Departamento activo") ?>">
        </div>
        <div>
            <input type="submit" id="aceptarEditar" name="aceptarEditar" value="Actualizar">
            <input type="submit" id="cancelarEditar" name="cancelarEditar" value="Cancelar">
        </div>
    </form>    
</main>