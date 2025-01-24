<header id="headerRest">
    <img id="logo" src="webroot/images/logo.png">
    <h1>REST</h1>
    <form>
        <input type="submit" name='volver' id='volver' value='Volver'>
    </form>
</header>
<main id="rest">
    <div class="cajaRest">
        <h3>NASA</h3>
        <form>
            <label for="fecha">Introduzca fecha</label>
            <input type="date" id="fecha" name="fecha" value="<?php echo($_SESSION['fechaFotoNasaSolicitada']) ?>"/>
            <input type="submit" id="solicitarFotoNasa" name="solicitarFotoNasa" value="Solicitar nueva foto"/>
        </form>
        <img src="<?php echo($oImagenNasa->getUrl()) ?>">
        <p><b>Titulo: </b><?php echo($oImagenNasa->getTitulo()) ?></p>
        <p><b>Explicacion:</b> <?php echo($oImagenNasa->getExplicacion()) ?></p> 
        <p><b>Parametros:</b> Fecha</p>
        <p><b>Metodo:</b> GET</p>
        <p><a target="blank" href="https://api.nasa.gov/">Enlace a la pagina que explica el uso de la api</a></p>
    </div>
    <div class="cajaRest"></div>
    <div class="cajaRest"></div>
</main>
