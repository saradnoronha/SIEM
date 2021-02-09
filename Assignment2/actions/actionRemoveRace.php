<?php
	session_start();

	include_once "../includes/connectDB.php";
	include_once "../db/races.php";
	include_once "../db/odds.php";

	
	if (!empty($_GET['No'])) {
		//if the user cancels, redirect to the first page
		header("Location: ../pages/listCalendar.php");
	}
	
	if (!empty($_GET['Yes'])) {
		
		$id_race = $_GET['id'];
		
		//delete respective odds
		$result = getRaceById($id_race);
		$row = pg_fetch_assoc($result);
		$raceName = $row['location'];
		
		deleteOdds ($raceName);
		
		//remove the race from the db
		$result = removeRace($id_race);
		
		
		//redirect to the updated calendar page
		header("Location: ../pages/listCalendar.php");
		
	}
?>
