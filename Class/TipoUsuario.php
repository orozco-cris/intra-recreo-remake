<?php
/**
 * Description of Comunicados
 *
 * @author CRISTHIAN_OROZCO 2022-10-01
 */
    class TipoUsuario
    {
        private $id_tipo_usuario;
        private $nombre_tipo_usuario;
        private $descripcion_tipo_usuario;

        /**
         * Get the value of id_tipo_usuario
         */ 
        public function getId_tipo_usuario()
        {
                return $this->id_tipo_usuario;
        }

        /**
         * Set the value of id_tipo_usuario
         *
         * @return  self
         */ 
        public function setId_tipo_usuario($id_tipo_usuario)
        {
                $this->id_tipo_usuario = $id_tipo_usuario;

                return $this;
        }

        /**
         * Get the value of nombre_tipo_usuario
         */ 
        public function getNombre_tipo_usuario()
        {
                return $this->nombre_tipo_usuario;
        }

        /**
         * Set the value of nombre_tipo_usuario
         *
         * @return  self
         */ 
        public function setNombre_tipo_usuario($nombre_tipo_usuario)
        {
                $this->nombre_tipo_usuario = $nombre_tipo_usuario;

                return $this;
        }

        /**
         * Get the value of descripcion_tipo_usuario
         */ 
        public function getDescripcion_tipo_usuario()
        {
                return $this->descripcion_tipo_usuario;
        }

        /**
         * Set the value of descripcion_tipo_usuario
         *
         * @return  self
         */ 
        public function setDescripcion_tipo_usuario($descripcion_tipo_usuario)
        {
                $this->descripcion_tipo_usuario = $descripcion_tipo_usuario;

                return $this;
        }
    }