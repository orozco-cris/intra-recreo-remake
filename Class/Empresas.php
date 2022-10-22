<?php

class Empresas
    {
        private $id_empresa;
        private $id_usuario;
        private $id_mix_comercial;
        private $nombre_comercial;
        private $ruc_empresa;
        private $telefono_empresa;
        private $direccion_empresa;
        private $correo_empresa;
        private $fecha_registro;
        private $fecha_deshabilitado;
        private $estado_empresa;


        /**
         * Get the value of id_empresa
         */ 
        public function getId_empresa()
        {
                return $this->id_empresa;
        }

        /**
         * Set the value of id_empresa
         *
         * @return  self
         */ 
        public function setId_empresa($id_empresa)
        {
                $this->id_empresa = $id_empresa;

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
         * Get the value of nombre_comercial
         */ 
        public function getNombre_comercial()
        {
                return $this->nombre_comercial;
        }

        /**
         * Set the value of nombre_comercial
         *
         * @return  self
         */ 
        public function setNombre_comercial($nombre_comercial)
        {
                $this->nombre_comercial = $nombre_comercial;

                return $this;
        }

        /**
         * Get the value of ruc_empresa
         */ 
        public function getRuc_empresa()
        {
                return $this->ruc_empresa;
        }

        /**
         * Set the value of ruc_empresa
         *
         * @return  self
         */ 
        public function setRuc_empresa($ruc_empresa)
        {
                $this->ruc_empresa = $ruc_empresa;

                return $this;
        }

        /**
         * Get the value of telefono_empresa
         */ 
        public function getTelefono_empresa()
        {
                return $this->telefono_empresa;
        }

        /**
         * Set the value of telefono_empresa
         *
         * @return  self
         */ 
        public function setTelefono_empresa($telefono_empresa)
        {
                $this->telefono_empresa = $telefono_empresa;

                return $this;
        }

        /**
         * Get the value of direccion_empresa
         */ 
        public function getDireccion_empresa()
        {
                return $this->direccion_empresa;
        }

        /**
         * Set the value of direccion_empresa
         *
         * @return  self
         */ 
        public function setDireccion_empresa($direccion_empresa)
        {
                $this->direccion_empresa = $direccion_empresa;

                return $this;
        }

        /**
         * Get the value of correo_empresa
         */ 
        public function getCorreo_empresa()
        {
                return $this->correo_empresa;
        }

        /**
         * Set the value of correo_empresa
         *
         * @return  self
         */ 
        public function setCorreo_empresa($correo_empresa)
        {
                $this->correo_empresa = $correo_empresa;

                return $this;
        }

        /**
         * Get the value of fecha_registro
         */ 
        public function getFecha_registro()
        {
                return $this->fecha_registro;
        }

        /**
         * Set the value of fecha_registro
         *
         * @return  self
         */ 
        public function setFecha_registro($fecha_registro)
        {
                $this->fecha_registro = $fecha_registro;

                return $this;
        }

        /**
         * Get the value of fecha_deshabilitado
         */ 
        public function getFecha_deshabilitado()
        {
                return $this->fecha_deshabilitado;
        }

        /**
         * Set the value of fecha_deshabilitado
         *
         * @return  self
         */ 
        public function setFecha_deshabilitado($fecha_deshabilitado)
        {
                $this->fecha_deshabilitado = $fecha_deshabilitado;

                return $this;
        }

        /**
         * Get the value of estado_empresa
         */ 
        public function getEstado_empresa()
        {
                return $this->estado_empresa;
        }

        /**
         * Set the value of estado_empresa
         *
         * @return  self
         */ 
        public function setEstado_empresa($estado_empresa)
        {
                $this->estado_empresa = $estado_empresa;

                return $this;
        }
    }
?>