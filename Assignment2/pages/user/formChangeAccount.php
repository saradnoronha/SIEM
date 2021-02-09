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
	<h1 class="TituloPag"> <i> Edit your Account </i> </h1>
</div>

<?php

		if (!empty($_SESSION['msgErro'])) {
		// If there is any error message: shows it and recovers field values, and at the end cleans session variables 
		
		echo "<p style=\"color:red\">".$_SESSION['msgErro']."<p>";
		$_SESSION['msgErro'] = NULL;
		
		//recover the forms' fields from saved in the session variables
		$idUser = $_SESSION['id'];
		if (!empty($_SESSION['name'])) 		$name = $_SESSION['name']; 				else $name = "";
		if (!empty($_SESSION['birthdate'])) $birthdate = $_SESSION['birthdate']; 	else $birthdate = "";
		if (!empty($_SESSION['email'])) 	$email = $_SESSION['email']; 			else $email = "";
		if (!empty($_SESSION['pass'])) 		$pass = $_SESSION['pass']; 				else $pass = "";
		
		//clean these variables
		$_SESSION['id'] = NULL; 
		$_SESSION['name'] = NULL; 
		$_SESSION['birthdate'] = NULL; 		
		$_SESSION['email'] = NULL;		 
		$_SESSION['pass'] = NULL;	
	}
	else {
		// get the data from the dB if it does not get to the script after an error
		//$idUser = $_GET['id'];
		$result = getAccountInfo($_SESSION['user']);
		$row = pg_fetch_assoc($result);
		$idUser = $row['id'];
		$name=$row['name'];
		$birthdate=$row['birthdate'];
		$email=$row['email'];
		$pass=$row['pass'];
	}
	

	
	//Present the data from the form
	echo "<form method = \"GET\" action = \"../../actions/actionChangeAccount.php\">";
		
		echo "<input type=\"hidden\" 				name=\"id\" 		value=\"".$idUser."\"><br>";
		echo "Name: <input type=\"text\" 			name=\"name\" 		value=\"".$name."\"><br>";
		echo "Birthdate: <input type=\"text\" 		name=\"birthdate\" 	value=\"".$birthdate."\"><br>";
		echo "Email: <input type=\"text\" 			name=\"email\"	 	value=\"".$email."\"><br>";
		echo "Password: <input type=\"password\" 	name=\"pass\"	 	value=\"".$pass."\"><br>";
	
		echo "<p align=\"center\">
			  <input type=\"submit\" 	name=\"Confirm\" 	value=\"Confirm\">
			  <input type=\"submit\" 	name=\"Cancel\"	 	value=\"Cancel\">";
			  
	echo "</form>";
	
?>

</body>
</html>