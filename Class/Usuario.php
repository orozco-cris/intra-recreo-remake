<?php
/**
 * Description of Usuarios
 *
 * @author CRISTHIAN_OROZCO 2022-09-28
 */
    class Usuario
    {
        private $id_usuario;
        private $id_tipo_usuario;
        private $nombre_usuario;
        private $apellido_usuario;
        private $cedula_usuario;
        private $login_usuario;
        private $clave_usuario;
        private $correo_usuario;
        private $direccion_usuario;
        private $estado_usuario;

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
         * Get the value of nombre_usuario
         */ 
        public function getNombre_usuario()
        {
                return $this->nombre_usuario;
        }

        /**
         * Set the value of nombre_usuario
         *
         * @return  self
         */ 
        public function setNombre_usuario($nombre_usuario)
        {
                $this->nombre_usuario = $nombre_usuario;

                return $this;
        }

        /**
         * Get the value of apellido_usuario
         */ 
        public function getApellido_usuario()
        {
                return $this->apellido_usuario;
        }

        /**
         * Set the value of apellido_usuario
         *
         * @return  self
         */ 
        public function setApellido_usuario($apellido_usuario)
        {
                $this->apellido_usuario = $apellido_usuario;

                return $this;
        }

        /**
         * Get the value of cedula_usuario
         */ 
        public function getCedula_usuario()
        {
                return $this->cedula_usuario;
        }

        /**
         * Set the value of cedula_usuario
         *
         * @return  self
         */ 
        public function setCedula_usuario($cedula_usuario)
        {
                $this->cedula_usuario = $cedula_usuario;

                return $this;
        }

        /**
         * Get the value of login_usuario
         */ 
        public function getLogin_usuario()
        {
                return $this->login_usuario;
        }

        /**
         * Set the value of login_usuario
         *
         * @return  self
         */ 
        public function setLogin_usuario($login_usuario)
        {
                $this->login_usuario = $login_usuario;

                return $this;
        }

        /**
         * Get the value of clave_usuario
         */ 
        public function getClave_usuario()
        {
                return $this->clave_usuario;
        }

        /**
         * Set the value of clave_usuario
         *
         * @return  self
         */ 
        public function setClave_usuario($clave_usuario)
        {
                $this->clave_usuario = $clave_usuario;

                return $this;
        }

        /**
         * Get the value of correo_usuario
         */ 
        public function getCorreo_usuario()
        {
                return $this->correo_usuario;
        }

        /**
         * Set the value of correo_usuario
         *
         * @return  self
         */ 
        public function setCorreo_usuario($correo_usuario)
        {
                $this->correo_usuario = $correo_usuario;

                return $this;
        }

        /**
         * Get the value of direccion_usuario
         */ 
        public function getDireccion_usuario()
        {
                return $this->direccion_usuario;
        }

        /**
         * Set the value of direccion_usuario
         *
         * @return  self
         */ 
        public function setDireccion_usuario($direccion_usuario)
        {
                $this->direccion_usuario = $direccion_usuario;

                return $this;
        }

        /**
         * Get the value of estado_usuario
         */ 
        public function getEstado_usuario()
        {
                return $this->estado_usuario;
        }

        /**
         * Set the value of estado_usuario
         *
         * @return  self
         */ 
        public function setEstado_usuario($estado_usuario)
        {
                $this->estado_usuario = $estado_usuario;

                return $this;
        }
    }
?>