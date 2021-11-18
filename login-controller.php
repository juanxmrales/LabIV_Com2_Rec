<?php 

	session_start();

	if($_POST){

		if($_POST["username"] == "admin@electoral.gob.ar"){

			if($_POST['password'] == 4321){

				$_SESSION['user'] = $_POST["username"];
				header("location:add-form.php");
			}
			else{
				header("location:index.php?error=wrongPass");
			}

		}
		else{
			header("location:index.php?error=wrongUser");
		}
	}

 ?>