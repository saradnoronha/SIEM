<?php
	session_start();
	
	include_once "../includes/connectDB.php";
	include_once "../includes/randFunction.php";
	include_once "../db/races.php";
	include_once "../db/type.php";
	include_once "../db/drivers.php";
	include_once "../db/odds.php";
	
	
	if (!empty($_GET['Cancel'])) {
		//if the user cancels, redirect to the first page
		header("Location: ../pages/listCalendar.php");
	}
	
	if (!empty($_GET['Submit'])) {
		//if confirmed, recover the values introduced
		$location = $_GET['location'];
		$circuit = $_GET['circuit'];
		$date = $_GET['date'];
		
		//validate the data -> to make a bet every field must be completed
		if (empty($location) || empty($circuit) || empty($date)) {
			$validData = false;
		}
		else {
			$validData = true;	
		}
		
		if (!$validData) {
				
			//save the error message
			$_SESSION['msgError'] = "You must fill every parameter<br>";
			
			//save the data that was introduced by the user
			$_SESSION['location'] = $location;
			$_SESSION['circuit'] = $circuit;
			$_SESSION['date'] = $date;
			
			//and redirect to the add race form
			header("Location: ../pages/manager/formAddRace.php");
		}
	
		else {
			//if the data is valid, add the race to the db
			$result = addRace($location, $circuit, $date);
			
			//get the info needed from the bet type table
			$betTypes = getBetTypes();
			
			//get the info needed from the drivers table
			$allDrivers = getDriversNames();
			
			//generate the races' respective odds
			for($i=0; $i < pg_numrows($betTypes); $i++){
				
				$row = pg_fetch_row($betTypes, $i);
				$betType = $row[0];
				
				for($j=0; $j< pg_numrows($allDrivers); $j++){
					
					$row = pg_fetch_row($allDrivers, $j);
					$driver= $row[0];
					$odd = rand_float(0.1, 10);
					if(empty($betType) || empty($driver) || empty($odd)){echo "PROBLEMO";}
					else {createOdd ($location, $betType, $driver, $odd); }
				}
			}
		
			//and redirect to the calendar list
			header("Location: ../pages/listCalendar.php");
		}
	}
	
	
?>

