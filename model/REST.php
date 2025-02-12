<?php
    /**
     * Clase REST
     * 
     * Esta clase proporciona métodos para interactuar diversas API          
     */
class REST{
        /**
         * Clave de API para acceder a los servicios de la NASA.
         * Esta clave es necesaria para realizar solicitudes a la API de la NASA.
         * 
         * @var string
         */
    const claveApiNasa = 'VsYbmhgR6eLeRLrMI8Ody4p5CrNLecqGqedsu46e';

    /**
     * Obtiene una imagen de la NASA (APOD) para una fecha específica.
     * 
     * Este método realiza una solicitud a la API de la NASA para obtener
     * la imagen del día (APOD) junto con su título y explicación en formato JSON.
     * Luego, decodifica la respuesta y crea una instancia de la clase FotoNasa
     * con los datos obtenidos.
     * 
     * @param string $fecha Fecha en formato 'YYYY-MM-DD' para obtener la imagen
     * @return FotoNasa|null Un objeto FotoNasa con los datos de la imagen, o null si la api no devuelve la imagen
     */
    public static function recogerImagenNasa($fecha){
        try{            
            $llamadaApi= file_get_contents("https://api.nasa.gov/planetary/apod?api_key=". self::claveApiNasa . "&date=" . $fecha);
            $jsonFotoNasa= json_decode($llamadaApi, true);
            
            if(isset($jsonFotoNasa)){
                $fotoNasa=new FotoNasa($jsonFotoNasa['title'], $jsonFotoNasa['url'], $jsonFotoNasa['explanation']);
                return $fotoNasa;
            }else{
                return null;
            }
        } catch (Exception $ex) {
            // Si se produce un error, se crea un objeto de la clase ErrorApp
            $error = new ErrorApp(
                $ex->getCode(),
                $ex->getMessage(),
                $ex->getFile(),
                $ex->getLine(),
                $_SESSION['paginaAnterior']
            );
            //Guardamos el objeto ErrorApp en la sesion
            $_SESSION['error'] = $error;
            $_SESSION['paginaEnCurso'] = 'error';
            
            // Redirigir al usuario a la página de error
            header('Location: index.php');
            exit();
        }
    }
    
    public static function solicitarDivisaFrankfurter($divisa1, $divisa2, $cantidad){
        try{            
            $llamadaApi= file_get_contents('https://api.frankfurter.app/latest?from='.$divisa1.'&to='.$divisa2);
            $jsonDivisa= json_decode($llamadaApi, true);
            
            if(isset($jsonDivisa)){              
                return floatval($jsonDivisa['rates'][$divisa2])*floatval($cantidad);
            }else{
                return null;
            }
        } catch (Exception $ex) {
            // Si se produce un error, se crea un objeto de la clase ErrorApp
            $error = new ErrorApp(
                $ex->getCode(),
                $ex->getMessage(),
                $ex->getFile(),
                $ex->getLine(),
                $_SESSION['paginaAnterior']
            );
            //Guardamos el objeto ErrorApp en la sesion
            $_SESSION['error'] = $error;
            $_SESSION['paginaEnCurso'] = 'error';
            
            // Redirigir al usuario a la página de error
            header('Location: index.php');
            exit();
        }
    }
}
?>