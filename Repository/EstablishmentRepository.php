<?php
    namespace Repository;

    require_once "Config/Autoload.php";

    use Model\Establishment as Establishment;

    class EstablishmentRepository
    {
        private $establishmentList;
		private $fileName;

        public function __construct()
        {
            $this->fileName = dirname(__DIR__)."/Data/establishments.json";
            $this->establishmentList = array();
        }

        public function add($establishment)
        {
			$this->retrieveData();
			array_push($this->establishmentList, $establishment);
			$this->saveData();
		}

		public function getAll()
        {
			$this->retrieveData();
			return $this->establishmentList;
		}

		public function saveData()
        {
			$arrayToEncode = array();

			foreach($this->establishmentList as $establishment)
            {
				$valuesArray["establishmentId"] = $establishment->getEstablishmentId();
				$valuesArray["name"] = $establishment->getName();
				array_push($arrayToEncode, $valuesArray);
			}

			$jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
			file_put_contents($this->fileName, $jsonContent);

		}

		public function retrieveData()
        {
			$this->establishmentList = array();

			if(file_exists($this->fileName))
            {
				$jsonContent = file_get_contents($this->fileName);
				$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

				foreach($arrayToDecode as $value)
                {
					$establishment = new Establishment($value['establishmentId'],$value['name']);
					array_push($this->establishmentList, $establishment);
				}
			}
		}

		public function searchNameById($id)
        {
			$this->retrieveData();
			$name = "";

			foreach($this->establishmentList as $establishment)
            {
				if($establishment->getEstablishmentId() == $id)
                {
					$name = $establishment->getName();
				}
			}
			return $name;
		}
    }

?>