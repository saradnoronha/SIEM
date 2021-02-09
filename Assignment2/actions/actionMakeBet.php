<?php
	session_start();
	
	include_once "../includes/connectDB.php";
	include_once "../db/bets.php";
	include_once "../db/odds.php";
	include_once "../db/users.php";

	if (isset($_GET['Cancel'])){
		//Cancelation implies returning to the original page
		header("Location: ../pages/user/userFirstPage.php");
	}
	
	if (!empty($_GET['Submit'])){
		//When confirmed, recovers the values submited by the user
		$name = $_SESSION['user'];
		$race = $_GET['race'];
		$pointsToBet = $_GET['points'];
		$betType = $_GET['bettype'];
		$driver = $_GET['driver'];
		
		//Discover which is the odd that matches the race, bet type and driver
		$result = discoverOdd($race, $betType, $driver);
		$row = pg_fetch_assoc($result);    		
		$odd = $row['odd'];
		
		//Determine user's points
		$result = getUserPoints($name);
		$row = pg_fetch_assoc($result);
		$pointsAvailable = $row['points'];
		$newPoints = $pointsAvailable - $pointsToBet;
	
		//check if the user has enough points
		if($pointsAvailable>=$pointsToBet) {$enoughPoints=true;} else {$enoughPoints=false;}

		//Data Validation
		//All fields are mandatory, so the query executes only if all are valid 
		if (($race == "Race") || empty($pointsToBet) || ($betType == "Bet Type") ||  ($driver == "Driver")){
			$validData = false;
		}
		else {
			$validData = true;
		}
	
		// Query Execution + Redirects to list of all bets
		if($enoughPoints){
	
			if (!$validData){
				//If the data is invalid, an error message is generated and saved in the session variable. 
				//After the user recognizes the message, the user is redirected to the form
				$_SESSION['msgErro'] = "At least one field missing.<br>";
				
				//Save the data introduced by the user
				$_SESSION['race'] = $race;
				$_SESSION['points'] = $pointsToBet;
				$_SESSION['betType'] = $betType;
				$_SESSION['driver'] = $driver;
			
				header("Location: ../pages/user/formMakeBet.php");
			}
				
			else {
				
				if($pointsToBet <= 0) {
					$_SESSION['msgErro'] = "You must bet at least 1 point.<br>";
					$_SESSION['race'] = $race;
					$_SESSION['betType'] = $betType;
					$_SESSION['driver'] = $driver;
			
					header("Location: ../pages/user/formMakeBet.php");
				}
				else {
					//If all data is valid, the query is executed and the user is redirected to the bet's list
					$query = makeBet($name, $pointsToBet, $race, $betType, $driver, $odd);
					updatePoints ($name, $newPoints);
				
					header("Location: ../pages/user/listMyBets.php");
				}	
			}
		}
		
		else {
			$_SESSION['msgErro'] = "Not Enough Points to Bet<br>";
			header("Location: ../pages/user/formMakeBet.php");
		}	
	}
	
	
	
?>