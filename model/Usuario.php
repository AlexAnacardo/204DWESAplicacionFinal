<?php
    /*
     * @version 2024/12/19
     * @author Alex Asensio Sanchez                          
     */

    class Usuario{
        private $codUsuario;
        private $password;
        private $descUsuario;
        private $numAccesos;
        private $fechaHoraUltimaConexion;
        private $fechaHoraUltimaConexionAnterior;
        private $perfil;

        /**
         * Constructor de la clase Usuario
         * 
         * @param string $codUsuario Código del usuario
         * @param string $password Contraseña del usuario
         * @param string $descUsuario Descripción del usuario
         * @param int $numAccesos Número de accesos del usuario
         * @param string $fechaHoraUltimaConexion Fecha y hora de la última conexión del usuario
         * @param string $fechaHoraUltimaConexionAnterior Fecha y hora de la conexión anterior del usuario
         * @param string $perfil Perfil del usuario 
         */
        public function __construct($codUsuario, $password, $descUsuario, $numAccesos, $fechaHoraUltimaConexion, $fechaHoraUltimaConexionAnterior, $perfil) {
            $this->codUsuario = $codUsuario;
            $this->password = $password;
            $this->descUsuario = $descUsuario;
            $this->numAccesos = $numAccesos;
            $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
            $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
            $this->perfil = $perfil;
        }

        /**
         * Obtiene el código del usuario
         * 
         * @return string 
         */
        public function getCodUsuario() {
            return $this->codUsuario;
        }

        /**
         * Obtiene la contraseña del usuario
         * 
         * @return string 
         */
        public function getPassword() {
            return $this->password;
        }

        /**
         * Obtiene la descripción del usuario
         * 
         * @return string 
         */
        public function getDescUsuario() {
            return $this->descUsuario;
        }

        /**
         * Obtiene el número de accesos del usuario
         * 
         * @return int 
         */
        public function getNumAccesos() {
            return $this->numAccesos;
        }

        /**
         * Obtiene la fecha y hora de la última conexión del usuario
         * 
         * @return string 
         */
        public function getFechaHoraUltimaConexion() {
            return $this->fechaHoraUltimaConexion;
        }

        /**
         * Obtiene la fecha y hora de la conexión anterior del usuario
         * 
         * @return string 
         */
        public function getFechaHoraUltimaConexionAnterior() {
            return $this->fechaHoraUltimaConexionAnterior;
        }

        /**
         * Obtiene el perfil del usuario
         * 
         * @return string 
         */
        public function getPerfil() {
            return $this->perfil;
        }

        /**
         * Establece el código del usuario
         * 
         * @param string $codUsuario 
         */
        public function setCodUsuario($codUsuario): void {
            $this->codUsuario = $codUsuario;
        }

        /**
         * Establece la contraseña del usuario
         * 
         * @param string $password 
         */
        public function setPassword($password): void {
            $this->password = $password;
        }

        /**
         * Establece la descripción del usuario
         * 
         * @param string $descUsuario 
         */
        public function setDescUsuario($descUsuario): void {
            $this->descUsuario = $descUsuario;
        }

        /**
         * Establece el número de accesos del usuario
         * 
         * @param int $numAccesos 
         */
        public function setNumAccesos($numAccesos): void {
            $this->numAccesos = $numAccesos;
        }

        /**
         * Establece la fecha y hora de la última conexión del usuario
         * 
         * @param string $fechaHoraUltimaConexion 
         */
        public function setFechaHoraUltimaConexion($fechaHoraUltimaConexion): void {
            $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        }

        /**
         * Establece la fecha y hora de la conexión anterior del usuario
         * 
         * @param string $fechaHoraUltimaConexionAnterior 
         */
        public function setFechaHoraUltimaConexionAnterior($fechaHoraUltimaConexionAnterior): void {
            $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
        }

        /**
         * Establece el perfil del usuario
         * 
         * @param string $perfil 
         */
        public function setPerfil($perfil): void {
            $this->perfil = $perfil;
        }
    }
?>