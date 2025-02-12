<header id="headerMantenimientoDepartamentos">
    <img id="logo" src="webroot/images/logo.png">
    <h1>Mantenimiento Departamentos</h1>    
    <form method='post'>
        <p id="zonaUsuario"><button type="submit" id="perfilUser" name="perfilUser"><img src="webroot/images/LogoUsuario.png"></button><span><?php echo($oUsuarioEnCurso->getDescUsuario()); ?></span></p>
        <input type="submit" name='volver' id='volver' value='Volver'>               
    </form>
</header>  
<main id="mantenimientoDepartamentos"> 
    <form id="busquedaDepartamento" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>                                                                                                  
        <div id="divDescripcion">
            <section>
                <label for="descripcion">Descripcion: </label>
                <textarea name="descripcion" id="descripcion" rows="2" cols="50" style="resize: none"><?php echo (isset($_SESSION['descripcionDepartamentoSolicitada']) ? $_SESSION['descripcionDepartamentoSolicitada'] : ''); ?></textarea>
                <input type="submit" name="buscar" id="buscar" value="Buscar">
            </section>
            <section>
                <label for="todos">Todos</label>
                <input type="radio" id="todos" value="todos" name="opcionBusqueda">
                <label for="activos">Departamentos activos</label>
                <input type="radio" id="activos" value="activos" name="opcionBusqueda">
                <label for="inactivos">Departamentos inactivos</label>
                <input type="radio" id="inactivos" value="inactivos" name="opcionBusqueda">
            </section>
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
            if(isset($_SESSION['descripcionDepartamentoSolicitada'])){
                cargarTabla($_SESSION['descripcionDepartamentoSolicitada']);
            }
            else{
                cargarTabla();
            }
        ?>        
    </table> 
    <div id="contenedorAñadirExportar">
        <form id="formAñadirDepartamento">
            <input type="submit" name="añadir" id="añadir" value="Añadir departamento"/>
            <input type="submit" name="exportar" id="exportar" value="Exportar departamentos"/>        
        </form>
        <form id="importarDepartamento" method="POST" enctype="multipart/form-data">
            <input type="file" name="archivo_json" id="archivo_json" accept=".json">
            <input type="submit" name="importar" id="importar" value="Importar departamentos"/>        
        </form>
    </div>
</main>