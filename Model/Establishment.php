<?php

    namespace Model;

    class Establishment
    {
        private $establishmentId;
        private $name;

        public function __construct($establishmentId, $name)
        {
            $this->establishmentId = $establishmentId;
            $this->name = $name;
        }

        
        /**
         * Get the value of establishmentId
         */
        public function getEstablishmentId()
        {
                return $this->establishmentId;
        }

        /**
         * Set the value of establishmentId
         *
         * @return  self
         */
        public function setEstablishmentId($establishmentId)
        {
                $this->establishmentId = $establishmentId;

                return $this;
        }

        /**
         * Get the value of name
         */
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }
    }

?>