<header id="headerPrograma">
    <img id="logo" src="webroot/images/logo.png">
    <h1>Bienvenido</h1>                
    <form method='post'>                     
        <p id="zonaUsuario"><button type="submit" id="perfilUser" name="perfilUser"><img src="webroot/images/LogoUsuario.png"></button><?php echo($oUsuarioEnCurso->getDescUsuario()); ?></p>
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
        <input type="submit" name='logoff' id='logoff' value='Cerrar sesion'>        
    </form>
</header>
<main id="programa">
    <form>
        <input type="submit" name='detalle' id='detalle' value='Detalle'>
        <input type="submit" name='error' id='error' value='Error'>
        <input type="submit" name='mantDep' id='mantDep' value='Mantenimiento departamentos'>
        <input type="submit" name='rest' id='rest' value='REST'>
    </form>
    <div>
        <?php        
            switch ($_COOKIE['Idioma']) {
                case 'es':
                    if ($avInicioPrivado['numConexiones'] > 0) {
                    ?>
                        <p>Bienvenido <?php echo($avInicioPrivado['descUsuario']) ?>, esta es la  <?php echo $avInicioPrivado['numConexiones'] + 1 ?> vez que te conectas;
                        usted se conectó por ultima vez el: <?php echo date_format(new DateTime($avInicioPrivado['fechaHoraUltimaConexionAnterior']), "d/m/Y H:i:s") ?></p>
                    <?php
                    } else {
                    ?>
                        <p>Bienvenido <?php echo($avInicioPrivado['descUsuario']) ?>, es la primera vez que te conectas</p>
                    <?php
                }
                break;

            case 'en':
                if ($avInicioPrivado['numConexiones'] > 0) {
                    ?>
                        <p>Welcome <?php echo($avInicioPrivado['descUsuario']) ?>, this is the  <?php echo $avInicioPrivado['numConexiones'] + 1 ?> you log in;
                        the last time you logged in was the: <?php echo date_format(new DateTime($avInicioPrivado['fechaHoraUltimaConexionAnterior']), "d/m/Y H:i:s") ?></p>
                    <?php
                    } else {
                    ?>
                        <p>Welcome <?php echo($avInicioPrivado['descUsuario']) ?>, this is the first time you log in</p>
                    <?php
                }
                break;
            }             
        ?>
    </div>
</main>