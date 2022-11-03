<?php

class EspacioFisico
    {
        private $id_espacio_fisico;
        private $id_etapa_comercial;
        private $denominacion;
        private $ubicacion_espacio;
        private $medidas;
        private $caracteristicas;
        private $fotografia_espacio;
        private $tipo_espacio;
        private $estado_espacio;
        private $codigo_espacio; 

        

        /**
         * Get the value of id_espacio_fisico
         */ 
        public function getId_espacio_fisico()
        {
                return $this->id_espacio_fisico;
        }

        /**
         * Set the value of id_espacio_fisico
         *
         * @return  self
         */ 
        public function setId_espacio_fisico($id_espacio_fisico)
        {
                $this->id_espacio_fisico = $id_espacio_fisico;

                return $this;
        }

        /**
         * Get the value of id_etapa_comercial
         */ 
        public function getId_etapa_comercial()
        {
                return $this->id_etapa_comercial;
        }

        /**
         * Set the value of id_etapa_comercial
         *
         * @return  self
         */ 
        public function setId_etapa_comercial($id_etapa_comercial)
        {
                $this->id_etapa_comercial = $id_etapa_comercial;

                return $this;
        }

        /**
         * Get the value of denominacion
         */ 
        public function getDenominacion()
        {
                return $this->denominacion;
        }

        /**
         * Set the value of denominacion
         *
         * @return  self
         */ 
        public function setDenominacion($denominacion)
        {
                $this->denominacion = $denominacion;

                return $this;
        }

        /**
         * Get the value of ubicacion_espacio
         */ 
        public function getUbicacion_espacio()
        {
                return $this->ubicacion_espacio;
        }

        /**
         * Set the value of ubicacion_espacio
         *
         * @return  self
         */ 
        public function setUbicacion_espacio($ubicacion_espacio)
        {
                $this->ubicacion_espacio = $ubicacion_espacio;

                return $this;
        }

        /**
         * Get the value of medidas
         */ 
        public function getMedidas()
        {
                return $this->medidas;
        }

        /**
         * Set the value of medidas
         *
         * @return  self
         */ 
        public function setMedidas($medidas)
        {
                $this->medidas = $medidas;

                return $this;
        }

        /**
         * Get the value of caracteristicas
         */ 
        public function getCaracteristicas()
        {
                return $this->caracteristicas;
        }

        /**
         * Set the value of caracteristicas
         *
         * @return  self
         */ 
        public function setCaracteristicas($caracteristicas)
        {
                $this->caracteristicas = $caracteristicas;

                return $this;
        }

        /**
         * Get the value of fotografia_espacio
         */ 
        public function getFotografia_espacio()
        {
                return $this->fotografia_espacio;
        }

        /**
         * Set the value of fotografia_espacio
         *
         * @return  self
         */ 
        public function setFotografia_espacio($fotografia_espacio)
        {
                $this->fotografia_espacio = $fotografia_espacio;

                return $this;
        }

        /**
         * Get the value of tipo_espacio
         */ 
        public function getTipo_espacio()
        {
                return $this->tipo_espacio;
        }

        /**
         * Set the value of tipo_espacio
         *
         * @return  self
         */ 
        public function setTipo_espacio($tipo_espacio)
        {
                $this->tipo_espacio = $tipo_espacio;

                return $this;
        }

        /**
         * Get the value of estado_espcio
         */ 
        public function getEstado_espacio()
        {
                return $this->estado_espacio;
        }

        /**
         * Set the value of estado_espcio
         *
         * @return  self
         */ 
        public function setEstado_espacio($estado_espacio)
        {
                $this->estado_espacio = $estado_espacio;

                return $this;
        }

        /**
         * Get the value of codigo_espacio
         */ 
        public function getCodigo_espacio()
        {
                return $this->codigo_espacio;
        }

        /**
         * Set the value of codigo_espacio
         *
         * @return  self
         */ 
        public function setCodigo_espacio($codigo_espacio)
        {
                $this->codigo_espacio = $codigo_espacio;

                return $this;
        }
    }
?>