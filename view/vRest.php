<header id="headerRest">
    <img id="logo" src="webroot/images/logo.png">
    <h1>REST</h1>
    <form method="post">
        <input type="submit" name='volver' id='volver' value='Volver'>
    </form>
</header>
<main id="rest">
    <div class="cajaRest">
        <h3>NASA</h3>
        <form method="post">
            <label for="fecha">Introduzca fecha</label>
            <input type="date" id="fecha" name="fecha" value="<?php echo($_SESSION['fechaFotoNasaSolicitada']) ?>"/>
            <input type="submit" id="solicitarFotoNasa" name="solicitarFotoNasa" value="Solicitar nueva foto"/>
        </form>
        <img src="<?php echo($arrayVista['Nasa']['UrlFoto']) ?>">
        <p><b>Titulo: </b><?php echo($arrayVista['Nasa']['Titulo']) ?></p>
        <p><b>Explicacion:</b> <?php echo($arrayVista['Nasa']['Explicacion']) ?></p> 
        <p><b>Parametros:</b> Fecha</p>
        <p><b>Metodo:</b> GET</p>
        <p><a target="blank" href="https://api.nasa.gov/">Enlace a la pagina que explica el uso de la api</a></p>
    </div>
    <div class="cajaRest">
        <h3>FRANKFURTER</h3>
        <form method="post">
            <label for="divisa1">Introduce la divisa a convertir</label>
            <select id="divisa1">
                <option value="EUR">Euro</option>
                <option value="USD">Dolar</option>
                <option value="JPY">Yen</option>
                <option value="CAD">Dolar canadiense</option>
                <option value="GBP">Libra esterlina</option>
            </select>
            
            <label for="divisa1">Divisa convertida</label>
            <select id="divisa2">
                <option value="EUR">Euro</option>
                <option value="USD">Dolar</option>
                <option value="JPY">Yen</option>
                <option value="CAD">Dolar canadiense</option>
                <option value="GBP">Libra esterlina</option>
            </select>
            
            <label for="cantidad1">
            <input id="cantidad1" name="cantidad1" type="number" min="0"/>
            <input id="cantidad2" name="cantidad2" type="number" disabled value="<?php echo($arrayVista['Frankfurter']['Cambio']) ?>"/>
            <input type="submit" id="solicitarDivisa" name="solicitarDivisa" value="Solicitar divisa">
        </form>
        <p><a target="blank" href="https://frankfurter.dev/">Enlace a la pagina que explica el uso de la api</a></p>
    </div>
    <div class="cajaRest"></div>
</main>