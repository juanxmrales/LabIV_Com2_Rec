<?php

    namespace Model;

    class Citizen
    {
        private $citizenId;
        private $firstName;
        private $lastName;
        private $email;
        private $dni;
        private $birthdate;
        private $address;
        private $deskId;

        public function __construct($citizenId, $firstName, $lastName, $email, $dni, $birthdate, $address, $deskId)
        {   
            $this->citizenId = $citizenId;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->dni = $dni;
            $this->birthdate = $birthdate;
            $this->address = $address;
            $this->deskId = $deskId;            
        }


        /**
         * Get the value of citizenId
         */
        public function getCitizenId()
        {
                return $this->citizenId;
        }

        /**
         * Set the value of citizenId
         *
         * @return  self
         */
        public function setCitizenId($citizenId)
        {
                $this->citizenId = $citizenId;

                return $this;
        }

        /**
         * Get the value of firstName
         */
        public function getFirstName()
        {
                return $this->firstName;
        }

        /**
         * Set the value of firstName
         *
         * @return  self
         */
        public function setFirstName($firstName)
        {
                $this->firstName = $firstName;

                return $this;
        }

        /**
         * Get the value of lastName
         */
        public function getLastName()
        {
                return $this->lastName;
        }

        /**
         * Set the value of lastName
         *
         * @return  self
         */
        public function setLastName($lastName)
        {
                $this->lastName = $lastName;

                return $this;
        }

        /**
         * Get the value of email
         */
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of dni
         */
        public function getDni()
        {
                return $this->dni;
        }

        /**
         * Set the value of dni
         *
         * @return  self
         */
        public function setDni($dni)
        {
                $this->dni = $dni;

                return $this;
        }

        /**
         * Get the value of birthdate
         */
        public function getBirthdate()
        {
                return $this->birthdate;
        }

        /**
         * Set the value of birthdate
         *
         * @return  self
         */
        public function setBirthdate($birthdate)
        {
                $this->birthdate = $birthdate;

                return $this;
        }

        /**
         * Get the value of address
         */
        public function getAddress()
        {
                return $this->address;
        }

        /**
         * Set the value of address
         *
         * @return  self
         */
        public function setAddress($address)
        {
                $this->address = $address;

                return $this;
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
    }
?>