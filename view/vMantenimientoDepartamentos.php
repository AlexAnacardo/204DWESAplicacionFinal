<header id="headerMantenimientoDepartamentos">
    <img id="logo" src="webroot/images/logo.png">
    <h1>Mantenimiento Departamentos</h1>    
    <form method='post'>
        <p id="zonaUsuario"><button type="submit" id="perfilUser" name="perfilUser"><img src="webroot/images/LogoUsuario.png"></button><span><?php echo($oUsuarioEnCurso->getDescUsuario()); ?></span></p>
        <input type="submit" name='volver' id='volver' value='Volver'>               
    </form>
</header>  
<main id="mantenimientoDepartamentos"> 
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>                                                                                                  
        <div id="divDescripcion">
            <label for="descripcion">Descripcion: </label>
            <textarea name="descripcion" id="descripcion" rows="2" cols="50" style="resize: none"><?php echo (isset($_REQUEST['descripcion']) ? $_REQUEST['descripcion'] : ''); ?></textarea>
            <?php if (!empty($aErrores["descripcion"])) { ?>
                <!--Si hay algun error almacenado en el array, el mensaje del mismo se mostrara, esto para cada caso-->
                <p style="color: red"><?php echo $aErrores["descripcion"]; ?></p>
            <?php } ?>
        </div>                                
        <div id="divEnviar">
            <input type="submit" name="buscar" id="buscar" value="Buscar">
        </div>                                
    </form>
    <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Alta departamento</th>
                <th>Volumen negocio</th>
                <th>Baja departamento</th>
            </tr>
        </thead>
        <?php
            if(isset($_SESSION['descripcionDepartamentoEnCurso'])){
                cargarTabla($_SESSION['descripcionDepartamentoEnCurso']);
            }
            else{
                cargarTabla();
            }
        ?>        
    </table> 
    <form>
        <input type="submit" name="añadir" id="añadir" value="Añadir departamento"/>
    </form>
</main>