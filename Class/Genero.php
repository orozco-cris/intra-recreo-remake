<?php
/**
 * Description of Generos
 *
 * @author CRISTHIAN_OROZCO 2023-01-07
 */
    class Genero
    {
        private $int_id_genero;
        private $str_nombre_genero;
        private $str_descripcion_genero;

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
         * 
         */ 
       /*  public function setInt_id_genero($int_id_genero)
        {
                $this->int_id_genero = $int_id_genero;

                return $this;
        } */

        /**
         * Get the value of str_nombre_genero
         */ 
        public function getStr_nombre_genero()
        {
                return $this->str_nombre_genero;
        }

        /**
         * Set the value of str_nombre_genero
         *
         * @return  self
         */ 
        public function setStr_nombre_genero($str_nombre_genero)
        {
                $this->str_nombre_genero = $str_nombre_genero;

                return $this;
        }

        /**
         * Get the value of str_descripcion_genero
         */ 
        public function getStr_descripcion_genero()
        {
                return $this->str_descripcion_genero;
        }

        /**
         * Set the value of str_descripcion_genero
         *
         * @return  self
         */ 
        public function setStr_descripcion_genero($str_descripcion_genero)
        {
                $this->str_descripcion_genero = $str_descripcion_genero;

                return $this;
        }
    }