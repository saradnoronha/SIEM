<?php
	session_start();
	include_once "../includes/connectDB.php";
	include("../includes/components/navBar.php");
	include("../includes/pagesHead.php");
	include_once "../db/drivers.php";
?>

<html>
<body>

<div id="Main">
	<h1 class="TituloPag"> <i>2021 Drivers</i> </h1>
</div>

<?php 
	//Get the table drivers from the db
	$result = getAllDrivers();
	
	//HTML table
	echo "<table>";
	echo "<tr>";
		echo "<th>Driver</th><th>Team</th>";
	echo "</tr>";
	
	$row = pg_fetch_assoc($result);
	
	while (isset($row["id"])) {
		echo "<tr>";
			echo "<td>".$row['driver']."</td>";
			echo "<td>".$row['team'].  "</td>";
		echo "</tr>";
		$row = pg_fetch_assoc($result);
	}
	
	echo "</table>";
?>


</body>
</html>