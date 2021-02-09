<?php 
	session_start();

	include ("../../includes/pagesHeadUserManager.php");
	include("../../includes/components/navBarManager.php");
	include_once "../../includes/connectDB.php";
	include_once "../../db/races.php";
?>

<html>
<body>

<div id="Main">
	<h1 class="TituloPag"> <i>Add a New Race </i> </h1>
</div>

<?php

	//if an error occurs, present it and clean the session variable
	if (!empty($_SESSION['msgError'])) {
		echo "<p style=\"color:red\">".$_SESSION['msgError']."<p>";
		$_SESSION['msgError'] = NULL;
		
	}
	
	if (!empty($_SESSION['location'])) 		$location = $_SESSION['location']; 	else $location = "";
	if (!empty($_SESSION['circuit'])) 		$circuit = $_SESSION['circuit']; 	else $circuit = "";
	if (!empty($_SESSION['date'])) 			$date = $_SESSION['date']; 			else $date = "";
	
	//clean the session variables
	$_SESSION['location'] = NULL;
	$_SESSION['circuit'] = NULL;
	$_SESSION['date'] = NULL;
	
	
	//Present the form HTML
	echo "<form method = \"GET\" action = \"../../actions/actionAddRace.php\">";

		
		echo "<p><label for=\"location\"> Location:</label>	<input type=\"text\"  name=\"location\" value=\"".$location."\"/> </p>";
		echo "<p><label for=\"circuit\">Circuit:</label>	<input type=\"text\"  name=\"circuit\"	value=\"".$circuit."\"/> </p/>";
		echo "<p><label for=\"date\">Date:</label>			<input type=\"text\"  name=\"date\" 	value=\"".$date."\"/> </p/>";
		echo "<p align=\"left\">
				<input type=\"submit\" name=\"Submit\" value=\"Submit\" />
				<input type=\"submit\" name=\"Cancel\" value=\"Cancel\" />";
			  
	echo "</form>";
	
?>
	
</body>
</html>


