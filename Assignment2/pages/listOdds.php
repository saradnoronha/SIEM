
<?php
	session_start();
	include ("../includes/pagesHead.php");
	include("../includes/components/navBar.php");
	include_once "../includes/connectDB.php";
	include_once "../db/odds.php";
	
?>

<html>
<body>

<div id="Main">
	<h1 class="TituloPag"> <i> Odds </i> </h1>	
</div>

<?php

	//Get the table odds from the db - Pole Position
	$type = 'Pole Position';
	$resultPolePosition = getOddsByBetType($type);
	
	echo "<h3> Pole Posistion </h3>";
	//HTML table - Pole Position
	echo "<table>";
	echo "<tr>";
		echo "<th>Race</th><th>Driver</th><th>Odd</th>";
	echo "</tr>";
	
	$row = pg_fetch_assoc($resultPolePosition);
	While (isset($row['odd'])) {
		echo "<tr>";
			echo "<td>".$row['race'].  "</td>";
			echo "<td>".$row['driver']."</td>";
			echo "<td>".$row['odd'].   "</td>";
		echo "</tr>";
		$row = pg_fetch_assoc($resultPolePosition);
	}
	echo "</table>";
	
	//Get the table odds from the db - DNF
	$type = 'DNF';
	$resultDNF = getOddsByBetType($type);
	
	echo "<h3> DNF </h3>";
	//HTML table - DNF
	echo "<table>";
	echo "<tr>";
		echo "<th>Race</th><th>Driver</th><th>Odd</th>";
	echo "</tr>";
	
	$row = pg_fetch_assoc($resultDNF);
	While (isset($row['odd'])) {
		echo "<tr>";
			echo "<td>".$row['race'].  "</td>";
			echo "<td>".$row['driver']."</td>";
			echo "<td>".$row['odd'].   "</td>";
		echo "</tr>";
		$row = pg_fetch_assoc($resultDNF);
	}
	echo "</table>";
	
	//Get the table odds from the db - Winner
	$type = 'Winner';
	$resultWinner = getOddsByBetType($type);
	
	echo "<h3> Winner </h3>";
	//HTML table - Winner
	echo "<table>";
	echo "<tr>";
		echo "<th>Race</th><th>Driver</th><th>Odd</th>";
	echo "</tr>";
	
	$row = pg_fetch_assoc($resultWinner);
	While (isset($row['odd'])) {
		echo "<tr>";
			echo "<td>".$row['race'].  "</td>";
			echo "<td>".$row['driver']."</td>";
			echo "<td>".$row['odd'].   "</td>";
		echo "</tr>";
		$row = pg_fetch_assoc($resultWinner);
	}
	echo "</table>";
	
	//Get the table odds from the db - Fastest lap
	$type = 'Fastest lap';
	$resultFastestLap = getOddsByBetType($type);
	
	echo "<h3> Fastest lap </h3>";
	//HTML table - Fastest Lap
	echo "<table>";
	echo "<tr>";
		echo "<th>Race</th><th>Driver</th><th>Odd</th>";
	echo "</tr>";
	
	$row = pg_fetch_assoc($resultFastestLap);
	While (isset($row['odd'])) {
		echo "<tr>";
			echo "<td>".$row['race'].  "</td>";
			echo "<td>".$row['driver']."</td>";
			echo "<td>".$row['odd'].   "</td>";
		echo "</tr>";
		
		$row = pg_fetch_assoc($resultFastestLap);
	}
	echo "</table>";
?>

</body>
</html>