<header id="headerError">
    <img id="logo" src="webroot/images/logo.png">
    <h1>Error</h1>
</header>
<main id="error">        
    <div>
        <h3>ERROR</h3>
        <p><span>Codigo del error:</span> <?php echo($_SESSION['error']->getCodError()); ?></p>
        <p><span>Descripción del error:</span> <?php echo($_SESSION['error']->getDescError()); ?></p>
        <p><span>Fichero en el que se produjo el error:</span> <?php echo($_SESSION['error']->getArchivoError()); ?></p>
        <p><span>Linea en la que se produjo el error:</span> <?php echo($_SESSION['error']->getLineaError()); ?></p>
    </div>
    <form>
        <input type="submit" id="volver" name="volver" value="Volver">
    </form>
</main>
