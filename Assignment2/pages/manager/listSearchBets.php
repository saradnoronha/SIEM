
<!DOCTYPE html> <!--defines document type HTML5-->
<?php
	session_start();
	
	include ("../../includes/pagesHeadUserManager.php");
	include("../../includes/components/navBarManager.php");
	include_once "../../includes/connectDB.php";
	include_once "../../db/bets.php";
?>
<html>

<body>

<div id="Main">
	<h1 class="TituloPag"> <i>Bets </i> </h1>
	
</div>

<?php

	$betTypeSelected = [];
	$raceSelected = [];
	$statusSelected = [];

	// List of all Bets
	$bets = getAllBets($betTypeSelected,$raceSelected,$statusSelected);
	$betTypes =  getAllBetTypes();
	$races = getAllRaces();
	$status = getAllStatus();

	if(isset($_GET['typeArray'])){
		$betTypeSelected = $_GET['typeArray'];
	}
	if(isset($_GET['raceArray'])){
		$raceSelected = $_GET['raceArray'];
	}
	if(isset($_GET['statusArray'])){
		$statusSelected = $_GET['statusArray'];
	}


	echo "<form method=\"get\" action=\"listSearchBets.php\">";
			
		echo "<table class =\"filterTable\">";
			
			echo "<tr>";
			//list all types for search
			echo "<td> Bet Type: </td>";
			echo "<td>";
			for($i=0; $i < pg_numrows($betTypes); $i++) {
				
				$row = pg_fetch_row($betTypes, $i);
				$checkboxElement = "<label for='$row[0]'>$row[0]</label><input type='checkbox' name='typeArray[]' value='".$row[0]."'";
					//Making sure given values in the search are still visible
					if(!empty($betTypeSelected)){
					for($j=0; $j<sizeof($betTypeSelected); $j++){
						if($row[0] == $betTypeSelected[$j]){
							$checkboxElement .= " checked ";}
					}
				}
				$checkboxElement .= "> &nbsp";
				echo $checkboxElement;
	
			}
			echo "</td></tr>";
			
			echo "<tr>";
			//list all races for search
			echo "<td> Races: </td>";
			echo "<td>";
			for($i=0; $i < pg_numrows($races); $i++)
			{	
				$row = pg_fetch_row($races, $i);
				$checkboxElement = "<label for='$row[0]'>$row[0]</label><input type='checkbox' name='raceArray[]' value='".$row[0]."'";

					//Making sure given values in the search are still visible
					if(!empty($raceSelected)){
					for($j=0; $j<sizeof($raceSelected); $j++){
						if($row[0] == $raceSelected[$j]){
							$checkboxElement .= " checked ";}
					}
				}
				$checkboxElement .= "> &nbsp";
				echo $checkboxElement;
			}
			echo "</td></tr>";
			
			echo "<tr>";
			//list all status for search
			echo "<td> Bet Status: </td>";
			echo "<td>";
			for($i=0; $i < pg_numrows($status); $i++)
			{	
				$row = pg_fetch_row($status, $i);
				$checkboxElement = "<label for='$row[0]'>$row[0]</label><input type='checkbox' name='statusArray[]' value='".$row[0]."'";

					//Making sure given values in the search are still visible
					if(!empty($statusSelected)){
					for($j=0; $j<sizeof($statusSelected); $j++){
						if($row[0] == $statusSelected[$j]){
							$checkboxElement .= " checked ";}
					}
				}
				$checkboxElement .= "> &nbsp";
				echo $checkboxElement;
			}
			echo "</td></tr>";
			
		echo "</table>";
			
		echo "<p><input type=\"submit\" value=\"Search\" /> </p>";
		
		
	echo "</form>";



	// Search
	$bets = getAllBets($betTypeSelected,$raceSelected,$statusSelected);
	
	
		if(pg_numrows($bets)>0){

		// Table with the bets list

		echo "<table border=1>";
		echo "<tr>";
			echo "<th >Username</th><th>Race</th><th>Bet Type</th><th>Driver</th><th>Points Betted</th><th>Odd</th><th>Status</th>";
		echo "</tr>";

		$row = pg_fetch_assoc($bets);
		
		
		while (isset($row["id"])) {	
			
			echo "<form method = \"GET\" action = \"../../actions/actionChangeStatus.php\">";
				echo "<input type=\"hidden\" name=\"id\" value=\"".$row['id']."\"><br>";
			
				echo "<tr>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['race']."</td>";
					echo "<td>".$row['type']."</td>";
					echo "<td>".$row['driver']."</td>";
					echo "<td>".$row['points']."</td>";
					echo "<td>".$row['odd']."</td>";
					echo "<td>".$row['status']."</td>";
					echo "<td><select id=\"changeStatus\" name=\"changeStatus\">
						<option value=\"won\">Won</option>
						<option value=\"lost\">Lost</option>
						</select></td>";
					echo "<td><input type=\"submit\"  name=\"Change Status\"  value=\"Change Status\"></td>";
					
				echo "</tr>";

				$row = pg_fetch_assoc($bets);	
			echo "</form>";
		}
		echo "</table>";
	}
	else {
		echo "<p>No Results found.</p>";
	}
	

?>

</body>

</html>
