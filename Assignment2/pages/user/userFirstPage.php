<?php
	session_start();
	
	include ("../../includes/pagesHeadUserManager.php");
	include("../../includes/components/navBarUser.php");
	include_once "../../includes/connectDB.php";
	include_once "../../db/users.php";
?>

<html>
<body>

<div id="Main">
	<h1 class="TituloPag"> <i> Welcome </i> </h1>
</div>

<?php

	if(isset($_SESSION['user'])) {
		
		$result = getUserPoints($_SESSION['user']);
		$points = pg_fetch_result($result, 0, "points");
		
		echo "<p align=\"center\">Welcome " .$_SESSION['user']. "!<br></p>";
		echo "<p align=\"center\">At the moment, you have " .$points. " points<br></p>";
		echo "<p class=\"button\" align=\"center\"><a href=\"formMakeBet.php\"> Bet! </a></p>"; 
	
	 }
	
?>

</body>
</html>

