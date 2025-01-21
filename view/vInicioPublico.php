<header id="headerInicioPublico">
    <img id="logo" src="webroot/images/logo.png">
    <h1>Aplicacion Login logoff</h1>
    <form method='post'>                                                
        <div class='dropdown'>
            <?php
            $imagenIdioma = '';
            switch ($_COOKIE['Idioma']) {
                case 'es':
                    $imagenIdioma = 'españa.png';
                    break;

                case 'en':
                    $imagenIdioma = 'uk.png';
                    break;
                default:
                    $imagenIdioma = 'españa.png';
                    break;
            }
            ?>
            <img src="webroot/images/<?php echo($imagenIdioma) ?>" style="width: 40px; height: 20px">
            <div class='dropdown-content'>
                <button type="submit" name='español' id='español'>
                    <img src="webroot/images/españa.png" style="width: 40px; height: 20px">
                </button>
                <button type="submit" name='ingles' id='ingles'>
                    <img src="webroot/images/uk.png" style="width: 40px; height: 20px">
                </button>                        
            </div>
        </div>
        <input type="submit" name='login' id='login' value='Login'>
    </form>
</header>
<main id="inicioPublico">
    <div id="contenedorCarrusel">
        <div class="carrusel">
            <input type="radio" name="rd" id="one" checked>
            <input type="radio" name="rd" id="two">
            <input type="radio" name="rd" id="three">
            <input type="radio" name="rd" id="four">
            <input type="radio" name="rd" id="five">
            <div class="photos">
                <img src="webroot/images/navegacion.PNG" alt="">
                <img src="webroot/images/DiagramaClases.png" alt="">
                <img src="webroot/images/CasosUso.png" alt="">
                <img src="webroot/images/RelacionFicheros.PNG" alt="">
                <img src="webroot/images/uso$SESSION.png" alt="">
            </div>
            <div class="buttons">
                <label for="one" id="lbl1"></label>
                <label for="two" id="lbl2"></label>
                <label for="three" id="lbl3"></label>
                <label for="four" id="lbl4"></label>
                <label for="five" id="lbl5"></label>
            </div>
        </div>
    </div>    
</main>