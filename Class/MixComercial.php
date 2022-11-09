<?php

    class MixComercial
    {
        private $id_mix_comercial;
        private $nombre_mix;
        private $descripcion_mix;

        /**
         * Get the value of id_mix_comercial
         */ 
        public function getId_mix_comercial()
        {
                return $this->id_mix_comercial;
        }

        /**
         * Set the value of id_mix_comercial
         *
         * @return  self
         */ 
        public function setId_mix_comercial($id_mix_comercial)
        {
                $this->id_mix_comercial = $id_mix_comercial;

                return $this;
        }

        /**
         * Get the value of nombre_mix
         */ 
        public function getNombre_mix()
        {
                return $this->nombre_mix;
        }

        /**
         * Set the value of nombre_mix
         *
         * @return  self
         */ 
        public function setNombre_mix($nombre_mix)
        {
                $this->nombre_mix = $nombre_mix;

                return $this;
        }

        /**
         * Get the value of descripcion_mix
         */ 
        public function getDescripcion_mix()
        {
                return $this->descripcion_mix;
        }

        /**
         * Set the value of descripcion_mix
         *
         * @return  self
         */ 
        public function setDescripcion_mix($descripcion_mix)
        {
                $this->descripcion_mix = $descripcion_mix;

                return $this;
        }
    }