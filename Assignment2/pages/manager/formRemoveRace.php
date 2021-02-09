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
	<h1 class="TituloPag"> <i>Remove Race </i> </h1>

</div>
<?php

	$id_race = $_GET['id'];
	
	//Get race data
	$result = getRaceById($id_race);
	$row = pg_fetch_assoc($result); 

	//Showing race data in form
	echo "<form method = \"GET\" action = \"../../actions/actionRemoveRace.php\">";
	
		echo "<input type=\"hidden\" 				name=\"id\" 		 value=\"".$id_race."\"><br>";
		echo "Location: <input type=\"text\" 		name=\"location\" 	 value=\"".$row['location']."\"disabled><br>";
		echo "Circuit: <input type=\"text\" 		name=\"circuit\" 	 value=\"".$row['circuit']."\"disabled><br>";
		echo "Date: <input type=\"text\" 			name=\"date\"	 	 value=\"".$row['date']."\"disabled><br>";

		echo "<p> Are you sure you want to remove this race from the Calendar? </p>";
		echo "<p align=\"left\">
			  <input type=\"submit\" 	name=\"Yes\" 	value=\"Yes\">
			  <input type=\"submit\" 	name=\"No\" 	value=\"No\">";
			  
	echo "</form>";	


?>
	
</body>
</html>