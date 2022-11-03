<?php

class EtapaComercial
    {
        private $id_etapa_comercial;
        private $nombre_etapa_comercial;
        private $descripcion_etapa_comercial;
 

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
         * Get the value of nombre_etapa_comercial
         */ 
        public function getNombre_etapa_comercial()
        {
                return $this->nombre_etapa_comercial;
        }

        /**
         * Set the value of nombre_etapa_comercial
         *
         * @return  self
         */ 
        public function setNombre_etapa_comercial($nombre_etapa_comercial)
        {
                $this->nombre_etapa_comercial = $nombre_etapa_comercial;

                return $this;
        }

        /**
         * Get the value of descripcion_etapa_comercial
         */ 
        public function getDescripcion_etapa_comercial()
        {
                return $this->descripcion_etapa_comercial;
        }

        /**
         * Set the value of descripcion_etapa_comercial
         *
         * @return  self
         */ 
        public function setDescripcion_etapa_comercial($descripcion_etapa_comercial)
        {
                $this->descripcion_etapa_comercial = $descripcion_etapa_comercial;

                return $this;
        }
    }
?>