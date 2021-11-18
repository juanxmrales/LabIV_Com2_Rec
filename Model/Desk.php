<?php

    namespace Model;

    class Desk
    {
        private $deskId;
        private $deskNumber;
        private $establishmentId;
        private $presidentId;
        private $active;

        public function __construct($deskId, $deskNumber, $establishmentId, $presidentId, $active)
        {
            $this->deskId = $deskId;
            $this->deskNumber = $deskNumber;
            $this->establishmentId = $establishmentId;
            $this->presidentId = $presidentId;
            $this->active = $active;            
        }

        


        /**
         * Get the value of deskId
         */
        public function getDeskId()
        {
                return $this->deskId;
        }

        /**
         * Set the value of deskId
         *
         * @return  self
         */
        public function setDeskId($deskId)
        {
                $this->deskId = $deskId;

                return $this;
        }

        /**
         * Get the value of deskNumber
         */
        public function getDeskNumber()
        {
                return $this->deskNumber;
        }

        /**
         * Set the value of deskNumber
         *
         * @return  self
         */
        public function setDeskNumber($deskNumber)
        {
                $this->deskNumber = $deskNumber;

                return $this;
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
         * Get the value of presidentId
         */
        public function getPresidentId()
        {
                return $this->presidentId;
        }

        /**
         * Set the value of presidentId
         *
         * @return  self
         */
        public function setPresidentId($presidentId)
        {
                $this->presidentId = $presidentId;

                return $this;
        }

        /**
         * Get the value of active
         */
        public function getActive()
        {
                return $this->active;
        }

        /**
         * Set the value of active
         *
         * @return  self
         */
        public function setActive($active)
        {
                $this->active = $active;

                return $this;
        }
    }

?>