<?php
	session_start();
	
	include_once "../includes/connectDB.php";
	include_once "../db/bets.php";
	include_once "../db/users.php";
	
	
	$id = $_GET['id'];
	$newStatus = $_GET['changeStatus'];
	
	if(strcmp($newStatus,"won") == 0){
		
		//Get odd and points correspondig to this bet
		$result = getBetById($id);
		$row = pg_fetch_assoc($result);   
		$actualStatus = $row['status'];
		
		//It only sums points if the previous state was pending
		if(strcmp($actualStatus,"pending") == 0){
			
			$odd = $row['odd'];
			$pointsBetted = $row['points'];
			$name = $row['name'];
			
			$gainedPoints=$odd * $pointsBetted;
			//echo $gainedPoints;
			
			$result = getUserPoints ($name);
			$row = pg_fetch_assoc($result);
			$pointsAvailable = $row['points']; 
			
			$newPoints = $pointsAvailable + $gainedPoints;

			updatePoints($name, $newPoints);
		}
	}
	
	$query = updateStatus($id, $newStatus);
	header("Location: ../pages/manager/listSearchBets.php");
	
?>
