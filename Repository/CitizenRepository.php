<?php
    namespace Repository;

    require_once "Config/Autoload.php";

    use Model\Citizen as Citizen;

    class CitizenRepository
    {
        private $citizenList;
        private $fileName;

        public function __construct()
        {
            $this->filename = dirname(__DIR__)."/Data/citizens.json";
            $this->citizenList = array();
        }

        public function add($citizen)
        {
			$this->RetrieveData();
			array_push($this->citizenList, $citizen);
			$this->saveData();

		}

		public function getAll()
        {
			$this->RetrieveData();
			return $this->citizenList;
		}

		public function saveData()
        {
			$arrayToEncode = array();

			foreach($this->citizenList as $citizen)
            {
				$valuesArray["citizenId"] = $citizen->getCitizenId();
				$valuesArray["firstName"] = $citizen->getFirstName();
				$valuesArray["lastName"] = $citizen->getLastName();
				$valuesArray["email"] = $citizen->getEmail();
                $valuesArray["dni"] = $citizen->getDni();
				$valuesArray["birthdate"] = $citizen->getBirthdate();
				$valuesArray["address"] = $citizen->getAddress();
				$valuesArray["deskId"] = $citizen->getDeskId();
				array_push($arrayToEncode, $valuesArray);
			}

			$jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
			file_put_contents($this->fileName, $jsonContent);
		}

		public function retrieveData()
        {
			$this->songList = array();

			if(file_exists($this->fileName))
            {
				$jsonContent = file_get_contents($this->fileName);
				$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

				foreach($arrayToDecode as $value)
                {
					$citizen = new Citizen($value['citizenId'],$value['firstName'],$value['lastName'],$value['email'],$value['dni'],$value['birthdate'],$value['address'],$value['deskId']);
					array_push($this->citizenList, $citizen);
				}
			}
		}

	    public function existByDni($dni)
        {
	    	$this->retrieveData();

	    	$flag = false;

	    	foreach($this->citizenList as $citizen)
            {
	    		if($citizen->getDni() == $dni){

	    			$flag = true;
	    		}
	    	}
	    	return $flag;
	    }

		public function searchNameById($id)
        {
			$this->retrieveData();
			$name = "";

			foreach($this->citizenList as $citizen)
            {
				if($citizen->getCitizenId() == $id)
                {
					$name = $citizen->getName();
				}
			}
			return $name;
		}
    }

?>