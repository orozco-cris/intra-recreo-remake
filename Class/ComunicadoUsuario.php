<?php
/**
 * Description of Comunicados
 *
 * @author CRISTHIAN_OROZCO 2022-10-03
 */
    class ComunicadoUsuario
    {
        private $id_comunicado_usuario;
        private $id_comunicado;
        private $id_usuario;
        private $revision;

        /**
         * Get the value of id_comunicado_usuario
         */ 
        public function getId_comunicado_usuario()
        {
                return $this->id_comunicado_usuario;
        }

        /**
         * Set the value of id_comunicado_usuario
         *
         * @return  self
         */ 
        public function setId_comunicado_usuario($id_comunicado_usuario)
        {
                $this->id_comunicado_usuario = $id_comunicado_usuario;

                return $this;
        }

        /**
         * Get the value of id_comunicado
         */ 
        public function getId_comunicado()
        {
                return $this->id_comunicado;
        }

        /**
         * Set the value of id_comunicado
         *
         * @return  self
         */ 
        public function setId_comunicado($id_comunicado)
        {
                $this->id_comunicado = $id_comunicado;

                return $this;
        }

        /**
         * Get the value of id_usuario
         */ 
        public function getId_usuario()
        {
                return $this->id_usuario;
        }

        /**
         * Set the value of id_usuario
         *
         * @return  self
         */ 
        public function setId_usuario($id_usuario)
        {
                $this->id_usuario = $id_usuario;

                return $this;
        }

        /**
         * Get the value of revision
         */ 
        public function getRevision()
        {
                return $this->revision;
        }

        /**
         * Set the value of revision
         *
         * @return  self
         */ 
        public function setRevision($revision)
        {
                $this->revision = $revision;

                return $this;
        }
    }