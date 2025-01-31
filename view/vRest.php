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
        <p><b>Parametros:</b> Fecha, key de acceso a la api</p>
        <p><b>Metodo:</b> GET</p>
        <p><a target="blank" href="https://api.nasa.gov/">Enlace a la pagina que explica el uso de la api</a></p>
    </div>
    <div class="cajaRest">
        <h3>FRANKFURTER</h3>
        <form method="post">
            <div>
            <label for="divisa1">Introduce la divisa a convertir</label>
                <select id="divisa1" name="divisa1">                
                    <option value="EUR" <?php if($_SESSION['DivisaInicio']=='EUR'){ echo "selected";}?>>Euro</option>
                    <option value="USD" <?php if($_SESSION['DivisaInicio']=='USD'){ echo "selected";}?>>Dolar</option>
                    <option value="JPY" <?php if($_SESSION['DivisaInicio']=='JPY'){ echo "selected";}?>>Yen</option>
                    <option value="CAD" <?php if($_SESSION['DivisaInicio']=='CAD'){ echo "selected";}?>>Dolar canadiense</option>
                    <option value="GBP" <?php if($_SESSION['DivisaInicio']=='GBP'){ echo "selected";}?>>Libra esterlina</option>
                </select>
            </div>
            
            <div>
                <label for="divisa2">Divisa convertida</label>
                <select id="divisa2" name="divisa2" <?php ?>>
                    <option value="EUR" <?php if($_SESSION['DivisaDestino']=='EUR'){ echo "selected";}?>>Euro</option>
                    <option value="USD" <?php if($_SESSION['DivisaDestino']=='USD'){ echo "selected";}?>>Dolar</option>
                    <option value="JPY" <?php if($_SESSION['DivisaDestino']=='JPY'){ echo "selected";}?>>Yen</option>
                    <option value="CAD" <?php if($_SESSION['DivisaDestino']=='CAD'){ echo "selected";}?>>Dolar canadiense</option>
                    <option value="GBP" <?php if($_SESSION['DivisaDestino']=='GBP'){ echo "selected";}?>>Libra esterlina</option>
                </select>
            </div>
            
            <div>
                <label for="cantidad1">Cantidad a convertir</label>
                <input id="cantidad1" name="cantidad1" type="number" min="0" value="<?php if(isset($_SESSION['CantidadInicio'])){ echo $_SESSION['CantidadInicio']; }else{ echo "0"; } ?>"/>
            </div>
            <div>
                <label for="cantidad2">Cantidad Convertida</label>
                <input id="cantidad2" name="cantidad2" type="number" disabled value="<?php if(isset($_SESSION['CambioDivisa'])){echo($_SESSION['CambioDivisa']);}else{ echo "0"; } ?>"/>
            </div>
            <input type="submit" id="solicitarDivisa" name="solicitarDivisa" value="Solicitar divisa">
            
        </form>
        <p><b>Parametros:</b> Divisa inicial, divisa destino</p>
        <p><b>Metodo:</b> POST</p>
        <p><a target="blank" href="https://frankfurter.dev/">Enlace a la pagina que explica el uso de la api</a></p>
    </div>
    <div class="cajaRest"></div>
</main>