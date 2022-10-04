<?php
/**
 * Description of Comunicados
 *
 * @author CRISTHIAN_OROZCO 2022-09-30
 */
    class Comunicado
    {
        private $id_comunicado;
        private $id_usuario_creador;
        private $de_comunicado;
        private $para_comunicado;
        private $codigo_comunicado;
        private $asunto_comunicado;
        private $mensaje_comunicado;
        private $detalle_comunicado;
        private $dia_comunicado;
        private $mes_comunicado;
        private $anio_comunicado;
        private $hora_comunicado;
        private $fecha_caducidad_comunicado;
        private $foto_comunicado;
        private $tipo_comunicado;

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
         * Get the value of de_comunicado
         */ 
        public function getDe_comunicado()
        {
                return $this->de_comunicado;
        }

        /**
         * Set the value of de_comunicado
         *
         * @return  self
         */ 
        public function setDe_comunicado($de_comunicado)
        {
                $this->de_comunicado = $de_comunicado;

                return $this;
        }

        /**
         * Get the value of para_comunicado
         */ 
        public function getPara_comunicado()
        {
                return $this->para_comunicado;
        }

        /**
         * Set the value of para_comunicado
         *
         * @return  self
         */ 
        public function setPara_comunicado($para_comunicado)
        {
                $this->para_comunicado = $para_comunicado;

                return $this;
        }

        /**
         * Get the value of codigo_comunicado
         */ 
        public function getCodigo_comunicado()
        {
                return $this->codigo_comunicado;
        }

        /**
         * Set the value of codigo_comunicado
         *
         * @return  self
         */ 
        public function setCodigo_comunicado($codigo_comunicado)
        {
                $this->codigo_comunicado = $codigo_comunicado;

                return $this;
        }

        /**
         * Get the value of asunto_comunicado
         */ 
        public function getAsunto_comunicado()
        {
                return $this->asunto_comunicado;
        }

        /**
         * Set the value of asunto_comunicado
         *
         * @return  self
         */ 
        public function setAsunto_comunicado($asunto_comunicado)
        {
                $this->asunto_comunicado = $asunto_comunicado;

                return $this;
        }

        /**
         * Get the value of mensaje_comunicado
         */ 
        public function getMensaje_comunicado()
        {
                return $this->mensaje_comunicado;
        }

        /**
         * Set the value of mensaje_comunicado
         *
         * @return  self
         */ 
        public function setMensaje_comunicado($mensaje_comunicado)
        {
                $this->mensaje_comunicado = $mensaje_comunicado;

                return $this;
        }

        /**
         * Get the value of detalle_comunicado
         */ 
        public function getDetalle_comunicado()
        {
                return $this->detalle_comunicado;
        }

        /**
         * Set the value of detalle_comunicado
         *
         * @return  self
         */ 
        public function setDetalle_comunicado($detalle_comunicado)
        {
                $this->detalle_comunicado = $detalle_comunicado;

                return $this;
        }

        /**
         * Get the value of dia_comunicado
         */ 
        public function getDia_comunicado()
        {
                return $this->dia_comunicado;
        }

        /**
         * Set the value of dia_comunicado
         *
         * @return  self
         */ 
        public function setDia_comunicado($dia_comunicado)
        {
                $this->dia_comunicado = $dia_comunicado;

                return $this;
        }

        /**
         * Get the value of mes_comunicado
         */ 
        public function getMes_comunicado()
        {
                return $this->mes_comunicado;
        }

        /**
         * Set the value of mes_comunicado
         *
         * @return  self
         */ 
        public function setMes_comunicado($mes_comunicado)
        {
                $this->mes_comunicado = $mes_comunicado;

                return $this;
        }

        /**
         * Get the value of anio_comunicado
         */ 
        public function getAnio_comunicado()
        {
                return $this->anio_comunicado;
        }

        /**
         * Set the value of anio_comunicado
         *
         * @return  self
         */ 
        public function setAnio_comunicado($anio_comunicado)
        {
                $this->anio_comunicado = $anio_comunicado;

                return $this;
        }

        /**
         * Get the value of hora_comunicado
         */ 
        public function getHora_comunicado()
        {
                return $this->hora_comunicado;
        }

        /**
         * Set the value of hora_comunicado
         *
         * @return  self
         */ 
        public function setHora_comunicado($hora_comunicado)
        {
                $this->hora_comunicado = $hora_comunicado;

                return $this;
        }

        /**
         * Get the value of fecha_caducidad_comunicado
         */ 
        public function getFecha_caducidad_comunicado()
        {
                return $this->fecha_caducidad_comunicado;
        }

        /**
         * Set the value of fecha_caducidad_comunicado
         *
         * @return  self
         */ 
        public function setFecha_caducidad_comunicado($fecha_caducidad_comunicado)
        {
                $this->fecha_caducidad_comunicado = $fecha_caducidad_comunicado;

                return $this;
        }

        /**
         * Get the value of foto_comunicado
         */ 
        public function getFoto_comunicado()
        {
                return $this->foto_comunicado;
        }

        /**
         * Set the value of foto_comunicado
         *
         * @return  self
         */ 
        public function setFoto_comunicado($foto_comunicado)
        {
                $this->foto_comunicado = $foto_comunicado;

                return $this;
        }

        /**
         * Get the value of id_usuario_creador
         */ 
        public function getId_usuario_creador()
        {
                return $this->id_usuario_creador;
        }

        /**
         * Set the value of id_usuario_creador
         *
         * @return  self
         */ 
        public function setId_usuario_creador($id_usuario_creador)
        {
                $this->id_usuario_creador = $id_usuario_creador;

                return $this;
        }

        /**
         * Get the value of tipo_comunicado
         */ 
        public function getTipo_comunicado()
        {
                return $this->tipo_comunicado;
        }

        /**
         * Set the value of tipo_comunicado
         *
         * @return  self
         */ 
        public function setTipo_comunicado($tipo_comunicado)
        {
                $this->tipo_comunicado = $tipo_comunicado;

                return $this;
        }
    }