<?php
    /**
     * Clase para contener informacion de una foto
     * 
     * Esta clase representa una foto de la NASA y sus detalles asociados,
     * tales como el título, la URL de la imagen y la explicación.
     * Permite establecer y obtener estos valores mediante métodos getter y setter.          
     */
    class FotoNasa{
        private $titulo;
        private $url;
        private $explicacion;
        
        /**
         * Constructor de la clase FotoNasa.
         * 
         * @param string $titulo Título de la foto
         * @param string $url URL de la imagen
         * @param string $explicacion Explicación de la imagen
         */
        public function __construct($titulo, $url, $explicacion) {
            $this->titulo = $titulo;
            $this->url = $url;
            $this->explicacion = $explicacion;
        }

        /**
         * Obtiene el título de la foto.
         * 
         * @return string El título de la foto
         */
        public function getTitulo() {
            return $this->titulo;
        }

        /**
         * Obtiene la URL de la foto.
         * 
         * @return string La URL de la foto
         */
        public function getUrl() {
            return $this->url;
        }

        /**
         * Obtiene la explicación de la foto.
         * 
         * @return string La explicación de la foto
         */
        public function getExplicacion() {
            return $this->explicacion;
        }

        /**
         * Establece un nuevo título para la foto.
         * 
         * @param string $titulo El nuevo título de la foto
         * @return void
         */
        public function setTitulo($titulo): void {
            $this->titulo = $titulo;
        }

        /**
         * Establece una nueva URL para la foto.
         * 
         * @param string $url La nueva URL de la foto
         * @return void
         */
        public function setUrl($url): void {
            $this->url = $url;
        }

        /**
         * Establece una nueva explicación para la foto.
         * 
         * @param string $explicacion La nueva explicación de la foto
         * @return void
         */
        public function setExplicacion($explicacion): void {
            $this->explicacion = $explicacion;
        }
    }
?>