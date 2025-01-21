<header id="headerLogin">
    <img id="logo" src="webroot/images/logo.png">
    <h1>Iniciar sesión</h1>
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
        <input type="submit" name='volver' id='volver' value='Volver'>
    </form>
</header>
<main>
    <div id="login">
        <form method="post" novalidate>                
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre">
            <label for="passwd">Contraseña</label>
            <input type="password" name="passwd" id="passwd">
            <input type="submit" id="botonLogin" name="botonLogin" value="Login">
            <input type="submit" id="botonRegistro" name="botonRegistro" value="Registrarse">
        </form>
    </div>
</main>