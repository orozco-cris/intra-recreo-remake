<?php
/**
 * Description of Usuarios
 *
 * @author CRISTHIAN_OROZCO 2022-06-06
 */
    class Usuario
    {
        private $idUsuario;
        private $nombre;
        private $apellido;
        private $cedula;
        private $clave;
        private $contacto;
        private $rol;
        private $estado;

        public function getIdUsuario()
        {
                return $this->idUsuario;
        }

        public function setIdUsuario($idUsuario)
        {
                $this->idUsuario = $idUsuario;
                return $this;
        }

        public function getNombre()
        {
                return $this->nombre;
        }

        public function setNombre($nombre)
        {
                $this->nombre = $nombre;
                return $this;
        }

        public function getApellido()
        {
                return $this->apellido;
        }

        public function setApellido($apellido)
        {
                $this->apellido = $apellido;
                return $this;
        }

        public function getCedula()
        {
                return $this->cedula;
        }

        public function setCedula($cedula)
        {
                $this->cedula = $cedula;
                return $this;
        }

        public function getClave()
        {
                return $this->clave;
        }

        public function setClave($clave)
        {
                $this->clave = $clave;
                return $this;
        }

        public function getContacto()
        {
                return $this->contacto;
        }

        public function setContacto($contacto)
        {
                $this->contacto = $contacto;
                return $this;
        }

        public function getRol()
        {
                return $this->rol;
        }

        public function setRol($rol)
        {
                $this->rol = $rol;
                return $this;
        }

        public function getEstado()
        {
                return $this->estado;
        }

        public function setEstado($estado)
        {
                $this->estado = $estado;
                return $this;
        }
    }
?>