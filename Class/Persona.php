<?php
/**
 * Description of Personas
 *
 * @author CRISTHIAN_OROZCO 2023-01-07
 */
    class Persona
    {
        private $int_id_persona;
        private $int_id_tipo_identificacion;
        private $int_id_genero;
        private $int_id_centro_comercial;
        private $int_id_rol_persona;
        private $int_id_cliente;
        private $int_id_administrativo;
        private $int_id_empresa;
        private $str_nombres_persona;
        private $str_apellidos_persona;
        private $str_direccion_persona;
        private $dte_fecha_registro_persona;
        private $bol_estado_persona;
        private $str_estado_civil_persona;

        /**
         * Get the value of int_id_persona
         */ 
        public function getInt_id_persona()
        {
                return $this->int_id_persona;
        }

        /**
         * Set the value of int_id_persona
         *
         * @return  self
         */ 
        public function setInt_id_persona($int_id_persona)
        {
                $this->int_id_persona = $int_id_persona;

                return $this;
        }

        /**
         * Get the value of int_id_tipo_identificacion
         */ 
        public function getInt_id_tipo_identificacion()
        {
                return $this->int_id_tipo_identificacion;
        }

        /**
         * Set the value of int_id_tipo_identificacion
         *
         * @return  self
         */ 
        public function setInt_id_tipo_identificacion($int_id_tipo_identificacion)
        {
                $this->int_id_tipo_identificacion = $int_id_tipo_identificacion;

                return $this;
        }

        /**
         * Get the value of int_id_genero
         */ 
        public function getInt_id_genero()
        {
                return $this->int_id_genero;
        }

        /**
         * Set the value of int_id_genero
         *
         * @return  self
         */ 
        public function setInt_id_genero($int_id_genero)
        {
                $this->int_id_genero = $int_id_genero;

                return $this;
        }

        /**
         * Get the value of int_id_centro_comercial
         */ 
        public function getInt_id_centro_comercial()
        {
                return $this->int_id_centro_comercial;
        }

        /**
         * Set the value of int_id_centro_comercial
         *
         * @return  self
         */ 
        public function setInt_id_centro_comercial($int_id_centro_comercial)
        {
                $this->int_id_centro_comercial = $int_id_centro_comercial;

                return $this;
        }

        /**
         * Get the value of int_id_rol_persona
         */ 
        public function getInt_id_rol_persona()
        {
                return $this->int_id_rol_persona;
        }

        /**
         * Set the value of int_id_rol_persona
         *
         * @return  self
         */ 
        public function setInt_id_rol_persona($int_id_rol_persona)
        {
                $this->int_id_rol_persona = $int_id_rol_persona;

                return $this;
        }

        /**
         * Get the value of int_id_cliente
         */ 
        public function getInt_id_cliente()
        {
                return $this->int_id_cliente;
        }

        /**
         * Set the value of int_id_cliente
         *
         * @return  self
         */ 
        public function setInt_id_cliente($int_id_cliente)
        {
                $this->int_id_cliente = $int_id_cliente;

                return $this;
        }

        /**
         * Get the value of int_id_administrativo
         */ 
        public function getInt_id_administrativo()
        {
                return $this->int_id_administrativo;
        }

        /**
         * Set the value of int_id_administrativo
         *
         * @return  self
         */ 
        public function setInt_id_administrativo($int_id_administrativo)
        {
                $this->int_id_administrativo = $int_id_administrativo;

                return $this;
        }

        /**
         * Get the value of int_id_empresa
         */ 
        public function getInt_id_empresa()
        {
                return $this->int_id_empresa;
        }

        /**
         * Set the value of int_id_empresa
         *
         * @return  self
         */ 
        public function setInt_id_empresa($int_id_empresa)
        {
                $this->int_id_empresa = $int_id_empresa;

                return $this;
        }

        /**
         * Get the value of str_nombres_persona
         */ 
        public function getStr_nombres_persona()
        {
                return $this->str_nombres_persona;
        }

        /**
         * Set the value of str_nombres_persona
         *
         * @return  self
         */ 
        public function setStr_nombres_persona($str_nombres_persona)
        {
                $this->str_nombres_persona = $str_nombres_persona;

                return $this;
        }

        /**
         * Get the value of str_apellidos_persona
         */ 
        public function getStr_apellidos_persona()
        {
                return $this->str_apellidos_persona;
        }

        /**
         * Set the value of str_apellidos_persona
         *
         * @return  self
         */ 
        public function setStr_apellidos_persona($str_apellidos_persona)
        {
                $this->str_apellidos_persona = $str_apellidos_persona;

                return $this;
        }

        /**
         * Get the value of str_direccion_persona
         */ 
        public function getStr_direccion_persona()
        {
                return $this->str_direccion_persona;
        }

        /**
         * Set the value of str_direccion_persona
         *
         * @return  self
         */ 
        public function setStr_direccion_persona($str_direccion_persona)
        {
                $this->str_direccion_persona = $str_direccion_persona;

                return $this;
        }

        /**
         * Get the value of dte_fecha_registro_persona
         */ 
        public function getDte_fecha_registro_persona()
        {
                return $this->dte_fecha_registro_persona;
        }

        /**
         * Set the value of dte_fecha_registro_persona
         *
         * @return  self
         */ 
        public function setDte_fecha_registro_persona($dte_fecha_registro_persona)
        {
                $this->dte_fecha_registro_persona = $dte_fecha_registro_persona;

                return $this;
        }

        /**
         * Get the value of bol_estado_persona
         */ 
        public function getBol_estado_persona()
        {
                return $this->bol_estado_persona;
        }

        /**
         * Set the value of bol_estado_persona
         *
         * @return  self
         */ 
        public function setBol_estado_persona($bol_estado_persona)
        {
                $this->bol_estado_persona = $bol_estado_persona;

                return $this;
        }

        /**
         * Get the value of str_estado_civil_persona
         */ 
        public function getStr_estado_civil_persona()
        {
                return $this->str_estado_civil_persona;
        }

        /**
         * Set the value of str_estado_civil_persona
         *
         * @return  self
         */ 
        public function setStr_estado_civil_persona($str_estado_civil_persona)
        {
                $this->str_estado_civil_persona = $str_estado_civil_persona;

                return $this;
        }

        public function toJSON(){
                return get_object_vars($this);
            }
    }
?>