<?php
    namespace Repository;

    require_once "Config/Autoload.php";

    use Model\Desk as Desk;

    class DeskRepository
    {
        private $deskList;
        private $fileName;

        public function __construct()
        {
            $this->fileName = dirname(__DIR__)."/Data/desks.json";
            $this->deskList = array();
        }

        public function add($desk)
        {
			$this->retrieveData();
			array_push($this->deskList, $desk);
			$this->saveData();
		}

		public function getAll()
        {
			$this->retrieveData();
			return $this->deskList;
		}

		public function saveData()
        {
			$arrayToEncode = array();

			foreach($this->deskList as $desk)
            {
				$valuesArray["deskId"] = $desk->getDeskId();
				$valuesArray["deskNumber"] = $desk->getDeskNumber();
				$valuesArray["establishmentId"] = $desk->getEstablishmentId();
                $valuesArray["presidentId"] = $desk->getPresidentId();
				$valuesArray["active"] = $desk->getActive();
				array_push($arrayToEncode, $valuesArray);
			}

			$jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
			file_put_contents($this->fileName, $jsonContent);

		}

		public function retrieveData()
        {
			$this->artistList = array();

			if(file_exists($this->fileName))
            {
				$jsonContent = file_get_contents($this->fileName);
				$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

				foreach($arrayToDecode as $value)
                {
					$desk = new Desk($value['deskId'],$value['deskNumber'],$value['establishmentId'],$value['presidentId'],$value['active']);
					array_push($this->deskList, $desk);
				}
			}
		}

		public function searchNumberById($id)
        {
			$this->retrieveData();
			$number = "";

			foreach($this->deskList as $desk)
            {
				if($desk->getDeskId() == $id)
                {
					$number = $desk->getDeskNumber();
				}
			}
			return $number;
		}
    }


?>