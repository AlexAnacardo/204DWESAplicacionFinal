<?php
    class Departamento{
        private $codDepartamento;
        private $descripcion;
        private $alta;
        private $volumen;
        private $baja; 
        
        public function __construct($codDepartamento, $descripcion, $alta, $volumen, $baja) {
            $this->codDepartamento = $codDepartamento;
            $this->descripcion = $descripcion;
            $this->alta = $alta;
            $this->volumen = $volumen;
            $this->baja = $baja;
        }

        public function getCodDepartamento() {
            return $this->codDepartamento;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function getAlta() {
            return $this->alta;
        }

        public function getVolumen() {
            return $this->volumen;
        }

        public function getBaja() {
            return $this->baja;
        }

        public function setCodDepartamento($codDepartamento): void {
            $this->codDepartamento = $codDepartamento;
        }

        public function setDescripcion($descripcion): void {
            $this->descripcion = $descripcion;
        }

        public function setAlta($alta): void {
            $this->alta = $alta;
        }

        public function setVolumen($volumen): void {
            $this->volumen = $volumen;
        }

        public function setBaja($baja): void {
            $this->baja = $baja;
        }
    }    