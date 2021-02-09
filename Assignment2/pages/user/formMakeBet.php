<?php
	session_start();
	include_once"../../includes/components/navBarUser.php";
	include_once "../../includes/connectDB.php";
	include ("../../includes/pagesHeadUserManager.php");
	include_once "../../db/drivers.php";
	include_once "../../db/races.php";
	include_once "../../db/type.php";
?>

<html>

<body>

<div id="Main">
	<h1 class="TituloPag"> <i> Make Your Bet </i> </h1>
</div>

<?php
	
	if (!empty($_SESSION['msgErro'])) {
		
		echo "<p style=\"color:red\">".$_SESSION['msgErro']."<p>";
		$_SESSION['msgErro'] = NULL;
		
		if (!empty($_SESSION['race'])) 		$race = $_SESSION['race']; 				else $race = "Race";
		if (!empty($_SESSION['points'])) 	$pointsToBet = $_SESSION['points']; 	else $pointsToBet = "";
		if (!empty($_SESSION['betType'])) 	$betType = $_SESSION['betType']; 		else $betType = "Bet Type";
		if (!empty($_SESSION['driver'])) 	$driver = $_SESSION['driver']; 			else $driver = "Driver";
		
		//clean these variables
		$_SESSION['race'] = NULL; 
		$_SESSION['points'] = NULL; 		
		$_SESSION['betType'] = NULL;		 
		$_SESSION['driver'] = NULL;
	}
	
	else {
		
		$race = "Race";
		$pointsToBet = "";
		$betType = "Bet Type";
		$driver = "Driver";
	}
	
	//Get the lists of the tables races, type, drivers
	$races = getRaceLocation();
	$types = getBetTypes();
	$drivers = getDriversNames();


	//generate the html form
	echo "<form method = \"GET\" action = \"../../actions/actionMakeBet.php\">";
		
		echo "<p><label for=\"points\"> Points to bet:</label><br><input type=\"number\" name=\"points\" value=\"".$pointsToBet."\"/> </p>";
		
		echo "<p><label> Select the race: </label><br>";
		echo "<select name=\"race\">";
			echo "<option selected>".$race."</option>";	
		while ($row = pg_fetch_array($races))
		{
			echo "<option value='".$row['location']."'>".$row['location']."</option>";
		}       
		echo "</select></p>";
		
		echo "<p><label> Select the bet type: </label><br>";
		echo "<select name=\"bettype\">";
			echo "<option selected>".$betType."</option>";
		while ($row = pg_fetch_array($types))
		{
			echo "<option value='".$row['bettype']."'>".$row['bettype']."</option>";
		}       
		echo "</select></p>";
		
		echo "<p><label> Select the driver: </label><br>";
		echo "<select name=\"driver\">";
			echo "<option selected>".$driver."</option>";
		while ($row = pg_fetch_array($drivers))
		{
			echo "<option value='".$row['driver']."'>".$row['driver']."</option>";
		}       
		echo "</select></p>";
		
		echo "<p align=\"center\">
				<input type=\"submit\" 	name=\" Submit\" 	value=\"Submit\" />
				<input type=\"submit\" 	name=\"Cancel\"		value=\"Cancel\" />";
				
	echo "</form>";
		
		
?>
	



</body>
</html>