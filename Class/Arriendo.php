<?php

class Arriendo
    {
        private $id_arriendo;
        private $id_espacio_fisico;
        private $id_empresa;
        private $vendedor_arriendo;
        private $tipo_contrato;
        private $costo_contrato;
        private $descuento_arriendo;
        private $fecha_registro;
        private $fecha_vencimiento;
        private $observacion_arriendo;
        private $estado_arriendo;



        /**
         * Get the value of id_arriendo
         */ 
        public function getId_arriendo()
        {
                return $this->id_arriendo;
        }

        /**
         * Set the value of id_arriendo
         *
         * @return  self
         */ 
        public function setId_arriendo($id_arriendo)
        {
                $this->id_arriendo = $id_arriendo;

                return $this;
        }

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
         * Get the value of vendedor_arriendo
         */ 
        public function getVendedor_arriendo()
        {
                return $this->vendedor_arriendo;
        }

        /**
         * Set the value of vendedor_arriendo
         *
         * @return  self
         */ 
        public function setVendedor_arriendo($vendedor_arriendo)
        {
                $this->vendedor_arriendo = $vendedor_arriendo;

                return $this;
        }

        /**
         * Get the value of tipo_contrato
         */ 
        public function getTipo_contrato()
        {
                return $this->tipo_contrato;
        }

        /**
         * Set the value of tipo_contrato
         *
         * @return  self
         */ 
        public function setTipo_contrato($tipo_contrato)
        {
                $this->tipo_contrato = $tipo_contrato;

                return $this;
        }

        /**
         * Get the value of costo_contrato
         */ 
        public function getCosto_contrato()
        {
                return $this->costo_contrato;
        }

        /**
         * Set the value of costo_contrato
         *
         * @return  self
         */ 
        public function setCosto_contrato($costo_contrato)
        {
                $this->costo_contrato = $costo_contrato;

                return $this;
        }

        /**
         * Get the value of descuento_arriendo
         */ 
        public function getDescuento_arriendo()
        {
                return $this->descuento_arriendo;
        }

        /**
         * Set the value of descuento_arriendo
         *
         * @return  self
         */ 
        public function setDescuento_arriendo($descuento_arriendo)
        {
                $this->descuento_arriendo = $descuento_arriendo;

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
         * Get the value of fecha_vencimiento
         */ 
        public function getFecha_vencimiento()
        {
                return $this->fecha_vencimiento;
        }

        /**
         * Set the value of fecha_vencimiento
         *
         * @return  self
         */ 
        public function setFecha_vencimiento($fecha_vencimiento)
        {
                $this->fecha_vencimiento = $fecha_vencimiento;

                return $this;
        }

        /**
         * Get the value of observacion_arriendo
         */ 
        public function getObservacion_arriendo()
        {
                return $this->observacion_arriendo;
        }

        /**
         * Set the value of observacion_arriendo
         *
         * @return  self
         */ 
        public function setObservacion_arriendo($observacion_arriendo)
        {
                $this->observacion_arriendo = $observacion_arriendo;

                return $this;
        }

       
        /**
         * Get the value of estado_arriendo
         */ 
        public function getEstado_arriendo()
        {
                return $this->estado_arriendo;
        }

        /**
         * Set the value of estado_arriendo
         *
         * @return  self
         */ 
        public function setEstado_arriendo($estado_arriendo)
        {
                $this->estado_arriendo = $estado_arriendo;

                return $this;
        }
    }
?>