<!DOCTYPE html> <!--defines document type HTML5-->
<?php
	session_start();
	
	include ("../includes/pagesHead.php");
	include("../includes/components/navBar.php");
	include_once "../includes/connectDB.php";
	include_once "../db/races.php";
	
?>
<html>

<body >

<div id="Main">
	<h1 class="TituloPag"> <i>2021 FIA Formula One World Championship </i> </h1>
	
		
</div>

<?php

	//get all the races from the db
	$result = getAllRaces();
	
	//HTML table with the races list
	echo "<table border=1>";
	echo "<tr>";
		echo "<th >Grand Prix</th><th>Circuit</th><th>Date</th>";
	echo "</tr>";

	$row = pg_fetch_assoc($result);    		
	while (isset($row["id"])) {	
		echo "<tr>";
			echo "<td>".$row['location']."</td>";
			echo "<td>".$row['circuit']."</td>";
			echo "<td>".$row['date']."</td>";
			
			if(isset($_SESSION['user']) and $_SESSION['user'] == 'manager') {
				echo "<td><a href=\"manager/formRemoveRace.php?id=".$row['id']."\">Remove</a></td>";
			}
			
		echo "</tr>";

		$row = pg_fetch_assoc($result);	
	}
	echo "</table>";
	if (isset($_SESSION['user']) and $_SESSION['user'] == 'manager') {
		echo "<p class=\"button\" align=\"center\"><a href=\"manager/formAddRace.php\">New Race</a></td></p>";
	}
	

?>

</body>
</html>

