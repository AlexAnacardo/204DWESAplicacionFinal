<?php
/**
 * Clase ErrorApp para almacenar y gestionar detalles de un error.
 * 
 * Esta clase se utiliza para representar un error en la aplicación, almacenando información relevante 
 * como el código de error, la descripción, el archivo y la línea donde ocurrió el error, así como la página 
 * a la que se debe redirigir después de manejar el error.
 */
class ErrorApp {

    private $codError;
    private $descError;
    private $archivoError;
    private $lineaError;
    private $paginaSiguiente;

    /**
     * Constructor de la clase ErrorApp.
     * 
     * Inicializa una nueva instancia de ErrorApp con los parámetros proporcionados.
     * 
     * @param int $codError Código del error.
     * @param string $descError Descripción del error.
     * @param string $archivoError Archivo donde ocurrió el error.
     * @param int $lineaError Línea donde ocurrió el error.
     * @param string $paginaSiguiente Página a la que se redirige después de manejar el error.
     */
    public function __construct($codError, $descError, $archivoError, $lineaError, $paginaSiguiente) {
        $this->codError = $codError;
        $this->descError = $descError;
        $this->archivoError = $archivoError;
        $this->lineaError = $lineaError;
        $this->paginaSiguiente = $paginaSiguiente;
    }

    /**
     * Obtiene el código del error.
     * 
     * @return int El código del error.
     */
    public function getCodError() {
        return $this->codError;
    }

    /**
     * Obtiene la descripción del error.
     * 
     * @return string La descripción del error.
     */
    public function getDescError() {
        return $this->descError;
    }

    /**
     * Obtiene el archivo donde ocurrió el error.
     * 
     * @return string El archivo donde ocurrió el error.
     */
    public function getArchivoError() {
        return $this->archivoError;
    }

    /**
     * Obtiene la línea donde ocurrió el error.
     * 
     * @return int La línea donde ocurrió el error.
     */
    public function getLineaError() {
        return $this->lineaError;
    }

    /**
     * Obtiene la página a la que se debe redirigir después de manejar el error.
     * 
     * @return string La página siguiente.
     */
    public function getPaginaSiguiente() {
        return $this->paginaSiguiente;
    }

    /**
     * Establece el código del error.
     * 
     * @param int $codError El nuevo código del error.
     */
    public function setCodError($codError): void {
        $this->codError = $codError;
    }

    /**
     * Establece la descripción del error.
     * 
     * @param string $descError La nueva descripción del error.
     */
    public function setDescError($descError): void {
        $this->descError = $descError;
    }

    /**
     * Establece el archivo donde ocurrió el error.
     * 
     * @param string $archivoError El nuevo archivo donde ocurrió el error.
     */
    public function setArchivoError($archivoError): void {
        $this->archivoError = $archivoError;
    }

    /**
     * Establece la línea donde ocurrió el error.
     * 
     * @param int $lineaError La nueva línea donde ocurrió el error.
     */
    public function setLineaError($lineaError): void {
        $this->lineaError = $lineaError;
    }

    /**
     * Establece la página a la que se debe redirigir después de manejar el error.
     * 
     * @param string $paginaSiguiente La nueva página a la que redirigir.
     */
    public function setPaginaSiguiente($paginaSiguiente): void {
        $this->paginaSiguiente = $paginaSiguiente;
    }
}
?>