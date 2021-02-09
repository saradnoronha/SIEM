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
	<h1 class="TituloPag"> <i> Account </i> </h1>
</div>

</body>
</html>

<?php

	if(isset($_SESSION['user'])) {
		
		//get the user's account information from the db
		$result = getAccountInfo($_SESSION['user']);
		$row = pg_fetch_assoc($result);
		$idUser = $row['id'];

		//present it with HTML
		echo "<p align=\"center\">Name: <input type=\"text\" 			name=\"name\" 		value=\"".$row['name'].		"\" disabled></p>";
		echo "<p align=\"center\">Birthdate: <input type=\"date\" 		name=\"birthdate\" 	value=\"".$row['birthdate']."\" disabled></p>";
		echo "<p align=\"center\">Email: <input type=\"text\" 			name=\"email\"	 	value=\"".$row['email'].	"\" disabled></p>";
		echo "<p align=\"center\">Password: <input type=\"password\" 	name=\"pass\" 		value=\"".$row['pass'].		"\" disabled></p>";
			
		
		echo "<p class=\"button\" align=\"center\"><a href=\"formChangeAccount.php\">Edit</a></p>";
				
	}
?>