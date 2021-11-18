<?php 

	require_once("Config/Autoload.php");

	use Model\Citizen as Citizen;
	use Repository\CitizenRepository as CitizenRepository;

	$repoCitizen = new CitizenRepository();


	if($_GET)
    {
		if($repoCitizen->existByDni($_GET['dni']))
        {
			header("location:add-form.php?msj=error");
		}
		else
        {
			$citizen = new Citizen($_GET['citizenId'],$_GET['firstName'],$_GET['lastName'],$_GET['email'],$_GET['dni'],$_GET['birthdate'],$_GET['address'],$_GET['deskId']);
            
			$repoCitizen->add($citizen);
			$repoCitizen->saveData();
			header("location:add-form.php?msj=success");
		}
	}

 ?>