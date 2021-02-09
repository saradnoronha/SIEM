<?php
	session_start();
	include ("../../includes/pagesHeadUserManager.php");
	include("../../includes/components/navBarUser.php");
	include_once "../../includes/connectDB.php";
	include_once "../../db/bets.php";
?>

<html>
<body>

<div id="Main">
	<h1 class="TituloPag"> <i> My Bets </i> </h1>
</div>

</body>
</html>

<?php
	if(isset($_SESSION['user'])) {
		echo "List: '".$_SESSION["user"]."'";
		$user = $_SESSION["user"]; 
		//Get the user's bets from the db
		$result = getBetsUser($user);
		
		//HTML table
		echo "<table>";
		echo "<tr>";
			echo "<th>Race</th><th>Bet Type</th><th>Driver</th><th>Status</th><th>Points Betted</th><th>Odd</th>";
		echo "</tr>";
		
		$row = pg_fetch_assoc($result);
		
		while (isset($row["id"])) {
			echo "<tr>";
				echo "<td>".$row['race']."</td>";
				echo "<td>".$row['type']."</td>";
				echo "<td>".$row['driver']."</td>";
				echo "<td>".$row['status']."</td>";
				echo "<td>".$row['points']."</td>";
				echo "<td>".$row['odd']."</td>";
			echo "</tr>";
			
			$row = pg_fetch_assoc($result);
		}
		
		echo "</table>";
	}
?>