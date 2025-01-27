<header id="headerMantenimientoDepartamentos">
    <img id="logo" src="webroot/images/logo.png">
    <h1>Mantenimiento Departamentos</h1>    
    <form method='post'>
        <p id="zonaUsuario"><button type="submit" id="perfilUser" name="perfilUser"><img src="webroot/images/LogoUsuario.png"></button><span><?php echo($oUsuarioEnCurso->getDescUsuario()); ?></span></p>
        <input type="submit" name='volver' id='volver' value='Volver'>               
    </form>
</header>  
<main id="mantenimientoDepartamentos">                                                   
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
            cargarTabla();
        ?>
    </table> 
</main>
